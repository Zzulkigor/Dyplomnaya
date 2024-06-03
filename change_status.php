<?php
require "connect/connect.php";
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
    header("Location: auth.php");
    exit();
}

if (isset($_GET['property_id'])) {
    $property_id = $_GET['property_id'];
    
    // Получаем текущий статус бронирования
    $sql_check_booking = "SELECT * FROM `Bookings` WHERE `property_id` = '$property_id'";
    $res_check_booking = mysqli_query($conn, $sql_check_booking);

    if (mysqli_num_rows($res_check_booking) === 0) {
        $_SESSION['error'] = "Бронирование с указанным идентификатором не найдено";
        header("Location: admin_panel.php");
        exit();
    }

    $row = mysqli_fetch_assoc($res_check_booking);
    $current_status = $row['status'];

    if ($current_status != 'ожидайте подтверждения') {
        $_SESSION['error'] = "Нельзя изменить статус бронирования с текущим статусом '$current_status'";
        header("Location: admin_panel.php");
        exit();
    }

    // Обновляем статус бронирования
    $sql_update_status = "UPDATE `Bookings` SET `status`='подтверждено' WHERE `property_id`='$property_id'";
    if (mysqli_query($conn, $sql_update_status)) {
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
} else {
    $_SESSION['error'] = "Не указан идентификатор бронирования";
    header("Location: admin_panel.php");
    exit();
}
?>