<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Raleway:wght@100&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Вход</title>
</head>
<body>
    <div class="container4">
        <div class="loginForm">
            <h1>Вход</h1>
            <form method="post" action="auth_script.php">
                <label for="login">Логин:</label>
                <input type="text" id="login" name="login" placeholder="Введите логин" required>

                <label for="pass">Пароль:</label>
                <input type="password" id="pass" name="pass" placeholder="Введите пароль" required>

                <button class="btnAuth" name="btn" type="submit">Войти</button>
                <p class="subtitle">Нет аккаунта? Как жал😢 <a href="reg.php">Регистрация</a></p>

                <?php 
                    if($_SESSION['message']){
                        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                    }
                    unset($_SESSION['message']);
                ?>
            </form>
        </div>
    </div>


</body>
</html>