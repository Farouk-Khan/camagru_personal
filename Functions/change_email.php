<?php
function change_email($username, $new_email, $password)
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
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    try {
        $conn->query($sql);
    }
    catch (PDOException $e)
    {
        return (0);
    }
    $sql1 = "UPDATE users SET email='$new_email' WHERE username='$username' ";
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