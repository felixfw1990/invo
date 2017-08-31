<?php
class IndexController extends \Phalcon\Mvc\Controller
{

    // ------------------------------------------------------------------------------

    public function IndexAction()
    {
        echo "index";
    }

    // ------------------------------------------------------------------------------

    public function sendAction()
    {
        echo "send\n";

        $robots = Users::find();
        TestEcho::p($robots, FALSE, ['_id', 'name', 'email', 'password']);
    }

    // ------------------------------------------------------------------------------
}