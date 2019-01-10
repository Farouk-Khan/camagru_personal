<?php
function change_username($old_username, $password, $new_username)
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
    $sql = "SELECT * FROM users WHERE username='$old_username' AND password='$password' ";
    try {
        $conn->query($sql);
    }
    catch (PDOException $e)
    {
        return (0);
    }
    $sql1 = "UPDATE users SET username='$new_username' WHERE username='$old_username' ";
    try {
        $ex = $conn->prepare($sql1);
        $ex->execute();
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