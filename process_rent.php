<?php
session_start();
require_once "connect/connect.php";

// Проверяем, существует ли property_id в GET-запросе и является ли он целым числом
if(isset($_GET['property_id']) && is_numeric($_GET['property_id'])) {
    $propertyId = $_GET['property_id'];
} else {
    // Если property_id не существует или не является числом, перенаправляем пользователя на главную страницу
    header("Location: index.php");
    exit();
}

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $userId = $_SESSION['log_in'];
    $checkInDate = $_POST['check_in'];
    $checkOutDate = $_POST['check_out'];

    // Проверяем, чтобы propertyId был числом
    if (!is_numeric($propertyId)) {
        // Если propertyId не является числом, выводим сообщение об ошибке и завершаем скрипт
        echo "Error: propertyId is not a number.";
        exit();
    }

    // Подготавливаем SQL-запрос для вставки данных бронирования
    $sql = "INSERT INTO `Bookings` (`property_id`, `user_id`, `check_in_date`, `check_out_date`, `status`) 
            VALUES ('$propertyId', '$userId', '$checkInDate', '$checkOutDate', 'новое')";

    // Выполняем SQL-запрос
    if (mysqli_query($conn, $sql)) {
        // Если запрос выполнен успешно, сохраняем информацию о бронировании в сессии
        $_SESSION['selected_property'] = [
            'property_id' => $propertyId,
            'check_in_date' => $checkInDate,
            'check_out_date' => $checkOutDate,
        ];
        // Перенаправляем пользователя на страницу профиля
        header("Location: profile.php");
        exit();
    } else {
        // Если произошла ошибка при выполнении запроса, выводим сообщение об ошибке
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Если кто-то попытается получить доступ к этому файлу напрямую, перенаправляем на главную страницу
    header("Location: index.php");
    exit();
}












































// session_start();
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     $conn = new mysqli('localhost', 'root', 'Lindemann_1995', 'admin2');

//     if(!$conn){
//         die("Ошибка в подключении");
//     }
//     // Получение данных из формы аренды
//     $check_in_date = $_POST['check_in'];
//     $check_out_date = $_POST['check_out'];
//     $property_id = $_POST['property_id'];
//     $user_id = isset($_SESSION['log_in']) ? $_SESSION['log_in'] : 0;
    

//     // Вставка данных в базу данных
//     $sql = "INSERT INTO `Bookings` (`property_id`, `user_id`, `check_in_date`, `check_out_date`) VALUES ('$property_id', '$user_id', '$check_in_date', '$check_out_date')";
//     $property_id = isset($_POST['property_id']) ? (int)$_POST['property_id'] : 0;

//     // После успешной вставки данных в базу данных
//     if (mysqli_query($conn, $sql)) {
//         // Сохраняем информацию о выбранной недвижимости в сессии
//         $_SESSION['selected_property'] = [
//             'property_id' => $property_id,
//             'check_in_date' => $check_in_date,
//             'check_out_date' => $check_out_date,
//         ];

//         // Перенаправляем на страницу с сообщением
//         header("Location: success_message.php");
//         exit();
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }

//     // Закрываем соединение с базой данных
//     mysqli_close($conn);
// } else {
//     // Если кто-то попытается получить доступ к этому файлу напрямую, перенаправьте их на главную страницу
//     header("Location: index.php");
//     exit();
// }
?>
