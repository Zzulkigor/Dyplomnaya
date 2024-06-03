<?php
    session_start();
    require "connect/connect.php";
    //Данные из формы
    $fio = $_POST['fio'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    //Проверка на совпадение паролей
    if($pass != $confirm_password){
        $_SESSION['message'] = "Пароли не совпадают!";
        header("Location: reg.php");
        exit();
    }
    //Проверка длина логина
    if(strlen($login) < 5){
        $_SESSION['message'] = "Логин должен быть не менее 5 символов";
        header("Location: reg.php");
        exit();
    }
    //Проверка валидации на почту
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['message'] = "Неверный формат почты!";
        header("Location: reg.php");
        exit();
    }
    //Проверка уникальности логина
    $sql_login = "SELECT * FROM `users` WHERE `login` = '$login'";
    $result_login = $conn->query($sql_login);
    if(mysqli_num_rows($result_login) > 0){
        $_SESSION['message'] = "Логин занят!";
        header("Location: reg.php");
        exit();
    }
    //Добавление записей в бд
    $sql_addData = "INSERT INTO `users` (`fio`, `login`, `pass`, `email`) VALUES ('$fio', '$login', '$hashedPassword', '$email')";
    if(mysqli_query($conn,$sql_addData)){
        header("Location: auth.php");
        exit();
    }

    // $query = "SELECT * FROM `users` WHERE `name`='$name' OR `email`='$email'";
    // $result = mysqli_query($conn, $query);

    // if (mysqli_num_rows($result) > 0) {
    //     $_SESSION['message'] = "Пользователь с таким именем пользователя или адресом электронной почты уже существует.";
    //     header("Location: reg.php");
    //     exit();
    // } else {
    //     $query = "INSERT INTO `users` (`name`, `pass`, `email`) VALUES ('$name', '$hashedPassword', '$email')";
    //     mysqli_query($conn, $query);
    //     header("Location: auth.php");
    //     exit();
    // }
?>