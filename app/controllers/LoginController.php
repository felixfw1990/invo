<?php namespace Invo\Controllers;

use Invo\Models\Users;
use Invo\Tools\TestEcho;
use MongoDB\BSON\ObjectID;

class LoginController extends \Phalcon\Mvc\Controller
{
    // ------------------------------------------------------------------------------

    public function registerAction()
    {
        $param = $this->request->getPost();

        $username = $param['username'] ?? '';
        $password = $param['password'] ?? '';

        $ck = $this->__ck_exist(['username' => $username]);

        if($ck || !$password || !$username) { echo "error"; exit; }

        $users = new Users();

        $users->username = $username;
        $users->password = md5($password);

        $result = $users->save();

        TestEcho::p($param);
        TestEcho::p([$result]);

    }

    // ------------------------------------------------------------------------------

    public function loginAction()
    {
        $param = $this->request->getPost();

        $username = $param['username'] ?? '';
        $password = $param['password'] ?? '';

        $ck_exists = $this->__ck_exist(['username' => $username]);

        if(!$ck_exists || !$password || !$username) { echo "error"; exit; }

        $db_pwd = $ck_exists['password'];

        if(md5($password) ===    $db_pwd)
        {
            echo "login!"; die;
        }

        echo "password error!";
    }

    // ------------------------------------------------------------------------------

    private function __ck_exist(array $param) :array
    {
        $id = $param['id'] ?? NULL;
        $username = $param['username'] ?? NULL;

        $where = [];

        $id       AND $where['_id']= $this->__mgid($id);
        $username AND $where['username']= $username;

        if (!$where) { return []; }

        $user = Users::findFirst(['conditions' => $where]);

        if (!$user) { return []; }

        $user = (array)$user;

        return $user;
    }

    // ------------------------------------------------------------------------------

    private function __mgid($mongo_id = NULL): ObjectID
    {
        if (is_string($mongo_id))
        {
            try { return new ObjectID($mongo_id); }

            catch (\Exception $e) { return new ObjectID(NULL); }
        }

        if (is_object($mongo_id))
        {
            return $mongo_id;
        }

        return new ObjectID(NULL);
    }
    
    // ------------------------------------------------------------------------------
}