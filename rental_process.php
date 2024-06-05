<?php
require "connect/connect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, были ли переданы данные формы аренды
    if (isset($_POST['check_in_date']) && isset($_POST['check_out_date']) && isset($_POST['payment_method']) && isset($_POST['booking_id'])) {
        // Получаем данные из формы
        $check_in_date = $_POST['check_in_date'];
        $check_out_date = $_POST['check_out_date'];
        $payment_method = $_POST['payment_method'];
        $booking_id = $_POST['booking_id'];
        
        // Получаем ID пользователя из сессии
        $user_id = $_SESSION['log_in'];
        
        // Добавляем запись в таблицу rentals
        $sql = "INSERT INTO `rentals` (`booking_id`, `user_id`, `check_in_date`, `check_out_date`, `payment_method`, `status`) 
                VALUES ('$booking_id', '$user_id', '$check_in_date', '$check_out_date', '$payment_method', 'арендовано')";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: success_message.php?booking_id=$booking_id");
            exit();
        } else {
            // Ошибка при добавлении записи в базу данных
            echo "Ошибка: " . mysqli_error($conn);
        }
    } else {
        // Не все данные формы были переданы
        echo "Не все данные формы были переданы.";
    }
} else {
    // Если скрипт был вызван напрямую, а не через метод POST, выводим сообщение об ошибке
    echo "Доступ запрещен.";
}
?>