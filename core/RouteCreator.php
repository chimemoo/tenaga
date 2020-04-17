<?php namespace Tenaga;

class RouteCreator {
    public $routeList;

    public function web($method,$action,$handler){
        $this->routeList[] = [$method,$action,$handler]; 
    }
    public function api($method,$action,$handler){
        $this->routeList[] = [$method,'/api'.$action,$handler]; 
    }
    public function all(){
        return $this->routeList;
    }

}