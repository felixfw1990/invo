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

        $user = Users::find();
        TestEcho::p($user, FALSE, ['_id', 'name', 'email', 'password']);
    }

    // ------------------------------------------------------------------------------
}