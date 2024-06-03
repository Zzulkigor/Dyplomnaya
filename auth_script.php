<?php
require "connect/connect.php";
session_start();

$login = $_POST['login'];
$password = $_POST['pass'];
//Проверка, если пользвотель админ
if($login === 'admin' && $password === 'admin'){
    $_SESSION['admin'] = true;
    header("Location: admin_panel.php");
    exit();
}
//Проверка на уникальность логина
$check_user = "SELECT * FROM `users` WHERE `login` = '$login'";
$result_check = mysqli_query($conn, $check_user);
$user = mysqli_fetch_assoc($result_check);
//Существует ли пользователь
if($user){
    //Проверка пароля
    if(password_verify($password, $user['pass'])){
        $_SESSION['log_in'] = $user['user_id'];
        $_SESSION['fio'] = $user['fio'];
        $_SESSION['login'] = $user['login'];
        $_SESSION['email'] = $user['email'];
        header("Location: index.php");
        exit();
    } else{
        $_SESSION['message'] = "Неверный логин или пароль";
    }
} else{
    $_SESSION['message'] = "Неверный логин или пароль";
}
header("Location: auth.php");

if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: index.php");
  exit();
}

//Если результат совпадает с бд
// if (mysqli_num_rows($result) === 1) {
//   $row = mysqli_fetch_assoc($result);
//   $db_pass_hash = $row['pass'];

//   //Проверка введенного пароля с хэшированным
//   if (password_verify($pass, $db_pass_hash)) {
//     $_SESSION['log_in'] = $row['user_id']; // Записываем id пользователя в сессию 
//     $_SESSION['username'] = $row['name'];
//     $_SESSION['email'] = $row['email'];
//     //Проверяем, является ли пользователь администратором
//     // if ($row['status'] === 'admin') {
//     //   $_SESSION['admin'] = true;
//     // }
//     header("Location: index.php");
//     exit();
//   } else {
//     $_SESSION['message'] = "Неверный пароль";
//     header("Location: auth.php");
//     exit();
//   }
// } else {
//   $_SESSION['message'] = "Неверный email или пароль";
//   header("Location: auth.php");
//   exit();
// }
?>