<?php namespace Invo\Models;

use Phalcon\Mvc\MongoCollection;

class Parts extends MongoCollection
{
    // ------------------------------------------------------------------------------
    
    public $_id;
    
    // ------------------------------------------------------------------------------
    
    public $name;

    // ------------------------------------------------------------------------------

    public function initialize()
    {
        $this->hasMany(
            "id",
            "RobotsParts",
            "parts_id"
        );
    }
    
    // ------------------------------------------------------------------------------
}