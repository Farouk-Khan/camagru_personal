<?php
function mail_comment($user, $username, $comment, $pic_id)
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
    $sql = "SELECT * FROM users WHERE username='$user'";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
        return (0);
    }
    if ($stmt->rowCount()>0)
    {
        $res = $stmt->fetchAll();
        $subject = "Alert form comment on ".$pic_id;
        $headers = "From : no_reply@camagru.com \r\n";
        $message = "The following comment was made on image ".$pic_id." by ".$username."\r\n
                    ".$comment;
        $to = $res[0]['email'];
        $sent = mail($to, $subject, $message, $headers);
    }
}
?>