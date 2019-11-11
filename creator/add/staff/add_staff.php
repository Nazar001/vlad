<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../style.css">
    <title>Добавления персонала</title>
</head>
<body>
    <?php
        session_start();
        if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
        if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
        if (isset($_POST['status'])) { $status=$_POST['status']; if ($status =='') { unset($status);} }
        if (isset($_POST['region'])) { $region=$_POST['region']; if ($region =='') { unset($region);} }
        $login = stripslashes($login);
        $login = htmlspecialchars($login);
        $login = trim($login);
        $password = stripslashes($password);
        $password = htmlspecialchars($password);
        $password = trim($password);
        $status = stripslashes($status);
        $status = htmlspecialchars($status);
        $status = trim($status);
        $region = stripslashes($region);
        $region = htmlspecialchars($region);
        $region = trim($region);
        $whocreated = $_SESSION['login']."/".$_SESSION['status'];
        include ("../../../db.php");
        $result = mysqli_query($db, "SELECT * FROM admins WHERE login = '$login' LIMIT 1");
        if($result){
            $myrow = mysqli_fetch_array($result);
            if (!empty($myrow)) {
                header('Refresh: 3; url=http://'.$_SERVER['HTTP_HOST'].'/dogfactory/superadmin/add/staff');
                exit ("<div class='warning'>Пользыватель с даным никнеймом существует!</div>");
            }
        }   
        $result2 = mysqli_query ($db, "INSERT INTO admins (login, password, region, status, whocreated) VALUES('$login','$password','$status','$region','$whocreated')");
        if ($result2=='TRUE')
        {
            header('Refresh: 3; url=http://'.$_SERVER['HTTP_HOST'].'/dogfactory/superadmin/add/staff');
            echo "<div class='sucsess'>Пользыватель успешно создан!</div>";
        } else {
            header('Refresh: 3; url=http://'.$_SERVER['HTTP_HOST'].'/dogfactory/superadmin/add/staff');
            echo "<div class='error'>Ошибка! Клиент не был внесен в базу даных!!!</div>";
        }
    ?>
</body>
</html>