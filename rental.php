<?php
    require "connect/connect.php";
    session_start();

    // Проверяем, существует ли параметр booking_id в URL
    if(isset($_GET['booking_id'])) {
        $booking_id = $_GET['booking_id'];

        // Проверяем, что значение booking_id не пустое
        if (!empty($booking_id)) {

            // Запрос к базе данных для получения данных о бронировании по booking_id
            $sql = "SELECT * FROM `Bookings` WHERE `booking_id` = '$booking_id'";
            $result = mysqli_query($conn, $sql);

            // Проверяем, есть ли результат запроса
            if(mysqli_num_rows($result) > 0) {
                $booking_data = mysqli_fetch_assoc($result);
            } else {
                // Если бронирование не найдено, вы можете выполнить действия по умолчанию или вывести сообщение об ошибке
                echo "Бронирование не найдено";
            }
        } else {
            // Если значение booking_id пустое, выводим сообщение об ошибке
            echo "Недопустимое значение booking_id";
        }
    } else {
        // Если booking_id отсутствует в URL, выполните действия по умолчанию или выведите сообщение об ошибке
        echo "booking_id не передан в URL";
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
    <title>Аренда</title>
</head>
<body>
<div class="container4">
    <div class="rentForm">
        <form action="" method="post" class="rentForm">
            <h1>Форма аренды</h1>
            <label for="check_in_date">Дата заезда:</label>
            <input type="date" id="check_in_date" name="check_in_date" required>

            <label for="check_out_date">Дата выезда:</label>
            <input type="date" id="check_out_date" name="check_out_date" required>

            <label for="payment_method">Метод оплаты:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="cash">Наличные</option>
                <option value="card">Карта</option>
            </select>
            <br>
            <!-- Поле для передачи booking_id -->
            <input type="hidden" name="booking_id" value="<?php echo $booking_data['booking_id']; ?>">

            <button type="submit" class="btnRent">Арендовать</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Проверяем, были ли переданы данные формы аренды
                if (isset($_POST['check_in_date']) && isset($_POST['check_out_date']) && isset($_POST['payment_method']) && isset($_POST['booking_id'])) {
                    // Получаем данные из формы
                    $check_in_date = $_POST['check_in_date'];
                    $check_out_date = $_POST['check_out_date'];
                    $payment_method = $_POST['payment_method'];
                    $booking_id = $_POST['booking_id'];
                    
                    // Получаем ID пользователя из сессии
                    $user_id = $_SESSION['log_in'];
                    
                    // Добавляем запись в таблицу rentals
                    $sql = "INSERT INTO `rentals` (`booking_id`, `user_id`, `check_in_date`, `check_out_date`, `payment_method`, `status`) 
                            VALUES ('$booking_id', '$user_id', '$check_in_date', '$check_out_date', '$payment_method', 'арендовано')";
                    
                    if (mysqli_query($conn, $sql)) {
                        // Запись успешно добавлена в базу данных
                        // Можно выполнить дополнительные действия, например, перенаправить пользователя на страницу с подтверждением аренды или на его профиль
                        header("Location: success_message.php?booking_id=$booking_id");
                        exit();
                    } else {
                        // Ошибка при добавлении записи в базу данных
                        echo "Ошибка: " . mysqli_error($conn);
                    }
                } else {
                    // Не все данные формы были переданы
                    echo "Не все данные формы были переданы.";
                }
            }
        ?>
    </div>
</div>
</body>
</html>