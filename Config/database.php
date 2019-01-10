<?php
    $server = 'localhost';
    $u = 'root';
    $p = htmlspecialchars($_POST['password']);
    $db = 'camagru_fkhan';
    try {
        $conn = new PDO("mysql:host=$server;", $u, $p);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("CREATE DATABASE IF NOT EXISTS $db");
        $conn = new PDO("mysql:host=$server;dbname=$db", $u, $p);
    }
    catch(PDOException $err) {
        echo "Connection Failed : ".$err->getMessage();
        return (-1);
    }
    $sql = file_get_contents(realpath("../Config/camagru_fkhan.sql"));
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
    try {
        $conn->exec($sql);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    echo '<script>window.loaction.href="../login.php";</script>';
?>