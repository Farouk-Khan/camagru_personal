<?php
function change_comment_email($comment_email, $username)
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
    $sql1 = "UPDATE users SET comment_choice='$comment_email' WHERE username-'$username' ";
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