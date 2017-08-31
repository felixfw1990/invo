<?php
use Phalcon\Mvc\Router;

$di->set('router', function () {
    $router = new Router();

    $router->setUriSource(Router::URI_SOURCE_SERVER_REQUEST_URI);

    return $router;
});