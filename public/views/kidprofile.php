<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>Mój Profil</title>
</head>
<body>
<div class="base-container">
    <nav>
        <img src="/public/img/logo.svg">
        <ul>
            <li>
                <a href="#" class="nav-button from-top">Dzieci</a>
            </li>
            <li>
                <a href="#" class="nav-button from-top">Terapeuci</a>
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
    <main>
        <header>
            <div class="search-bar">
                <form class="search-form">
                    <input placeholder="Imie i nazwisko dziecka">
                </form>
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
                            <?=
                            $kid->getName() ." ". $kid->getSurname();
                            ?>
                        </li>
                        <li>
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
                            <?=
                            $kid->getParentName() ." ". $kid->getParentSurname();
                            ?>
                        </li>
                        <li>
                            <?=
                            $kid->getPhone();
                            ?>
                        </li>
                        <li>
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