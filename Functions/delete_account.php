<?php
    function delete_account($username, $password)
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
        $sql = "DELETE FROM users WHERE username='$username' AND password='$password'";
        try {
            $conn->exec($sql);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            return (0);
        }
        $conn = null;
        return (-1);
    }
?>