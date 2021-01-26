<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';

class SecurityController extends AppController
{
    public function login()
    {
        $user = new User('email@email.com', 'admin', 'Jack', 'Jacson');
        if($this->isPost()){
            return $this->render('login');
        }
        $email = $_POST["email"];
        $password = $_POST["password"];
        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['Wrong email or password']]);
        }
        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong email or password']]);
        }

        // $name= $_POST["name"];
        // $surname= $_POST["surname"];
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/myprofile"); // OR U CAN USE THIS -> return $this->render('myprofile');

    }
}