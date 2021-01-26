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
    public function add_therapist()
    {
        $this->render('add_therapist',['messages'=>['terapeute','terapeuty']]);
    }
    public function add_kid()
    {
        $this->render('add_kid',['messages'=>['dziecko','dziecka']]);
    }
}

?>