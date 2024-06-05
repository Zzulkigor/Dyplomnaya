<?php
    session_start();
    require "connect/connect.php";

    // Проверка, авторизован ли пользователь
    if (!isset($_SESSION['log_in'])) {
        header("Location: auth.php");
        exit();
    }

    //Выход
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: index.php");
        exit();
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
    <title>Профиль</title>
</head>
<body>
    <?php
        require "blocks/header.php";
    ?>
    

    <div class="profile-container">
        <h1>Профиль пользователя</h1>
        <p>Имя пользователя: <?php echo $_SESSION['fio']; ?></p>
        <p>Логин: <?php echo $_SESSION['login']; ?></p>
        <p>Электронная почта: <?php echo $_SESSION['email']; ?></p>

        <?php
            // Извлекаем забронированные недвижимости для текущего пользователя из базы данных
            $userId = $_SESSION['log_in'];
            $sql = "SELECT * FROM `Bookings` WHERE `user_id` = '$userId'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<h2>Забронированные недвижимости</h2>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div>';
                    echo '<p>Идентификатор недвижимости: ' . $row['property_id'] . '</p>';
                    echo '<p>Статус: ' . $row['status'] . '</p>';

                    if($row['status'] === 'подтверждено'){
                        echo "<a href='rental.php?booking_id=" . $row['booking_id'] . "'>Арендовать</a>";
                    }

                    echo '</div>';
                }
            } else {
                echo '<p>Вы еще не забронировали недвижимости.</p>';
            }
        ?>

        <a href="?logout=1">Выйти</a><br>
        <a href="change_password.php">Смена пароля</a>
    </div>
</body>
</html>
