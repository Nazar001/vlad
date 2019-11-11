<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Ошибка</title>
</head>
<body>
    <?php
        session_start();
        if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
        if (isset($_POST['password'])) { $password = $_POST['password']; if ($password == '') { unset($password);} }
        $login = stripslashes($login);
        $login = htmlspecialchars($login);
        $login = trim($login);
        $password = stripslashes($password);
        $password = htmlspecialchars($password);
        $password = trim($password);
        include ("db.php");
        $result = mysqli_query($db, "SELECT * FROM admins WHERE login = '$login' LIMIT 1");
        $myrow = mysqli_fetch_array($result);
        if ($myrow) {
            if($myrow["password"] == $password) {
                $_SESSION['login'] = $myrow['login'];
                $_SESSION['status'] = $myrow['status'];
                $link;
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
                        $link = "/error";
                        break;
                }
                header('Location: http://'.$_SERVER['HTTP_HOST']."/dogfactory".$link); 
            } else {
                header('Refresh: 3; url=http://'.$_SERVER['HTTP_HOST'].'/dogfactory');
                echo "<div class='error'>Неверный пароль!</div>";
            }
        }
        else {
            header('Refresh: 3; url=http://'.$_SERVER['HTTP_HOST'].'/dogfactory');
            echo "<div class='error'>Пользыватель не существует.</div>";
        }
    ?>
</body>
</html>