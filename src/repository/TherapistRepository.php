<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Therapist.php';

class TherapistRepository extends Repository
{
    public function getTherapists():array{
        $result = [];
        $stmt= $this->database->connect()->prepare('
        SELECT * FROM public.therapist inner join "user" u on u.id = therapist.id');
        $stmt->execute();
        $therapists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($therapists as $therapist){
            $result[]=new Therapist(
                $therapist['name'],
                $therapist['surname'],
                $therapist['photo'],
                $therapist['specialization'],
                $therapist['account_number'],
                $therapist['hourly_rate'],
                $therapist['phone'],
                $therapist['email'],
                $therapist['password']
            );
        }
        return $result;
    }
    public function addTherapist(Therapist $therapist):void{
        $stmt = $this->database->connect();
        try{
            $stmt->beginTransaction();
            $query = "INSERT INTO public.user(name, surname, email,password, phone, photo, role) VALUES(?,?,?,?,?,?,?)";

            $pdo = $stmt->prepare($query);
            $pdo->execute([
                $therapist->getName(),
                $therapist->getSurname(),
                $therapist->getEmail(),
                $therapist->getPassword(),
                $therapist->getPhone(),
                $therapist->getPhoto(),
                2
            ]);
            $query = "INSERT INTO public.therapist(id,specialization,account_number, hourly_rate)
        VALUES(currval(pg_get_serial_sequence('user','id')), ?, ?,?)";
            $pdo = $stmt->prepare($query);
            $pdo->execute([
                $therapist->getSpecialization(),
                $therapist->getAccountNumber(),
                $therapist->getHourlyRate()
            ]);
            $stmt->commit();
        }catch(PDOException $e){
            $stmt->rollBack();
        }
    }

    public function getTherapistByName(string $searchString)
    {
        $searchString = "%".strtolower($searchString)."%";
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.therapist inner join "user" u on u.id = therapist.id WHERE LOWER(name) LIKE :search');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}