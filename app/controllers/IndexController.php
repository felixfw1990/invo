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

        $ck = $this->request->isPost();

        var_dump($ck);
        echo "send\n";

    }

    // ------------------------------------------------------------------------------
}