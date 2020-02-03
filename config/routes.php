<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin('Select2', ['path' => '/select2'], function (RouteBuilder $routes) {
    $routes->fallbacks(DashedRoute::class);
});
