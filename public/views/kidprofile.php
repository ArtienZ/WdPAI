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
                    <input placeholder="Imie i nazwisko dziecka">
            </div>
        </header>
        <section class="profile">
            <div class="profile-data">
                <div class="profile-photo">
                    <img src="public/uploads/<?= $kid->getPhoto()?>">
                </div>
                <div class="personal-data">
                    <p>Dane dziecka:</p>
                    <ul>
                        <li>
                            Imie i nazwisko:<br>
                            <?=
                            $kid->getName() ." ". $kid->getSurname();
                            ?>
                        </li>
                        <li>
                            Wiek: <br>
                            <?=
                            $kid->getAge();
                            ?>
                        </li>
                    </ul>
                </div>
                <div id="payment-details">
                    <p>Dane rodzica: </p>
                    <ul>
                        <li>
                            Imie i nazwisko:<br>
                            <?=
                            $kid->getParentName() ." ". $kid->getParentSurname();
                            ?>
                        </li>
                        <li>
                            Tel.kontaktowy:<br>
                            <?=
                            $kid->getPhone();
                            ?>
                        </li>
                        <li>
                            E-mail:<br>
                            <?=
                            $kid->getEmail();
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="profile-menu">
                <ul>
                    <li>
                        <a href="#" class="profile-menu-buttons">DIAGNOZA</a>
                    </li>
                    <li>
                        <a href="#" class="profile-menu-buttons">TERAPEUTA</a>
                    </li>
                    <li>
                        <a href="#" class="profile-menu-buttons">ZOBACZ GRAFIK</a>
                    </li>
                    <li>
                        <a href="#" class="profile-menu-buttons">USUŃ PACJENTA</a>
                    </li>
                </ul>
            </div>

        </section>
    </main>
</div>
</body>