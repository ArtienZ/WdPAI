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
            <?php
            if(isset($_SESSION['kid']))$userSession = $_SESSION['kid'];
            elseif(isset($_SESSION['therapist']) || $_SESSION['role']=='owner')$userSession = $kid;
            else die()?>
            <p></p>
        </header>
        <section class="profile">
            <div class="profile-data">
                <div class="profile-photo">
                    <img src="public/uploads/<?= $userSession->getPhoto()?>">
                </div>
                <div class="personal-data">

                    <p>Dane dziecka:</p>
                    <ul>
                        <li>
                            Imie i nazwisko:<br>
                            <?=
                            $userSession->getName() ." ". $userSession->getSurname();
                            ?>
                        </li>
                        <li>
                            Wiek: <br>
                            <?=
                            $userSession->getAge();
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
                            $userSession->getParentName() ." ". $userSession->getParentSurname();
                            ?>
                        </li>
                        <li>
                            Tel.kontaktowy:<br>
                            <?=
                            $userSession->getPhone();
                            ?>
                        </li>
                        <li>
                            E-mail:<br>
                            <?=
                            $userSession->getEmail();
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="profile-menu">

                <ul>
                    <?php if(!isset($_SESSION['therapist'])):?>
                    <li>
                        <a href="/uploads/<?=$userSession->getDiagnosisFiles() ?>" class="profile-menu-buttons" download>DIAGNOZA</a>
                    </li>
                    <li>
                        <a href="#" class="profile-menu-buttons">TERAPEUTA</a>
                    </li>
                    <li>
                        <a href="#" class="profile-menu-buttons">ZOBACZ GRAFIK</a>
                    </li>
                    <?php endif;?>
                    <?php
                    if($_SESSION['role']=='owner'):?>
                    <li>
                        <form method="POST" action="delete_user">
                            <input type="hidden" name="userEmail" value="<?=$userSession->getEmail()?>"/>
                            <button class="profile-menu-buttons" type="submit">USUŃ PACJENTA</button>
                        </form>
                    </li>
                    <?php endif;?>
                </ul>

            </div>


        </section>
    </main>
</div>
</body>