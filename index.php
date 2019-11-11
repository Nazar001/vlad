<?php
    session_start();
    if(!empty($_SESSION['status'])) {
        switch ($_SESSION['status']) {
            case 'creator':
                $link = "/creator";
                break;
            case 'superadmin':
                $link = "/superadmin";
                break;
            case 'admin':
                $link = "/admin";
                break;
            case 'operator':
                $link = "/operator";
                break;
            case 'added':
                $link = "/added";
                break;
            case 'checker':
                $link = "/checker";
                break;
            default:
                $link = "";
                break;
        }
        if($link != ""){
            header('Location: http://'.$_SERVER['HTTP_HOST']."/dogfactory".$link);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Вход</title>
</head>
<body>
    <form class="sign-in-form" action="sign_in.php" method='post'>
        <input class="sign-in-login" type="text" placeholder="Введите логин" maxLength="32" name="login" required />
        <input class="sign-in-password" type="password" placeholder="Введите пароль" maxLength="32" name="password" required />
        <button class="sign-in-btn">Войти</button>
    </form>
</body>
</html>