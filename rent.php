<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Raleway:wght@100&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Форма бронирования</title>
</head>
<body>
<div class="container4">
    <div class="rentForm">
        <h1>Форма бронирования</h1>
        <!-- Ваша форма аренды с полями для выбора даты заезда и выезда -->

        <form id="rentForm" action="process_rent.php?property_id=<?= $propertyId ?>" method="post">
            <input type="hidden" name="property_id" value="<?= $propertyId ?>">
            <!-- Добавьте поля для выбора даты, например: -->        
            <button type="submit" class="btnRent">Забронировать</button>
        </form>

    </div>
</div>


</body>
</html>