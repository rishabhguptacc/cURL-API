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
        // print_r($name .' '.  $password);

        // $data = Users::find(
        //     [
        //         'name' => $name
        //     ]
        // );
        $data=Users::find("name = '$name'");
        // echo "<pre>";
        // print_r($data[0]->name);

        if ($name == $data[0]->name && $password == $data[0]->password) {
            echo 'logged in!';
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
