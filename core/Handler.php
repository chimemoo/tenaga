<?php namespace Tenaga;

use Tenaga\Model;
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
    * Register Cookie
    * @var Object
    * 
    */
    public $cookie;

    /**
    *
    * Register Model
    * @var Object
    * 
    */
    public $model;

    /**
    *
    * Initialize
    * 
    */
    public function __construct(){
        $this->__setHttp();
        $this->__setViewEngine();
        $this->__setModel();
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
    * Initialize HTTP Request|Response|Cookie
    * @return Void
    * 
    */
    private function __setHttp(){
        $router = new Router;
        $this->request = $router->getHttpRequest();
        $this->response = $router->getHttpResponse();
        $this->cookie = $router->getCookieBuilder();
    }

    private function __setModel(){
        $model = new Model;
        $this->capsule = $model->connect();
        return $this->capsule;
    }


}
