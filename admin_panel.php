<?php
    session_start();
    require "connect/connect.php";

    if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true){
        header("Location: auth.php");
        exit();
    }

    $sql = "SELECT u.fio, u.email, u.login, b.property_id, b.status
    FROM `users` u
    LEFT JOIN `Bookings` b ON u.user_id = b.user_id";
    $result = mysqli_query($conn, $sql);
  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Raleway:wght@100&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Панель администратора</title>
</head>
<body>
    <h2 class="text-center">Панель администратора</h2>
    <br><br>
    <table>
        <tr>
            <th>ФИО</th>
            <th>Почта</th>
            <th>Логин</th>
            <th>Бронирование</th>
            <th>Cтатус</th>
        </tr>

        <?php
            if($result){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>" . $row['fio'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['login'] . "</td>";
                        echo "<td>" . $row['property_id'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";

                        if($row['status'] === 'ожидайте подтверждения'){
                            echo "<td><a href='change_status.php?property_id=".$row['property_id']."'>Изменить</a></td>";
                        }

                        // if($row['status'] === 'новое'){
                        //     echo "<td><a href='change_status.php?id_order=".$row['id_order']."'>Изменить</a></td>";
                        // } else{
                        //     echo "<td>Статус изменен</td>";
                        // }
                        echo "</tr>";
                    }
                }
            }
        ?>
    </table>
    <a href="logout.php">Выйти</a>
</body>
</html>