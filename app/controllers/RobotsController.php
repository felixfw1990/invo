<?php namespace Invo\Controllers;

use Invo\Models\Robots;
use Phalcon\Mvc\Controller;

class RobotsController extends Controller
{
    // ------------------------------------------------------------------------------

    public function saveAction()
    {
        $param =
        [
            'name' => 'test4',
            'type' => 'type4',
            'year' => 2000,
        ];

        $status = Robots::create_data($param);

        var_dump($status);
    }
    
    // ------------------------------------------------------------------------------

    public function editAction()
    {
        $robot = Robots::findFirst([['type' => 'type2']]);

        $robot->name = 'test_ttt';

        $result = $robot->save();

        var_dump($result);
    }
    
    // ------------------------------------------------------------------------------

    public function robotsAction()
    {
        $result = Robots::find();

        var_dump($result);
    }

    // ------------------------------------------------------------------------------

    public function pullAction()
    {
       $result = Robots::find([['type' => 'type3']]);

       var_dump($result);
    }

    // ------------------------------------------------------------------------------

    public function deleteAction()
    {
        $robot = Robots::findFirst([['type' => 'type2']]);

        $result = $robot->delete();

        var_dump($result);
    }
    
    // ------------------------------------------------------------------------------
}