<?php

/**
*
* Importing need
*
*/
use Tenaga\Router;

/**
*
* Run Autoload From Composer
*
*/
require_once(ROOT . DS . 'vendor' . DS . 'autoload.php');


$dotenv = Dotenv\Dotenv::createImmutable(ROOT . DS);
$dotenv->load();

/**
*
* Setting the Environtment Type
*
*/
$environment = env('ENVIRONTMENT');

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
* Register the request & response
*
*/
$router = new Router;
$router->route();
