<?php

use Phalcon\Mvc\Collection\Manager;
use Phalcon\Db\Adapter\MongoDB\Client;

// Initialise the mongo DB connection.
$di->setShared('mongo', function () use ($config) {

    if (!$config->mongo->username || !$config->mongo->password) {
        $dsn = 'mongodb://' . $config->mongo->hostname;
    } else {
        $dsn = sprintf(
            'mongodb://%s:%s@%s',
            $config->mongo->username,
            $config->mongo->password,
            $config->mongo->hostname
        );
    }

    $mongo = new Client($dsn);

    return $mongo->selectDatabase($config->mongo->database);
});

// Collection Manager is required for MongoDB
$di->setShared('collectionManager', function () {
    return new Manager();
});