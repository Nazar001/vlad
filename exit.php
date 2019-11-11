<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Выход</title>
</head>
<body>
    <?php
        session_start();
        session_destroy();
        header('Refresh: 2; url=http://'.$_SERVER['HTTP_HOST'].'/dogfactory');
        echo "<div class='exit-block'>Сесия завершена!</div>";
    ?>
</body>
</html>
