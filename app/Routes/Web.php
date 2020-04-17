<?php
use Tenaga\RouteCreator;

$router = new RouteCreator;

$router->web('GET', '/welcome', 'Tenaga\Handlers\Welcome@index');

return $router->all();