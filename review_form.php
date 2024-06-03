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
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="comment">Отзыв:</label>
        <textarea id="comment" name="comment" required></textarea>

        <button type="submit">Отправить отзыв</button>
    </form>
</div>

</body>
</html>