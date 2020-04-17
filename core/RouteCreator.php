<?php namespace Tenaga;

class RouteCreator {
    
    /**
    *
    * Register Route List
    * @var array
    *
    */
    public $routeList;

    /**
    *
    * Register Web Route
    * @param String $method
    * @param String $action
    * @param String $handler
    * @return void
    *
    */
    public function web($method,$action,$handler){
        $this->routeList[] = [$method,$action,$handler]; 
    }

    /**
    *
    * Register Api Route
    * @param String $method
    * @param String $action
    * @param String $handler
    * @return void
    *
    */
    public function api($method,$action,$handler){
        $this->routeList[] = [$method,'/api'.$action,$handler]; 
    }

    /**
    *
    * Return all route in $routeList
    * @return void
    *
    */
    public function all(){
        return $this->routeList;
    }

}