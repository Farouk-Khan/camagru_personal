<?php
session_start();
$user = $_SESSION['username'];
$image_id = $_POST['delete_butt'];
$true_username = $_POST['true_username'];
if ($user != $true_username){
    echo('<script>alert ("This image is not yours to delete");window.location.href="../gallery.php";</script>');
}else{
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
    $sql = "DELETE FROM pictures WHERE username='$user' and pic_id='$image_id'";
    try {
        $conn->exec($sql);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
        return (0);
    }
    $conn = null;
    echo('<script>window.location.href="../gallery.php";</script>');
}
?>