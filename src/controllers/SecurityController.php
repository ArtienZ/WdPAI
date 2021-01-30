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
        session_start();
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
        if (!password_verify($password,$user->getPassword())){
            return $this->render('login', ['messages' => ['Wrong email or password']]);
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        $_SESSION["useremail"] = $user->getEmail();
        if($user instanceof Kid){
            $_SESSION['kid'] = $user;
            $_SESSION['role'] = $user->getRole();
            return  $this->render('kidprofile');
        }
        if($user instanceof Therapist){
            $_SESSION['therapist'] = $user;
            $_SESSION['role'] = $user->getRole();
            return $this->render('myprofile');
        }
        //header("Location: {$url}/kid_profile"); // OR U CAN USE THIS -> return $this->render('myprofile');

    }
    public function logout(){
        session_start();
        session_destroy();
        return $this->render('login');
    }
}