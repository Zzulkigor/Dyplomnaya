<?php
    //Подключение к бд 
    $conn = new mysqli('localhost', 'root', 'Lindemann_1995', 'admin2');

    //Проверка подключения 
    if(!$conn){
        die("Ошибка в подключении");
    }
    
?>


