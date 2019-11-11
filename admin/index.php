<?php
    session_start();
    if($_SESSION['status'] != "admin") {
        header('Location: http://'.$_SERVER['HTTP_HOST']);    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>Страница Администратора</title>
</head>
<body>
    <header>
        <a class="menu-btn" href="./add/staff/">Добавить персонал</a>
        <a class="menu-btn" href="./view/staff/">Просмотреть персонал</a>
        <a class="menu-btn-exit" href="../exit.php">Выход</a>
    </header>
</body>
</html>