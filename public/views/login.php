<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="/public/img/logo.svg">
        </div>
        <div class="login_container">
            <form class="login" action="login" method="POST">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input class="login_inputs" name="email" type="text" placeholder="LOGIN">
                <input class="login_inputs" name="password" type="password" placeholder="HASLO">
                <button type="submit">ZALOGUJ</button>
            </form>
        </div>
    </div>
</body>