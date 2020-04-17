<?php
use Tenaga\RouteCreator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. To make
| Route, u must specify the method, action, and Handler
|
*/


$router = new RouteCreator;

$router->web('GET', '/welcome', 'Tenaga\Handlers\Welcome@index');

return $router->all();