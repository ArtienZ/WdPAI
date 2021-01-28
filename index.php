<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('myprofile','DefaultController');
Routing::get('add_therapist','DefaultController');
Routing::get('add_kid','DefaultController');
Routing::post('kid_profile','DefaultController');
Routing::post('addKid','AddKidController');
Routing::post('login','SecurityController');

Routing::run($path);