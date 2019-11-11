<?php
    session_start();
    if($_SESSION['status'] != "creator") {
        header('Location: http://'.$_SERVER['HTTP_HOST']."/dogfactory");    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>Страница Создателя</title>
</head>
<body>
    <header>
        <div class="greeting">
            <div class="creator-greeting">Привет, 
                <div class="creator-name">
                    <?php
                        echo($_SESSION['status']);
                    ?>
                </div>
            </div>
            <a href="../exit.php" class="creator-exit">Выход</a>        
        </div>
    </header>
    <div class="creator-menu">
        <a class="creator-btn" href="./add/staff/">Добавить персонал</a>
        <a class="creator-btn" href="./add/client/">Добавить клиентов</a>
        <a class="creator-btn" href="./view/staff/">Просмотреть персонал</a>
        <a class="creator-btn" href="./view/client/">Просмотреть клиентов</a>
        <a class="creator-btn super" href="./secret/">Супер функции</a>
    </div>
</body>
</html>