<?php
include_once '../Functions/login.php';
session_start();
$username = htmlspecialchars($_POST['username_login']);
 $password = htmlspecialchars($_POST['password_login']);
 if (login($username,hash('whirlpool',$password)) == 1)
{
    $_SESSION['username'] = $username;
    header('Location:../index.php');
}
else
{
    echo
    '<script>alert ("Unable to login due to incorrect details or non confirmation on your account!!!");window.location.href="../login.php";</script>';
}
?>