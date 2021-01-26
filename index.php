<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index','DefaultController');
Routing::get('myprofile','DefaultController');
Routing::get('add_therapist','DefaultController');
Routing::post('login','SecurityController');
Routing::run($path);

?>