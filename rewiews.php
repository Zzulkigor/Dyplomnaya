<?php
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
    <title>Отзывы</title>
</head>
<body>
    <?php

    require "connect/connect.php";
    require "blocks/header.php";

    // Выполнить запрос к таблице reviews
    $query = "SELECT * FROM reviews";
    $result = $conn->query($query);
    if ($result === false) {
        die("Не удалось выполнить запрос к базе данных: " . $conn->error);
    }

    // Обработать результаты запроса
    while ($row = $result->fetch_assoc()) {
        // Выводим отзыв
        echo "<h2>Имя: " . $row['name'] . "</h2>";
        echo "<h3>Отзыв: " . $row['comment'] . "</h3>";
    }

    // Закрыть соединение с базой данных
    $conn->close();

    ?>
</body>
</html>
