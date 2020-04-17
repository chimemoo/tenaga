<?php namespace Tenaga;

class Router {

    public $routeList;
    public $method;
    public $path;
    public $handler;
    public $request;
    public $response;

    public function __construct($method,$path){
        $this->routeList[] = require_once ROOT . DS . 'app' . DS . 'Routes' . DS . 'Web.php';
        $this->routeList[] = require_once ROOT . DS . 'app' . DS . 'Routes' . DS . 'Api.php';
        $this->method = $method;
        $this->path = $path;
        $this->injector = require_once ROOT . DS . 'core' . DS . 'Injector.php';
        $this->request = $this->injector->make('Http\HttpRequest');
        $this->response = $this->injector->make('Http\HttpResponse');   
    }

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