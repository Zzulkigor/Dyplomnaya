<?php
    require "connect/connect.php";
    // Админ user или нет
    // $user_id = $_SESSION['log_in'];
    // $check_admin = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '$user_id' AND `status` = 'admin'");
    // $admin = mysqli_num_rows($check_admin) > 0;
?>
<?php if(isset($_SESSION['log_in'])): ?>
    <header class="header" id="header">
        <div class="container">
            <div class="logo">
                <a href="index.php"><img src="img/Logo.png" alt="Картинка"></a>
            </div>
            <div class="nav">
                <a href="index.php" class="nav-item">Главная</a>
                <a href="catalog.php" class="nav-item">Каталог</a>
                <a href="rewiews.php" class="nav-item">Отзывы</a>
                <a href="profile.php" class="nav-item">Профиль</a>
                <!-- <?php if($admin): ?>
                    <a href="admin.php" class="nav-item">Админ панель</a>
                <?php endif; ?> -->
                <a href="logout.php" class="butt-sign">Выйти</a>
            </div>

        </div>
    </header>
<?php else: ?>
    <header class="header" id="header">
        <div class="container">
            <div class="logo">
                <a href="index.php"><img src="img/Logo.png" alt="Картинка"></a>
            </div>
            <div class="nav">
                <a href="index.php" class="nav-item">Главная</a>
                <a href="catalog.php" class="nav-item">Каталог</a>
                <a href="reg.php" class="nav-item">Регистрация</a>
                <a href="auth.php" class="butt-sign">Авторизация</a>
            </div>

        </div>
    </header>
<?php endif; ?>