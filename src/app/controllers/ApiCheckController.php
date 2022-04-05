<?php

use Phalcon\Mvc\Controller;

class ApiCheckController extends Controller
{

    public function indexAction(){
        
    }

    public function issAPIAction(){
        $url = "http://api.open-notify.org/iss-now.json ";
        
        // Initialize a CURL session.
        $ch = curl_init();

        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        $this->view->response = $response;

        // echo $response;

        // echo '<pre>';
        // print_r($response);
        // print_r(json_decode($response));


        // die;
        // curl_exec($ch);
    }


    public function htRssAPIAction()
    {
        $url = "https://www.hindustantimes.com/feeds/rss/lifestyle/festivals/rssfeed.xml";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $response = curl_exec($ch);

        $this->view->response = $response;


    }
}