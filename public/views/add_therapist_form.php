<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/add_person.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script src="https://kit.fontawesome.com/34d5627880.js" crossorigin="anonymous"></script>
    <title>Dodaj terapeute</title>
</head>
<body>

<div class="base-container">
    <?php
    include_once('public/shared/navigation.php');
    ?>
    <main>
        <header>
            <div class="header-text">
Dodaj terapeute:
            </div>
        </header>
        <section class="profile">
            <form class="form-container" id="add-therapist-f" action="addTherapist" method="POST" ENCTYPE="multipart/form-data" autocomplete="off">
                <label class="big-label">Dane personalne:</label>
                <input type="text" name="name" placeholder="Imie">
                <input type="text" name="surname" placeholder="Nazwisko">
                <input type="text" name="phone" placeholder="Tel. kontaktowy">
                <input type="text" name="email" placeholder="email@email.com">
                <input type="text" name="specialization" placeholder="Specjalizacja">
                <input type="password" name="password" placeholder="Haslo">
                <label class="small-label">Dodaj zdjecie:</label>
                <div class="button-wrap">
                    <input type="file" id="upload-photo" name="photo">
                    <label class="file-button" for="upload-photo">Prześlij zdjęcie</label>
                </div>
                <label class="big-label">Dane rozliczeniowe:</label>
                <input type="text" name="account-number" placeholder="Numer konta">
                <input type="text" name="hourly-rate"placeholder="Stawka za godzine">
                <button type="submit">Dodaj</button>
            </form>

        </section>
    </main>
</div>
</body>