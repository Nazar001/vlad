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
    <link rel="stylesheet" href="../../../style.css">
    <title>Добавления клиента</title>
</head>
<body>
    <header>
        <a class="menu-btn-main" href="../../">Главная</a>
        <a class="menu-btn-exit" href="../../../exit.php">Выход</a>
    </header>
    <h3 class="h3">Добавления клиента</h3>
    <form class="client-add-form" action="add_client.php" method='post' class="form">
        <input class="client-name" type="text" placeholder="Введите имя" maxLength="32" minLength="5" name="name" required />
        <input class="client-phone" type="text" placeholder="Введите телефон" maxLenghth="20" minLength="10" name="phone" required />
        <select class="region" name="region" id="" required>
            <option class="option" value="ua">ua</option>
            <option class="option" value="ru">ru</option>
            <option class="option" value="eu">eu</option>
        </select>
        <button class="client-add-btn">Добавить</button>
    </form>
</body>
</html>
