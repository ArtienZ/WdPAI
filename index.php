<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('therapists','TherapistController');
Routing::get('kids','KidController');
Routing::get('add_kid','KidController');
Routing::post('logout','SecurityController');
Routing::post('kid_profile','KidController');
Routing::post('this_profile','KidController');
Routing::post('therapist_profile', 'TherapistController');
Routing::post('thisTherapist_profile', 'TherapistController');
Routing::post('addKid','KidController');
Routing::post('addTherapist', 'TherapistController');
Routing::post('login','SecurityController');
Routing::post('searchKid','KidController');
Routing::post('delete_user','KidController');
Routing::post('searchTherapist','TherapistController');
Routing::post('nopermission','DefaultController');
Routing::post('exercises','ExercisesController');

Routing::run($path);