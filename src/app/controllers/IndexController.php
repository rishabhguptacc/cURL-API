<?php

use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        
        
        // return '<h1>Hello World!</h1>';
    }

    public function logoutAction()
    {
        echo 'Logging out...';

        $this->session->destroy();

        $this->response->redirect('index');
    }
}
