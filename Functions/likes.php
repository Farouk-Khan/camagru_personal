<?php
    session_start();
    $image_id = $_POST['like_butt'];
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
    $sql1 = "UPDATE pictures SET Likes= Likes+1 WHERE pic_id='$image_id' ";
    try {
        $ex = $conn->prepare($sql1);
        $ex->execute();
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    echo '<script>window.location.href="../gallery.php";</script>';
?>