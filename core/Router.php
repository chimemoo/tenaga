<?php namespace Tenaga;

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
    * Register request variable for inject Http\HttpRequest
    * @var Object
    *
    */
    public $request;

    /**
    *
    * Register response variable for inject Http\HttpResponse
    * @var Object
    *
    */
    public $response;

    /**
    *
    * Register route list from app/Router
    * Register http method and path target
    * Register injector
    * @param String $method
    * @param String $path
    *
    */
    public function __construct($method,$path){
        $this->routeList[] = require_once ROOT . DS . 'app' . DS . 'Routes' . DS . 'Web.php';
        $this->routeList[] = require_once ROOT . DS . 'app' . DS . 'Routes' . DS . 'Api.php';
        $this->method = $method;
        $this->path = $path;
        $this->injector = require_once ROOT . DS . 'core' . DS . 'Injector.php';
        $this->request = $this->injector->make('Http\HttpRequest');
        $this->response = $this->injector->make('Http\HttpResponse');   
    }

    /**
    *
    * Make the Route
    * @param Object $response
    *
    */
    public function route($response){
        $dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $r) {
            $routes = $this->routeList;
            foreach ($routes[0] as $route) {
                $r->addRoute($route[0], $route[1], $route[2]);
            }
        });
        
        $routeInfo = $dispatcher->dispatch($this->method, $this->path);
        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                $response->setContent('404 - Page not found');
                $response->setStatusCode(404);
                echo $response->getContent();
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $response->setContent('405 - Method not allowed');
                $response->setStatusCode(405);
                echo $response;
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

}