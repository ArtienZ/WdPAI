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
    <?php if($users[0] instanceof Kid){
        echo '<script type="text/javascript" src="./public/js/searchKid.js" defer></script>';
    }if($users[0] instanceof Therapist){
        echo '<script type="text/javascript" src="./public/js/searchTherapist.js" defer></script>';
    };
    ?>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>Dodaj <?php echo $text[1]?></title>
</head>
<body>
 <div class="base-container">
     <?php
     include_once('public/shared/navigation.php');
     ?>
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
                    <input placeholder="Imie i nazwisko">
                </div>
                <div class="users-search">
                    <?php foreach ($users as $user):?>
                    <a href="#"><?= $user->getName() ." ". $user->getSurname() ?></a>
                    <?php endforeach;?>
                </div>
            </section>
        </main>
    </div>
</body>

<template id="user-template">
    <a class="searched-users" href="#"></a>
</template>