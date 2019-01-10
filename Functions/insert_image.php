<?php
function insert_image($user, $image)
{
    session_start();
    $server = 'localhost';
    $u = 'root';
    $p = 'AFRkhanattari';
    $db = 'camagru_fkhan';
    try {
        $conn = new PDO("mysql:host=$server; dbname=$db", $u, $p);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $err)
    {
        echo "Connection Failed : ".$err->getMessage();
        return (-1);
    }
    $sql = "INSERT INTO pictures (username, picture, Likes) VALUES ('$user', '$image', '0')";
    try {
        $conn->exec($sql);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
        return (0);
    }
    $conn = null;
    return (1);
}
?>