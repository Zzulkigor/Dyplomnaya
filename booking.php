<?php
session_start();
require "connect/connect.php";

// Проверяем, является ли текущий пользователь администратором
if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header("Location: index.php");
    exit();
}

$queryUsers = "SELECT * FROM `users`";
$resultUsers = mysqli_query($conn, $queryUsers);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>

<h2>Информация о пользователях и арендованных недвижимостях:</h2>

<?php
// Вывод данных о пользователях
while ($rowUsers = mysqli_fetch_assoc($resultUsers)) {
    echo "Имя: " . $rowUsers['name'] . "<br>";
    echo "Email: " . $rowUsers['email'] . "<br>";

    // Запрос к базе данных для выбора данных арендованных недвижимостей
    $userId = $rowUsers['user_id'];
    $queryBookings = "SELECT * FROM `Bookings` WHERE `user_id` = $userId";
    $resultBookings = mysqli_query($conn, $queryBookings);

    // Вывод данных об арендованных недвижимостях
    while ($rowBookings = mysqli_fetch_assoc($resultBookings)) {
        $queryProperty = "SELECT * FROM `properties` WHERE `property_id` = $rowBookings[property_id]";
        $resultProperty = mysqli_query($conn, $queryProperty);
        $rowProperty = mysqli_fetch_assoc($resultProperty);
        // Вывод информации о бронировании
        echo "Имя недвижимости: " . $rowProperty['name'] . "<br>";
        echo "Дата заезда: " . $rowBookings['check_in_data'] . "<br>";
        echo "Дата выезда: " . $rowBookings['check_out_data'] . "<br>";
    }
    
}

?>

</body>
</html>
