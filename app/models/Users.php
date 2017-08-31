<?php

use Phalcon\Mvc\MongoCollection;

class Users extends MongoCollection
{
    public $username;
    public $password;

    public function getSource()
    {
        return 'users';
    }
}