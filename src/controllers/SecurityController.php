<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__.'/../models/Kid.php';
require_once __DIR__.'/../models/Therapist.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();
        if(!$this->isPost()){
            return $this->render('login');
        }
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = $userRepository->getUser($email);
        if(!$user){
            return $this->render('login', ['messages' => ['User not exist!']]);
        }
        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['Wrong email or password']]);
        }
        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong email or password']]);
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        if($user instanceof Kid)return  $this->render('kidprofile',['kid'=>$user]);
        if($user instanceof Therapist)return $this->render('myprofile',['therapist'=>$user]);
        //header("Location: {$url}/kid_profile"); // OR U CAN USE THIS -> return $this->render('myprofile');

    }
}