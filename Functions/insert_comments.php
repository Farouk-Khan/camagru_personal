<?php
include 'get_user_details.php';
include 'mail_comment.php';
    session_start();
    $image_id = $_POST['image_id'];
    $username = $_SESSION['username'];
    $user_image = htmlspecialchars($_POST['username_image']);
    $comment = htmlspecialchars($_POST['comment']);
    $server = 'localhost';
    $u = 'root';
    $p = 'AFRkhanattari';
    $db = 'camagru_fkhan';
    if ($comment == "")
    {
        echo '<script>window.location.href="comments.php";</script>';
    }
    else
    {
        try {
            $conn = new PDO("mysql:host=$server; dbname=$db", $u, $p);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $err)
        {
            echo "Connection Failed : ".$err->getMessage();
            return (-1);
        }
        $sql = "INSERT INTO comments (picture_id,username, comment) VALUES ('$image_id','$username','$comment')";
        try {
            $conn->exec($sql);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn = null;
        if (get_user_details($username)[0]['comment_choice'] == 1){
            mail_comment($user_image, $username, $comment, $image_id);
        }
        echo '<script>window.location.href="comments.php";</script>';
    }
?>