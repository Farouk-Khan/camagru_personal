<?php
    echo "Please submit your details to start the Camagru Application";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru setup</title>
</head>
<body>
    <form action="database.php" method="POST">
        <h1>Please input the password for your root account on PHPMyAdmin</h1>
        <input type="password" name="password" id="password">
        <input type="submit" value="OK">
    </form>
</body>
</html>