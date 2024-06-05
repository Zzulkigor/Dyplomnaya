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
    <title>Регистрация</title>
</head>
<body>
    <div class="container4">
        <div class="registerForm">
            <h1>Регистрация</h1>
            <form method="post" action="reg_script.php">
                <label for="fio">ФИО:</label>
                <input type="text" id="fio" name="fio" placeholder="ФИО" required>

                <label for="login">Логин:</label>
                <input type="text" id="login" name="login" placeholder="Введите логин" required>

                <label for="email">Электронная почта:</label>
                <input type="email" id="email" name="email" placeholder="Введите почту" required>

                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" placeholder="Введите пароль" required>

                <label for="password">Подтвердите пароль:</label>
                <input type="password" id="password" name="confirm_password" placeholder="Введите пароль" required>

                <button name="btnReg" type="submit">Зарегистрироваться</button>
                <p class="subtitle">Уже есть аккаунт? <a href="auth.php">Войти</a></p>
                
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