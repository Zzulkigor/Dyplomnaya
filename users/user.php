<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        // if(isset($_GET['user_id'])){

        //     require "connect/connect.php";

        //     $user_id = $conn->real_escape_string($_GET['user_id']);
        //     $sql = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
        //     if($result = $conn->query($sql)){
        //         if($result->num_rows > 0){
        //             foreach($result as $row){
        //                 $username = $row['name'];
        //                 $email = $row['email'];
        //                 echo "<div>
        //                 <h3>Информация о пользователе</h3>
        //                 <p>Имя: $username</p>
        //                 <p>Почта: $email</p>
        //                 </div>";
        //             }
        //         }
        //     } else{
        //         echo "<div>Пользователь не найден</div>";
        //     }
        //     $result->free();
        // }
    ?>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>