<?php
function sign_up($username, $email, $password)
{
    session_start();
    $server = 'localhost';
    $u = 'root';
    $p = 'AFRkhanattari';
    $db = 'camagru_fkhan';
    $conf_code = hash('whirlpool',$username);
    try {
        $conn = new PDO("mysql:host=$server; dbname=$db", $u, $p);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $err)
    {
        echo "Connection Failed : ".$err->getMessage();
        return (-1);
    }
    $sql = "INSERT INTO users (username, email, password, conf, conf_code) VALUES ('$username', '$email', '$password', '0', '$conf_code')";
    try {
        $stmt = $conn->exec($sql);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
        return (0);
    }
    if ($stmt == true)
    {
        $conn = null;
        return (1);
    }
       else
       {
        $conn = null;
        return (0);
       }        
    }
?>