<?php namespace Invo\Models;

use Phalcon\Mvc\MongoCollection;
use \Phalcon\Validation\Validator\Uniqueness;

class Robots extends MongoCollection
{
    // ------------------------------------------------------------------------------
    
    public $_id;

    // ------------------------------------------------------------------------------

    public $name;

    // ------------------------------------------------------------------------------

    public $type;

    // ------------------------------------------------------------------------------

    public $year;

    // ------------------------------------------------------------------------------

    public $create;

    // ------------------------------------------------------------------------------

    public function initialize()
    {
    }

    // ------------------------------------------------------------------------------

    public function validation()
    {
        $validator = new \Phalcon\Validation();

        $validator->add('name',new Uniqueness(["message" => "The robot name must be unique"]));
    }

    // ------------------------------------------------------------------------------

    /**
     * 新增之前
     */
    public function beforeCreate()
    {
        // Set the creation date
        $this->create = time();
    }

    // ------------------------------------------------------------------------------

    /**
     * 查询到数据返回之前
     */
    public function afterFetch()
    {
        $id = $this->_id;

        $id = (array)$id;

        $this->id = $id['oid'] ?? '';

        unset($this->_id);
    }

    // ------------------------------------------------------------------------------

    public static function create_data(array $param) :bool
    {
        $robots = new Robots();

        $robots->name = $param['name'] ?? '';
        $robots->type = $param['type'] ?? '';
        $robots->year = $param['year'] ?? 1990;

        $result = $robots->save();

        return $result;
    }
    
    // ------------------------------------------------------------------------------
}