<?php
// Подключаем файл с настройками базы данных
require "connect/connect.php";
session_start();

// Получаем ID пользователя из сессии
$user_id = $_SESSION['log_in'] ?? null;

// Проверяем, зарегистрирован ли пользователь
if(isset($_SESSION['login'])) {
    $name = $_SESSION['fio']; // Получаем имя пользователя из сессии
    $email = $_SESSION['email']; // Получаем email пользователя из сессии
} else {
    $name = ''; // Устанавливаем пустое значение по умолчанию для имени
    $email = ''; // Устанавливаем пустое значение по умолчанию для email
}

// Получаем booking_id из таблицы rentals для текущего пользователя
if ($user_id) {
    $sql = "SELECT `booking_id` FROM `rentals` WHERE `user_id` = '$user_id' ORDER BY `rental_id` DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    // Проверяем, есть ли результат запроса
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $booking_id = $row['booking_id'];
    } else {
        // Если нет активной аренды для пользователя, установите booking_id в null или выполните другие действия
        $booking_id = null;
    }
} else {
    // Если пользователь не авторизован, установите booking_id в null или выполните другие действия
    $booking_id = null;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Raleway:wght@100&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Оставить отзыв</title>
</head>
<body>

<div class="container6">
    <h1>Оставить отзыв</h1>

    <form action="process_review.php" method="post">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($name); ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email); ?>">

        <!-- Передача booking_id через скрытое поле формы -->
        <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($booking_id); ?>">

        <label for="comment">Отзыв:</label>
        <textarea id="comment" name="comment" required></textarea>

        <button type="submit">Отправить отзыв</button>
    </form>
</div>

</body>
</html>