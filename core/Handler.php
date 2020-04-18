<?php namespace Tenaga;

use Tenaga\Router;

class Handler {
    
    /**
    *
    * Register view
    * @var Object
    * 
    */
    public $view;

    /**
    *
    * Register Request
    * @var Object
    * 
    */
    public $request;

    /**
    *
    * Register Response
    * @var Object
    * 
    */
    public $response;

    /**
    *
    * Initialize
    * 
    */
    public function __construct(){
        $this->__setHttp();
        $this->__setViewEngine();
    }

    /**
    *
    * Initialize viewEngine ($view)
    * @return Void
    * 
    */
    private function __setViewEngine() {
        $view = new ViewEngine;
        $this->view = $view;
    }

    /**
    *
    * Initialize HTTP Request & Response
    * @return Void
    * 
    */
    private function __setHttp(){
        $router = new Router;
        $this->request = $router->getHttpRequest();
        $this->response = $router->getHttpResponse();
    }


}
