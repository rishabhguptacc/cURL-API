<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        //return '<h1>Inside indexAction()...!!!</h1>';
    }

    public function loginUserAction()
    {
        // echo "login user action() ....";

        print_r($this->request->getPost('email'));
        die();
    }
}
