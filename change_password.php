<?php
    require "connect/connect.php";
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
    <title>Смена пароля</title>
</head>
<body>
    <div class="container4">
        <div class="loginForm">
            <h1>Смена пароля</h1>
            <form method="post" action="">
                <label for="pass">Старый пароль:</label>
                <input type="password" id="pass" name="old_pass" placeholder="Введите старый пароль" required>

                <label for="pass">Новый пароль:</label>
                <input type="password" id="pass" name="new_pass" placeholder="Введите новый пароль" required>

                <label for="pass">Подтвердите новый пароль:</label>
                <input type="password" id="pass" name="new_pass_confirm" placeholder="Повторите новый пароль" required>

                <button class="btnAuth" name="submit" type="submit">Сменить пароль</button>

                <?php 
                    if($_SESSION['message']){
                        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                    }
                    unset($_SESSION['message']);
                ?>
            </form>

            <?php
                if(isset($_POST['submit'])){
                    $old_pass = $_POST['old_pass'];
                    $new_pass = $_POST['new_pass'];
                    $new_pass_confirm = $_POST['new_pass_confirm'];
                    $user_id = $_SESSION['log_in'];

                    if(empty($old_pass) || empty($new_pass) || empty($new_pass_confirm)){
                        $_SESSION['message'] = "Пожалуйста, заполните все поля";
                    } else {
                        // Проверка старого пароля
                        $sql_check = "SELECT `pass` FROM `users` WHERE `user_id` = '$user_id'";
                        $result_check = mysqli_query($conn, $sql_check);
                        
                        if(mysqli_num_rows($result_check) > 0){
                            $row = mysqli_fetch_assoc($result_check);
                            $hash = $row['pass'];
                            if(password_verify($old_pass, $hash)){
                                // Проверка совпадения новых паролей
                                if($new_pass !== $new_pass_confirm){
                                    $_SESSION['message'] = "Новые пароли не совпадают";
                                } else {
                                    // Обновление пароля
                                    $new_hash = password_hash($new_pass, PASSWORD_DEFAULT);
                                    $sql_update = "UPDATE `users` SET `pass` = '$new_hash' WHERE `user_id` = '$user_id'";
                                    $result_update = mysqli_query($conn, $sql_update);
                                    if($result_update){
                                        $_SESSION['message'] = "Пароль успешно изменен";
                                        header("Location: index.php");
                                        exit();
                                    } else {
                                        $_SESSION['message'] = "Ошибка при изменении пароля";
                                    }
                                }
                            } else {
                                $_SESSION['message'] = "Вы ввели неверный старый пароль";
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>