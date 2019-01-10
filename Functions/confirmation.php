<?php
    session_start();
    $passkey = $_GET['passkey'];
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
        echo "Connection Failed :".$err->getMessage();
        return (-1);
    }
    $sql = "SELECT * FROM users WHERE conf_code='$passkey'";
    try {
        $stmt = $conn->query($sql);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
        return ;
    }
    if ($stmt->rowCount() > 0)
    {
        $sql1 = "UPDATE users SET conf='1' WHERE conf_code='$passkey'";
        try {
            $ex = $conn->prepare($sql1);
            $ex->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            return ;
        }
        echo('<<script>alert ("Account confirmed");window.location.href="../login.php";</script>');
    }
    else
    {
        $conn = null;
        echo('<<script>alert ("Account not confirmed");window.location.href="../signup.php";</script>');
    }
    $conn = null;
?>