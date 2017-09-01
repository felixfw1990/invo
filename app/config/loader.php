<?php

$loader = new Phalcon\Loader();

// We're a registering a set of directories taken from the configuration file

//$loader->registerDirs(
//    [
//        APP_PATH . $config->application->controllersDir,
//        APP_PATH . $config->application->pluginsDir,
//        APP_PATH . $config->application->libraryDir,
//        APP_PATH . $config->application->modelsDir,
//        APP_PATH . $config->application->formsDir,
//        APP_PATH . $config->application->toolsDir,
//    ]
//);


// 根据命名空间前缀加载
$loader->registerNamespaces(
    [
        "Invo\\Controllers" => APP_PATH . $config->application->controllersDir,
        "Invo\\Plugins"     => APP_PATH . $config->application->pluginsDir,
        "Invo\\Library"     => APP_PATH . $config->application->libraryDir,
        "Invo\\Models"      => APP_PATH . $config->application->modelsDir,
        "Invo\\Forms"       => APP_PATH . $config->application->formsDir,
        "Invo\\Tools"       => APP_PATH . $config->application->toolsDir,
    ]
);

$loader->register();