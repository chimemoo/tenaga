<?php

/**
*
* Importing need
*
*/
use Http\HttpRequest;
use Http\HttpResponse;
use Http\CookieBuilder;
use Tenaga\Router;

/**
*
* Run Autoload From Composer
*
*/
require_once(ROOT . DS . 'vendor' . DS . 'autoload.php');

/**
* 
* Setting the Environtment Type
*
*/
$environment = 'development';

/**
*
* Register the error handler
*
**/
$whoops = new \Whoops\Run;
if ($environment !== 'production') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function($e){
        echo 'Todo: Friendly error page and send an email to the developer';
    });
}
$whoops->register();

/**
*
* Initialize the request & response
*
*/
$request = new HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER, file_get_contents('php://input'));
$response = new HttpResponse;

/**
*
* Register the request & response
*
*/
$router = new Router($request->getMethod(), $request->getPath());
$router->route($response);

