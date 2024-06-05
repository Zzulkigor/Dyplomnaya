<?php
// Подключаем файл с настройками базы данных
require "connect/connect.php";
session_start();

// Проверяем, были ли переданы все необходимые данные
if (isset($_POST['name'], $_POST['email'], $_POST['comment'], $_POST['booking_id'])) {
    // Получаем данные из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $booking_id = $_POST['booking_id'];

    // Проверяем, существует ли сессионная переменная с ID пользователя
    if (isset($_SESSION['log_in'])) {
        $user_id = $_SESSION['log_in'];

        // Экранируем данные, чтобы избежать SQL-инъекций
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $comment = mysqli_real_escape_string($conn, $comment);

        // Формируем SQL-запрос для вставки данных в базу данных
        $sql = "INSERT INTO `reviews` (`booking_id`, `user_id`, `name`, `email`, `comment`) 
                VALUES ('$booking_id', '$user_id', '$name', '$email', '$comment')";

        // Выполняем запрос
        $result = mysqli_query($conn, $sql);

        // Проверяем успешность выполнения запроса
        if ($result) {
            // Отзыв успешно добавлен в базу данных
            header("Location: review_confirmation.php");
            exit();
        } else {
            // Ошибка при выполнении запроса
            echo "Ошибка при выполнении запроса: " . mysqli_error($conn);
        }
    } else {
        // Если пользователь не авторизован, выводим сообщение об ошибке
        echo "Ошибка: пользователь не авторизован";
    }
} else {
    // Если не все данные формы были переданы, выводим сообщение об ошибке
    echo "Ошибка: не все данные формы были переданы";
}
?>