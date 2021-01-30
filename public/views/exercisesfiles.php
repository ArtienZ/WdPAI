<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/files.css">
    <title>Zadania</title>
</head>
<body>
<div class="base-container">
    <?php
    include_once('public/shared/navigation.php');
    if(!isset($exercises))die();
    ?>
    <main>
        <header>
            <p></p>
        </header>
        <section class="files">
            <?php foreach($exercises as $exercise):?>
            <div>
                <a href="/uploads/<?=$exercise->getTitle()?>" download=""><?=trim(substr($exercise->getTitle(), 0, strpos($exercise->getTitle(), ".")));?></a>
            </div>
            <?php endforeach;?>
        </section>
    </main>
</div>
</body>
