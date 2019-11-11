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
    <link rel="stylesheet" href="../../../style.css">
    <title>Добавления сотрудников</title>
</head>
<body>
    <header>
        <a class="menu-btn-main" href="../../">Главная</a>
        <a class="menu-btn-exit" href="../../../exit.php">Выход</a>
    </header>
    <h3>Добавления сотрудников</h3>
    <form class="staff-add-form" action="add_staff.php" method='post' class="form">
        <input class="staff-login" type="text" placeholder="Введите логин" maxLength="32" minLength="5" name="login" required />
        <input class="staff-password" type="password" placeholder="Введите пароль" maxLenghth="32" minLength="8" name="password" required />
        <select class="status" name="staff-status" required>
            <option class="status-option" value="added">Добавлятор</option>
            <option class="status-option" value="operator">Оператор</option>
            <option class="status-option" value="checker">Чекер</option>
        </select>
        <select class="region" name="region" required>
            <option class="region-option" value="ua">ua</option>
            <option class="region-option" value="ru">ru</option>
            <option class="region-option" value="eu">eu</option>
            <option class="region-option" value="ua-ru">ua-ru</option>
            <option class="region-option" value="ua-eu">ua-eu</option>
            <option class="region-option" value="ru-eu">ru-eu</option>
            <option class="region-option" value="all">all</option>
        </select>
        <button class="add-btn">Добавить</button>
    </form>
</body>
</html>