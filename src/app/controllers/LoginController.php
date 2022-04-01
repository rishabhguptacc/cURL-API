<?php

use Phalcon\Mvc\Controller;
// use MyApp\Models\Users;



class LoginController extends Controller
{
    public function indexAction()
    {
        //return '<h1>Inside indexAction()...!!!</h1>';
    }

    public function loginUserAction()
    {
        // echo "login user action() ....";
        $name = $this->request->getPost('name');
        $password = $this->request->getPost('password');
        $rememberMe = $this->request->getPost('rememberme');


        // $data = Users::find(
        //     [
        //         'name' => $name
        //     ]
        // );
        $data=Users::find("name = '$name'");
        // echo "<pre>";
        // print_r($data[0]->name);
        $dbId = $data[0]->id;
        $dbName = $data[0]->name;
        $dbEmail = $data[0]->email;
        $dbPassword = $data[0]->password;



        if ($name == $data[0]->name && $password == $data[0]->password) {
            echo 'logged in!';

            $this->session->set('name', $name);
            $this->session->set('password', $password);
            $this->session->set('rememberme', $rememberMe);


            // echo '<pre>';
            // print_r($this->session->name);
            // die;
            
            
            $this->response->redirect('dashboard/');
        } else {
            // $response->setStatusCode(403, 'Forbidden');
            // $response->setContent("Sorry, Authentication Failed");
            // $response->send();

            $this->response->setStatusCode(403, 'Forbidden');
            $this->response->setContent("Sorry, Authentication Failed");
            $this->response->send();
            die();
        }

        // print_r($data);
        // echo $data[0];
        // die();
    }
}
