<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__.'/../models/Kid.php';
require_once __DIR__.'/../repository/ExerciseRepository.php';
class ExercisesController extends AppController
{
    private $messages = [];
    private $exercisesRepository;

    public function __construct()
    {
        $this->exercisesRepository = new ExerciseRepository();
    }
    public function exercises(){
        session_start();
        if(isset($_SESSION['kid']) || isset($_SESSION['therapist']) || $_SESSION['role']=='owner'){
            $allExercises = $this->exercisesRepository->getFiles($_SESSION["useremail"]);
            $this->render('exercisesfiles', ['exercises' => $allExercises]);
        }else{
            $this->render('nopermission');
        }
    }


}