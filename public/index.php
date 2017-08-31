<?php
use Phalcon\Config\Adapter\Ini;

define("APP_PATH", realpath("..") . "/");

$config = new Ini(APP_PATH."app/config/config.ini");

$di = new \Phalcon\Di\FactoryDefault();

require APP_PATH . "app/config/loader.php";
require APP_PATH . "app/config/router.php";
require APP_PATH . "app/config/view.php";
require APP_PATH . "app/config/mongo.php";
require APP_PATH . "app/config/dispatcher.php";



$application = new \Phalcon\Mvc\Application($di);

$response = $application->handle();

$response->send();