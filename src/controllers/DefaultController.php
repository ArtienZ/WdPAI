<?php

require_once 'AppController.php';

class DefaultController extends AppController
{
    public function index()
    {
        $this->render('login');
    }

    public function myprofile()
    {
        $this->render('myprofile');
    }
    public function add_kid()
    {
        $this->render('addtherapist',['messages'=>['dziecko','dziecka']]);
    }
    public function add_therapist()
    {
        $this->render('addtherapist',['messages'=>['terapeute','terapeuty']]);
    }
}