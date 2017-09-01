<?php namespace Invo\Controllers;

use Phalcon\Mvc\Controller;

class SessionController extends Controller
{
    // ...

    private function _registerSession($user)
    {
        $this->session->set(
            "auth",
            [
                "id"   => $user->id,
                "name" => $user->name,
            ]
        );
    }

    /**
     * 这个方法检验和记录一个用户到应用中
     */
    public function startAction()
    {
        if ($this->request->isPost()) {
            // 从用户获取数据
            $email    = $this->request->getPost("email");
            $password = $this->request->getPost("password");

            // 在数据库中查找用户
            $user = Users::findFirst(
                [
                    "(email = :email: OR username = :email:) AND password = :password: AND active = 'Y'",
                    "bind" => [
                        "email"    => $email,
                        "password" => sha1($password),
                    ]
                ]
            );

            if ($user !== false) {
                $this->_registerSession($user);

                $this->flash->success(
                    "Welcome " . $user->name
                );

                // 如果用户是有效的, 转发到'invoices'控制器
                $this->dispatcher->forward(
                    [
                        "controller" => "invoices",
                        "action"     => "index",
                    ]
                );
            }

            $this->flash->error(
                "Wrong email/password"
            );
        }

        // 再一次转发到登录表单
        $this->dispatcher->forward(
            [
                "controller" => "session",
                "action"     => "index",
            ]
        );
    }
}