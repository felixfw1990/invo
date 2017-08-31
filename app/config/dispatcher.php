<?php

use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Manager as EventsManager;

$di->set(
    "dispatcher",
    function () {
        // 创建一个事件管理器
        $eventsManager = new EventsManager();

        // 监听分发器中使用安全插件产生的事件
        $eventsManager->attach(
            "dispatch:beforeExecuteRoute",
            new SecurityPlugin()
        );

        // 处理异常和使用 NotFoundPlugin 未找到异常
        $eventsManager->attach(
            "dispatch:beforeException",
            new NotFoundPlugin()
        );

        $dispatcher = new Dispatcher();

        // 分配事件管理器到分发器
        $dispatcher->setEventsManager($eventsManager);

        return $dispatcher;
    }
);