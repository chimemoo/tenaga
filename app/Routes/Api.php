<?php
use Tenaga\RouteCreator;

$router = new RouteCreator;

$router->api('GET', '/get-route', 'get_handler');

return $router->all();