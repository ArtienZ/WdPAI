<?php
require_once 'Repository.php';
require_once 'UserRepository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Therapist.php';
require_once __DIR__.'/../models/Exercise.php';

class ExerciseRepository extends Repository
{
    public function getFiles($email):array{
        $result= [];
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.user WHERE email=:email');
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute();
        $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.exercises inner join "users_exercises" u on u.exercise_id = exercises.id where u.user_id=:userID
        ');
        $stmt->bindParam(':userID',$user_id['id'],PDO::PARAM_STR);
        $stmt->execute();
        $files = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($files as $file){
            $result[]=new Exercise(
                $file['name']
            );
        }
        return $result;
    }
    public function addFile(Exercise $file){
        $stmt = $this->database->connect();
        try{
            $stmt->beginTransaction();
            $query = "INSERT INTO public.exercises(name) VALUES(?)";
            $pdo = $stmt->prepare($query);
            $pdo->execute([
                $file->getName()
            ]);
            $pdo = $stmt->prepare('
            SELECT id FROM public.user WHERE email=:email;');
            $pdo->bindParam(':email', $_SESSION['therapist']->getEmail(),PDO::PARAM_STR);
            $pdo->execute();
            $userID = $pdo->fetchAll(PDO::FETCH_ASSOC);
            $query = "INSERT INTO public.users_exercises(user_id, exercise_id)
        VALUES(:userID, currval(pg_get_serial_sequence('exercises','id')))";
            $pdo = $stmt->prepare($query);
            $pdo->bindParam(':userID', $userID['id'],PDO::PARAM_STR);
            $pdo->execute();
            $stmt->commit();
        }catch(PDOException $e){
            $stmt->rollBack();
        }
    }

}