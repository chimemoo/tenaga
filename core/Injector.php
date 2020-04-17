<?php namespace Tenaga;

/**
*
* Make Object from \Auryn\Injector
* @var array
*
*/
$injector = new \Auryn\Injector;

/**
*
* Register Injector for Http\Request
*
*/
$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER,
]);

/**
*
* Register Injector for Http\Response
*
*/
$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

/**
*
* Return the list of depedency
*
*/
return $injector;