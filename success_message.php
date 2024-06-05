<?php
    // Подключаем файл с настройками базы данных
    require "connect/connect.php";
    session_start();

    // Проверяем, зарегистрирован ли пользователь
    if(isset($_SESSION['login'])) {
        $name = $_SESSION['fio']; // Получаем имя пользователя из сессии
        $email = $_SESSION['email']; // Получаем email пользователя из сессии
    } else {
        $name = ''; // Устанавливаем пустое значение по умолчанию для имени
        $email = ''; // Устанавливаем пустое значение по умолчанию для email
    }

    // Получаем booking_id из параметров URL
    $booking_id = $_GET['booking_id'] ?? null;

    // Если booking_id не передан через URL, попробуем получить его из таблицы rentals
    if (!$booking_id) {
        // Получаем ID пользователя из сессии
        $user_id = $_SESSION['log_in'];

        // Запрос к базе данных для получения booking_id из таблицы rentals
        $sql = "SELECT `booking_id` FROM `rentals` WHERE `user_id` = '$user_id' ORDER BY `rental_id` DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);

        // Проверяем, есть ли результат запроса
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $booking_id = $row['booking_id'];
        }
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Успешная аренда</title>
</head>
<body>
<div class="container5">
    <h1>Успешная бронь!</h1>
    <p>Спасибо за выбор нашей недвижимости. Ваш запрос на аренду успешно принят.</p>
    <?php if ($booking_id): ?>
        <a href="review_form.php?booking_id=<?php echo $booking_id; ?>">Оставить отзыв</a>
    <?php endif; ?>
    <a href="index.php">На главную</a>
</div>
</body>
</html>