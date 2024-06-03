<?php
session_start();
require_once "connect/connect.php";

// Проверяем, был ли отправлен POST-запрос для бронирования
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем, существует ли сессионная переменная log_in
    if (!isset($_SESSION['log_in'])) {
        echo '<p class="errors">Для бронирования пожалуйста войдите в аккаунт</p>';
    } else {
        // Проверяем, был ли передан идентификатор недвижимости
        if (isset($_POST['property_id'])) {
            $propertyId = $_POST['property_id'];

            // Проверяем текущий статус недвижимости
            $statusSql = "SELECT `status` FROM `properties` WHERE `property_id` = '$propertyId'";
            $statusResult = mysqli_query($conn, $statusSql);
            $row = mysqli_fetch_assoc($statusResult);
            $status = $row['status'];
            
            // Если недвижимость уже забронирована, выдаем сообщение об ошибке
            if ($status === 'забронирована') {
                echo '<p class="errors">Недвижимость уже забронирована</p>';
            }else{
                 // Получаем идентификатор пользователя из сессии
                $userId = $_SESSION['log_in'];
            
                // Подготавливаем SQL-запрос для добавления записи о бронировании
                $sql = "INSERT INTO `Bookings` (`property_id`, `user_id`, `status`) 
                        VALUES ('$propertyId', '$userId', 'ожидайте подтверждения')";
                
                // Выполняем SQL-запрос
                if (mysqli_query($conn, $sql)) {
                    // Обновляем статус недвижимости на "забронирована"
                    $updateSql = "UPDATE `properties` SET `status` = 'забронирована' WHERE `property_id` = '$propertyId'";
                    mysqli_query($conn, $updateSql);
                    
                    header("Location: profile.php");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        } else {
            echo '<p class="errors">Ошибка: не передан идентификатор недвижимости</p>';
        }
    }
}

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
    <title>Каталог</title>
</head>
<body>
    <?php
        session_start();

        if(!isset($_SESSION['log_in'])){
            echo '<p class="errors">Для просмотра каталога пожалуйста войдите в аккаунт</p>';
            exit();
        } else {
            $db = new PDO("mysql:host=localhost;dbname=admin2", "root", "Lindemann_1995");
            $infa = [];

            if($query = $db->query("SELECT * FROM `properties`")){
                $infa = $query->fetchAll(PDO::FETCH_ASSOC);
            } else{
                print_r($db->errorInfo());
            }
        }
    
    ?>
    <div class="title">Каталог недвижимостей</div>
    <div class="container2">
        <div class="cards">
            <?php foreach($infa as $data): ?>
                <div class="card">
                    <img src="<?= $data['img']?>" alt="картинка">
                    <div class="name">
                        <?= $data['title']?>
                    </div>
                    <div class="price">
                        <?= $data['price']?>$
                    </div>
                    <div class="butt">
                       <form method="post">
                            <input type="hidden" name="property_id" value="<?= $data['property_id'] ?>">
                            <button type="submit" class="btnRent">Забронировать</button>
                        </form>
                    </div>
                    <div class="status">
                        <?= $data['status'] ?>
                    </div>
                </div>
            <?php endforeach; ?>    
        </div>
    </div>
    
</body>
</html>