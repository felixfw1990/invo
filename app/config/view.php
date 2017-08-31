<?php
use Phalcon\Mvc\View;

// 设置视图组件
$di->set("view", function () use ($config) {
        $view = new View();

        $view->setViewsDir(APP_PATH . $config->application->viewsDir);

        return $view;
    }
);