<?php
use Phalcon\Mvc\Collection\Manager;
use Phalcon\Db\Adapter\MongoDB\Client;

// Initialise the mongo DB connection.
$di->setShared('mongo', function () use ($config) {

    if (!$config->database->mongo->username || !$config->database->mongo->password) {
        $dsn = 'mongodb://' . $config->database->mongo->host;
    } else {
        $dsn = sprintf(
            'mongodb://%s:%s@%s',
            $config->database->mongo->username,
            $config->database->mongo->password,
            $config->database->mongo->host
        );
    }

    $mongo = new Client($dsn);

    return $mongo->selectDatabase($config->database->mongo->dbname);
});

// Collection Manager is required for MongoDB
$di->setShared('collectionManager', function () {
    return new Manager();
});