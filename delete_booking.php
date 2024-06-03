<?php
session_start();
require "connect/connect.php";

// Проверяем, является ли текущий пользователь администратором
if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    // Если пользователь не является администратором, перенаправляем его на другую страницу
    header("Location: index.php");
    exit();
}

// Проверяем, был ли отправлен запрос на удаление бронирования
if (isset($_POST['booking_id'])) {
    $bookingId = $_POST['booking_id'];

    // Запрос к базе данных для удаления бронирования
    $deleteQuery = "DELETE FROM `Bookings` WHERE `booking_id` = $bookingId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo "Бронирование успешно удалено.";
    } else {
        echo "Ошибка при удалении бронирования: " . mysqli_error($conn);
    }
} else {
    echo "Неверный запрос.";
}

// Возвращаемся обратно на страницу с информацией о пользователях и бронированиях
echo "<a href='user_bookings.php'>Назад</a>";
?>
