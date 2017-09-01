<?php namespace Invo\Controllers;

use Phalcon\Di\InjectionAwareInterface;
use Phalcon\DiInterface;
use Phalcon\Mvc\Controller;

class TestController extends Controller implements InjectionAwareInterface
{
    public function indexAction()
    {
            
    }
    
    // ------------------------------------------------------------------------------

    public function setDI(DiInterface $di)
    {
        $this->_di = $di;

        echo "xxxd";
    }
}