<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/add_person.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script src="https://kit.fontawesome.com/34d5627880.js" crossorigin="anonymous"></script>
    <title>Dodaj dziecko</title>
</head>
<body>

<div class="base-container">
    <?php
    include_once('public/shared/navigation.php');
    ?>
    <main>
        <header>
            <div class="header-text">
                Dodaj dziecko:
            </div>
        </header>
        <section class="profile">
            <form class="form-container" id="add-kid-f" action="addKid" method="POST" ENCTYPE="multipart/form-data" autocomplete="off">

                <label class="big-label">Dane dziecka:</label>
                <input type="text" name="kid-name" placeholder="Imie">
                <input type="text" name="kid-surname" placeholder="Nazwisko">
                <input type="text" name="kid-age" placeholder="Wiek">
                <select form="add-kid-f" name="therapist">
                    <option value="Therapist 1">Therapist 1</option>
                    <option value="Therapist 2">Therapist 2</option>
                    <option value="Therapist 3">Therapist 3</option>
                </select>

                <label class="small-label">Dodatkowe wyniki badan:</label>
                <div class="button-wrap">
                    <input type="file" id="upload-diag" name="kid-diagnosis">
                    <label class="file-button" for="upload-diag"">Prześlij plik</label>
                </div>
                <label class="small-label">Dodaj zdjecie:</label>
                <div class="button-wrap">
                    <input type="file" id="upload-photo" name="kid-photo">
                    <label class="file-button" for="upload-photo">Prześlij zdjęcie</label>
                </div>

                <label class="big-label">Dane rodzica:</label>
                <input type="text" name="parent-name" placeholder="Imie">
                <input type="text" name="parent-surname"placeholder="Nazwisko">
                <input type="text" name="phone" placeholder="Tel. kontaktowy">
                <input type="text" name="email" placeholder="email@email.com">
                <input type="password" name="password" placeholder="password">
                <button type="submit">Dodaj</button>

            </form>

        </section>
    </main>
</div>
</body>