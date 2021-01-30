<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <title>Mój Profil</title>
</head>
<body>
    <div class="base-container">
        <?php
        include_once('public/shared/navigation.php');
        if(isset($therapistprof)) $userSession=$therapistprof;
        elseif(isset($_SESSION['therapist'])) $userSession = $_SESSION['therapist'];
        else die(); ?>
        <main>
            <header>
                <p></p>
            </header>
            <section class="profile">
                <div class="profile-data">
                    <div class="profile-photo">
                        <img src="public\uploads\<?=$userSession->getPhoto()?>">
                    </div>
                    <div class="personal-data">
                        <p>Dane personalne:</p>
                        <ul>
                            <li>
                                Imie i nazwisko:<br>
                                <?=$userSession->getName()." ".$userSession->getSurname() ?>
                            </li>
                            <li>
                                Tel.kontaktowy:<br>
                                <?=$userSession->getPhone()?>
                            </li>
                            <li>
                                E-mail:<br>
                                <?=$userSession->getEmail()?>
                            </li>
                            <li>
                                Specjalizacja:<br>
                                <?=$userSession->getSpecialization()?>
                            </li>
                        </ul>
                    </div>
                    <div id="payment-details">
                        <p>Dane rozliczeniowe: </p>
                        <ul>
                            <li>Numer konta:<br>
                                <?=$userSession->getAccountNumber()?></li>
                            <li>Stawka godzinowa<br> <?=$userSession->getHourlyRate()?></li>
                        </ul>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul>
                        <li>
                            <a href="exercises" class="profile-menu-buttons">MOJE ZADANIA</a>
                        </li>
                        <li>
                            <a href="https://calendar.google.com/calendar/r/eventedit?" target="_blank" rel="nofollow" class="profile-menu-buttons">GRAFIK</a>
                        </li>
                        <li>
                            <a href="#" class="profile-menu-buttons">MOJE DZIECI</a>
                        </li>
                        <li>
                            <a href="#" class="profile-menu-buttons">HISTORIA WYPŁAT</a>
                        </li>
                        <li>
                            <a href="#" class="profile-menu-buttons">PROŚBY URLOPOWE I L4</a>
                        </li>
                        <li>
                            <a href="#" class="profile-menu-buttons">EDYTUJ PROFIL</a>
                        </li>
                    </ul>
                </div>

            </section>
        </main>
    </div>
</body>