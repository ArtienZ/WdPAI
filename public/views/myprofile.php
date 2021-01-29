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
        ?>
        <main>
            <header>
                <div class="search-bar">
                    <input placeholder="Imie i nazwisko terapeuty">
                </div>
            </header>
            <section class="profile">
                <div class="profile-data">
                    <div class="profile-photo">
                        <img src="public\uploads\kitten-small.png">
                    </div>
                    <div class="personal-data">
                        <p>Dane personalne:</p>
                        <ul>
                            <li>
                                Imie i nazwisko:<br>
                                <?=$therapist->getName()." ".$therapist->getSurname() ?>
                            </li>
                            <li>
                                Tel.kontaktowy:<br>
                                <?=$therapist->getPhone()?>
                            </li>
                            <li>
                                E-mail:<br>
                                <?=$therapist->getEmail()?>
                            </li>
                            <li>
                                Specjalizacja:<br>
                                <?=$therapist->getSpecialization()?>
                            </li>
                        </ul>
                    </div>
                    <div id="payment-details">
                        <p>Dane rozliczeniowe: </p>
                        <ul>
                            <li>Numer konta:<br>
                                <?=$therapist->getAccountNumber()?></li>
                            <li>Stawka godzinowa<br> <?=$therapist->getHourlyRate()?></li>
                        </ul>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul>
                        <li>
                            <a href="#" class="profile-menu-buttons">MOJE ZADANIA</a>
                        </li>
                        <li>
                            <a href="#" class="profile-menu-buttons">GRAFIK</a>
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
            <?php
            if(isset($messages) || isset($kid)){
                foreach ($messages as $message){
                    echo $message;
                }
            }
            ?>
        </main>
    </div>
</body>