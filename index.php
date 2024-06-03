<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Raleway:wght@100&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/Logo2.png" />
    <link rel="stylesheet" href="css/style.css">
    <title>Недвижимость</title>
</head>
<body>
    <?php
        require "blocks/header.php"
    ?>

    <div class="background">
        <img src="img/bkg.png" alt="картинка">
        <div class="text-overlay">
        <p>GOLDEN HAUSE </p>
            Помогает людям при покупке или продаже недвижимости. 
        </div>
    </div>

    <div class="content-block">
        <h1>GOLDEN HAUSE</h1>
        <p>Мы специализируемся на помощи людям при покупке или продаже недвижимости. Наша компания предоставляет широкий спектр услуг, включая:</p>
        <ul>
            <li>Поиск и подбор недвижимости по вашим требованиям и бюджету.</li>
            <li>Оценка рыночной стоимости недвижимости.</li>
            <li>Проведение сделок купли-продажи недвижимости.</li>
            <li>Юридическое сопровождение сделок.</li>
            <li>И многое другое!</li>
        </ul>
        <p>Наша компания гордится тем, что мы стремимся к высочайшему уровню профессионализма и преданности нашим клиентам. Мы обеспечиваем конфиденциальность, надежность и эффективность в каждой сделке, делая процесс покупки или продажи недвижимости беззаботным и успешным для наших клиентов.</p>
        <p>Свяжитесь с нами:</p>
        <p>Телефон: +7 (XXX) XXX-XX-XX</p>
        <p>Email: info@goldenhause.com</p>
    </div>
    <?php
        require "blocks/footer.php"
    ?>
</body>
</html>