<?php
    session_start();
    if($_SESSION['status'] != "checker") {
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
    <title>Список обработаных клиентов</title>
</head>
<body>
    <header>
        <a class="menu-btn-main" href="../../">Главная</a>
        <a class="menu-btn-exit" href="../../../exit.php">Выход</a>
    </header>
    <ul class="client-list">
        <?php
            include ("../../../db.php");
            $result = mysqli_query($db, "SELECT * FROM clients WHERE status != 0");
            $myrow = mysqli_fetch_array($result);
            do
            {
                echo('<li class="client-item">
                <div class="client-id">'.$myrow['id'].'</div>
                <div class="client-name">'.$myrow['name'].'</div>
                <div class="client-phone">'.$myrow['phone'].'</div>    
                <div class="client-region">'.$myrow['region'].'</div>    
                <div class="client-whocreated">'.$myrow['whocreated'].'</div>    
                <div class="client-comment">'.$myrow['comment'].'</div>    
                <div class="client-callback">'.$myrow['callback'].'</div>    
                <div class="client-status">'.$myrow['status'].'</div>    
                </li>');
            }
            while($myrow = mysqli_fetch_array($result));
        ?>
    </ul>
</body>
</html>