<?php
function get_comments($pic_id)
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
    $sql = "SELECT * FROM comments WHERE picture_id='$pic_id' ";
    $req = $conn->prepare($sql);
    $req->execute();
    if ($req->rowCount() > 0)
        return ($req->fetchAll());
    else
        return (0);
}
?>