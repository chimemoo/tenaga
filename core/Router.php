<?php namespace Tenaga;

use Http\HttpRequest;
use Http\HttpResponse;

class Router {

    /**
    *
    * Register Route List
    * @var array
    *
    */
    public $routeList;

    /**
    *
    * Register HTTP Method
    * @var String
    *
    */
    public $method;

    /**
    *
    * Register URL Path
    * @var String
    *
    */
    public $path;

    /**
    *
    * Register Handler of Action
    * @var String
    *
    */
    public $handler;

    /**
    *
    * Register request variable for Http\HttpRequest
    * @var Object
    *
    */
    public $request;

    /**
    *
    * Register response variable for Http\HttpResponse
    * @var Object
    *
    */
    public $response;

    /**
    *
    * Register route list from app/Router
    * Register injector
    * Register request & response class
    * Register request method and request
    *
    */
    public function __construct(){
        $this->routeList[] = require_once ROOT . DS . 'app' . DS . 'Routes' . DS . 'Web.php';
        $this->routeList[] = require_once ROOT . DS . 'app' . DS . 'Routes' . DS . 'Api.php';

        $this->injector = require_once ROOT . DS . 'core' . DS . 'Injector.php';

        $this->request = new HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER, file_get_contents('php://input'));
        $this->response = new HttpResponse;

        $this->method = $this->request->getMethod();
        $this->path = $this->request->getPath(); 
    }

    /**
    *
    * Make the Route
    * @return Void
    *
    */
    public function route(){
        $dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $r) {
            $routes = $this->routeList;
            foreach ($routes[0] as $route) {
                $r->addRoute($route[0], $route[1], $route[2]);
            }
        });
        
        $routeInfo = $dispatcher->dispatch($this->method, $this->path);
        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                $this->response->setContent('404 - Page not found');
                $this->response->setStatusCode(404);
                echo $this->response->getContent();
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $this->response->setContent('405 - Method not allowed');
                $this->response->setStatusCode(405);
                
                echo $rthis->esponse;
                break;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                list($className,$method)= $this->checkHandler($handler);
                $class = $this->injector->make($className);
                $class->$method($vars); 
                break;
        }
    }


    /**
    *
    * Checking '@' is available in Handler, if not add 'index' for default handler
    * @param String $handler
    * @return array
    * 
    */
    public function checkHandler($handler){
        if(strpos($handler, '@')){
            $this->handler = explode("@", $handler);
            return $this->handler;
        }
        else {
            $this->handler = [$handler,'index'];
            return $this->handler;
        }
    }

    /**
    *
    * Register $request for access from another class
    * @return object $request
    */
    public function getHttpRequest(){
        return $this->request;
    }

    /**
    *
    * Register $response for access from another class
    * @return object $response
    */
    public function getHttpResponse(){
        return $this->response;
    }

}