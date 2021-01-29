<?php
if(isset($kid)){
    echo '<script>console.log("'.$kid->getName().'");</script>';
}
if(isset($routes)){
    foreach ($routes as $route){
        echo '<script>console.log("'.$route.'");</script>';
    }
}
?>
<nav>
    <img src="/public/img/logo.svg">
    <ul>
        <li>
            <a href="kids" class="nav-button from-top">Dzieci</a>
        </li>
        <li>
            <a href="therapists" class="nav-button from-top">Terapeuci</a>
        </li>
        <li>
            <a href="#" class="nav-button from-top">Zadania</a>
        </li>
        <li>
            <a href="#" class="nav-button from-top">Mój profil</a>
        </li>
        <li>
            <a href="#" class="nav-button from-top">WYLOGUJ</a>
        </li>
    </ul>

</nav>
