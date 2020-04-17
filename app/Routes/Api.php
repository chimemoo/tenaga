<?php
use Tenaga\RouteCreator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register api routes for your application. To make
| Route, u must specify the method, action, and Handler. If u using this
| the action will be add /api, example : /api{/your_action}.
|
*/

$router = new RouteCreator;

$router->api('GET', '/get-route', 'get_handler');

return $router->all();