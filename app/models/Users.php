<?php

use Phalcon\Mvc\MongoCollection;

class Users extends MongoCollection
{
    public $name;
    public $email;
    public $password;

    public function getSource()
    {
        return 'users';
    }
}