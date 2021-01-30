<?php

require_once 'Repository.php';
require_once 'TherapistRepository.php';
require_once 'KidRepository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Kid.php';
require_once __DIR__.'/../models/Therapist.php';
class UserRepository extends Repository
{
    public function getUser(string $email)
    {
        $stmt= $this->database->connect()->prepare('SELECT roles.id,roles.type FROM public.roles JOIN "user" u on u.role=roles.id and u.email=:email;');
        $stmt->bindParam(':email',$email, PDO::PARAM_STR);
        $stmt->execute();
        $role= $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.user WHERE email = :email 
        ');
        $stmt->bindParam(':email',$email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user == false){
            return null;
        }
        if($role['type'] == 'patient'){
            $rep = new KidRepository();
            $ther = $rep->getKid($email);
            $ther->setRole($role['type']);
            return $ther;
        }elseif($role['type'] == 'owner' || $role['type'] == 'therapist'){
            $therapRe=new TherapistRepository();
            $ther = $therapRe->getTherapist($email);
            $ther->setRole($role['type']);
            return $ther;
        }

    }
    public function delUser(string $email){
        $stmt= $this->database->connect()->prepare('DELETE FROM public.user WHERE email=:email');
        $stmt->bindParam(':email',$email, PDO::PARAM_STR);
        $stmt->execute();
    }
}