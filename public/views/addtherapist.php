<!DOCTYPE html>
<?php
if(isset($messages))
{
    $text = $messages;
}
?>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_add_someone.css">
    <title>Dodaj <?php echo $text[1]?></title>
</head>
<body>
 <div class="base-container">
        <nav>
            <img src="/public/img/logo.svg" alt="logo">
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
                <p></p>
            </header>
            <section class="profile">
                <form>
                    <ul>
                        <li>
                            <a href="#">Dodaj <?php echo $text[0]?></a>
                        </li>
                    </ul>

                </form>
                <p>Lub szukaj <?php echo $text[1]?> w bazie: </p>
                <div class="search-bar">
                    <form class="search-form">
                        <input placeholder="Imie i nazwisko <?php echo $text[1]?>">
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>