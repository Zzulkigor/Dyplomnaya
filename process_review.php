<?php
// process_review.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Подключение к базе данных
    $conn = new mysqli('localhost', 'root', 'Lindemann_1995', 'admin2');
    if (!$conn) {
        die("Ошибка в подключении");
    }

    // Получение данных из формы отзыва
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Вставка данных в базу данных
    $sql = "INSERT INTO reviews (name, email, comment) VALUES ('$name', '$email', '$comment')";

    if (mysqli_query($conn, $sql)) {
        // Если запрос выполнен успешно, перенаправляем на страницу с подтверждением
        header("Location: review_confirmation.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // Если кто-то попытается получить доступ к этому файлу напрямую, перенаправьте их на главную страницу
    header("Location: index.php");
    exit();
}
?>
