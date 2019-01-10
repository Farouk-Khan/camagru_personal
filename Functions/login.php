<?php
function login($username, $password)
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
    if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email='$username' AND password='$password' AND conf='1'";
        try {
            $stmt = $conn->query($sql);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            return (0);
        }
        if ($stmt->rowCount() > 0)
        {
           $conn = null;
            return (1); 
        }
        else
            $conn = null;
            return (0); 
    }
    else {
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND conf='1'";
        try {
            $stmt = $conn->query($sql);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            return (0);
        }
        if ($stmt->rowCount() > 0)
        {
           $conn = null;
            return (1); 
        }
        else
            $conn = null;
            return (0); 
    }
}
?>