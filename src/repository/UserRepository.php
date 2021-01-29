<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Kid.php';
require_once __DIR__.'/../models/Therapist.php';
class UserRepository extends Repository
{
    public function getUser(string $email)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.user WHERE email = :email 
        ');
        $stmt->bindParam(':email',$email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user == false){
            return null;
        }
        if($user['role']==2){
            return $this->getTherapist($email);
        }
        if($user['role']==3){
            return $this->getKid($email);
        }
    }
    public function getKids():array{
        $result = [];
        $stmt= $this->database->connect()->prepare('
        SELECT * FROM public.kid inner join "user" u on u.id = kid.id');
        $stmt->execute();
        $kids = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($kids as $kid){
            $result[]=new Kid(
              $kid['name'],
              $kid['surname'],
              $kid['age'],
              $kid['therapist'],
              $kid['diagnosis_files'],
              $kid['photo'],
              $kid['parent_name'],
              $kid['parent_surname'],
              $kid['phone'],
              $kid['email'],
              $kid['password']
            );
        }
        return $result;

    }
    public function addKid(Kid $kid):void{
        $stmt = $this->database->connect();
        try{

            $stmt->beginTransaction();

            $query = "INSERT INTO public.user(name, surname, email,password, phone, photo, role) VALUES(?,?,?,?,?,?,?)";

            $pdo = $stmt->prepare($query);
            $pdo->execute([
                $kid->getName(),
                $kid->getSurname(),
                $kid->getEmail(),
                $kid->getPassword(),
                $kid->getPhone(),
                $kid->getPhoto(),
                3
            ]);
            $query = "INSERT INTO public.kid(id,therapist, parent_name, parent_surname, diagnosis_files, age)
        VALUES(currval(pg_get_serial_sequence('user','id')), ?, ?,?,?,?)";
            $pdo = $stmt->prepare($query);
            $pdo->execute([
                $kid->getTherapist(),
                $kid->getParentName(),
                $kid->getParentSurname(),
                $kid->getDiagnosisFiles(),
                $kid->getAge()
            ]);
            $stmt->commit();
        }catch(PDOException $e){
            $stmt->rollBack();
        }

    }
    public function getKidByName(string $searchString)
    {
        $searchString = "%".strtolower($searchString)."%";
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.kid inner join "user" u on u.id = kid.id WHERE LOWER(name) LIKE :searchKid');
        $stmt->bindParam(':searchKid', $searchString, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getKidBySurname(string $searchString){

    }
    private function getKid(string $email): ?Kid{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.kid inner join "user" u on u.id = kid.id where email= :email');
        $stmt->bindParam(':email',$email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Kid(
            $user['name'],
            $user['surname'],
            $user['age'],
            $user['therapist'],
            $user['diagnosis_files'],
            $user['photo'],
            $user['parent_name'],
            $user['parent_surname'],
            $user['phone'],
            $user['email'],
            $user['password']
        );
    }
}