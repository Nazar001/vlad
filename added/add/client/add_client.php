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
    <?php
        session_start();
        if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} }
        if (isset($_POST['phone'])) { $phone=$_POST['phone']; if ($phone =='') { unset($phone);} }
        if (isset($_POST['region'])) { $region=$_POST['region']; if ($region =='') { unset($region);} }
        $name = stripslashes($name);
        $name = htmlspecialchars($name);
        $name = trim($name);
        $phone = stripslashes($phone);
        $phone = htmlspecialchars($phone);
        $phone = trim($phone);
        $region = stripslashes($region);
        $region = htmlspecialchars($region);
        $region = trim($region);
        $whocreated = $_SESSION['login']."/".$_SESSION['status'];
        include ("../../../db.php");
        $result = mysqli_query($db, "SELECT * FROM clients WHERE name = '$name' LIMIT 1");
        if($result){
            $myrow = mysqli_fetch_array($result);
            if (!empty($myrow)) {
                header('Refresh: 3; url=http://'.$_SERVER['HTTP_HOST'].'/superadmin/add/client');
                exit ("<div class='warning'>Клиент с даным номером телефона уже имеится в базе даных!</div>");
            }
        }   
        $result2 = mysqli_query ($db, "INSERT INTO clients (name, phone, region, whocreated, comment, callback) VALUES('$name','$phone','$region', '$whocreated', '', '')");
        if ($result2=='TRUE')
        {
            header('Refresh: 3; url=http://'.$_SERVER['HTTP_HOST'].'/superadmin/add/client');
            echo "<div class='sucsess'>Клиент успешно добавлен!</div>";
        } else {
            header('Refresh: 3; url=http://'.$_SERVER['HTTP_HOST'].'/superadmin/add/client');
            echo "<div class='error'>Ошибка! Клиент не был внесен в базу даных!!!</div>";
        }
    ?>
</body>
</html>