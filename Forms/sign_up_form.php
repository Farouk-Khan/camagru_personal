<?php
include '../Functions/conf_email.php';
include '../Functions/sign_up.php';
session_start();
$username = htmlspecialchars($_POST['username_signup']);
$email = htmlspecialchars($_POST['email_signup']);
$password = htmlspecialchars($_POST['password_signup']);
$conf_password = htmlspecialchars($_POST['conf_password_signup']);
if (strlen($password) < 8 || !(preg_match('/\\d/', $password) > 0) || !(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password) > 0))
{
    echo('<<script>alert ("Password too short or does not contain a digit or/and special character!!!");window.location.href="../signup.php";</script>');
}
else if ($password != $conf_password)
{
    echo('<<script>alert ("Passwords not matching!!!");window.location.href="../signup.php";</script>');
}
else if (sign_up($username, $email, hash('whirlpool', $password)) == 1)
{
    confirm_email($username, $email, hash('whirlpool',$password));
}
else
{
    echo('<<script>alert ("Username/email taken!!!");window.location.href="../signup.php";</script>');
}
?>