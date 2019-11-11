<?php
    session_start();
    if($_SESSION['status'] != "superadmin") {
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
    <title>Список всех клиентов</title>
</head>
<body>
    <header>
        <a class="menu-btn-main" href="../../">Главная</a>
        <a class="menu-btn-exit" href="../../../exit.php">Выход</a>
    </header>
    <ul class="staff-list">
        <?php
            include ("../../../db.php");
            $result = mysqli_query($db, "SELECT * FROM admins");
            $myrow = mysqli_fetch_array($result);
            do
            {
                if($myrow['status'] !== "creator" && $myrow['status'] !== "superadmin")
                echo('<li class="staff-item">
                <div class="staff-id">'.$myrow['id'].'</div>
                <div class="staff-login">'.$myrow['login'].'</div>
                <div class="staff-password">'.$myrow['password'].'</div>
                <div class="staff-region">'.$myrow['region'].'</div>    
                <div class="staff-status">'.$myrow['status'].'</div>    
                <div class="staff-whocreated">'.$myrow['whocreated'].'</div>    
                </li>');
            }
            while($myrow = mysqli_fetch_array($result));
        ?>
    </ul>
</body>
</html>