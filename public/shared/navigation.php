<?php
session_start();
if(isset($kid)){
    echo '<script>console.log("'.$kid->getName().'");</script>';
}
if(isset($_SESSION['kid'])) $profile="kid_profile";
elseif(isset($_SESSION['therapist'])) $profile="thisTherapist_profile"
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
            <a href="exercises" class="nav-button from-top">Zadania</a>
        </li>
        <li>
            <a href="<?=$profile?>" class="nav-button from-top">Mój profil</a>
        </li>
        <li>
            <a href="logout" class="nav-button from-top">WYLOGUJ</a>
        </li>
    </ul>

</nav>
