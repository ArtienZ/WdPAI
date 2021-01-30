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
        $add='addKid';
        $action='kid_profile';
        echo '<script type="text/javascript" src="./public/js/searchKid.js" defer></script>';
    }elseif($users[0] instanceof Therapist){
        $add='addTherapist';
        $action='therapist_profile';
        echo '<script type="text/javascript" src="./public/js/searchTherapist.js" defer></script>';
    }else{
        $add='nopermission';
    }
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
                            <a href="/<?=$add?>">Dodaj <?php echo $text[0]?></a>
                        </li>
                    </ul>

                </form>
                <p>Lub szukaj <?php echo $text[1]?> w bazie: </p>
                <div class="search-bar">
                    <input placeholder="Imie i nazwisko">
                </div>
                <div class="users-search">

                    <?php foreach ($users as $user):?>
                    <form method="POST" action="<?=$action?>">
                    <input type="hidden" name="userEmail" value="<?=$user->getEmail()?>"/>
                    <button type="submit"><?= $user->getName() ." ". $user->getSurname() ?></button>
                    </form>
                    <?php endforeach;?>

                </div>
            </section>
        </main>
    </div>
</body>

<template id="user-template">
    <a class="searched-users" href="#"></a>
</template>