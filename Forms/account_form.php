<?php
session_start();
include '../Functions/change_email.php';
include '../Functions/change_password.php';
include '../Functions/change_username.php';
include '../Functions/login.php';
include '../Functions/change_comment_email.php';
include '../Functions/delete_account.php';-
$username = htmlspecialchars($_POST['username_account']);
$password = hash('whirlpool', htmlspecialchars($_POST['password_account']));
session_start();
if (login($username, $password) == 1)
{
    if ($_POST['submit_delete_account'] == OK)
    {
        delete_account($username, $password);
        $_SESSION['username'] = "";
        $_SESSION = "";
        session_destroy();
        echo '<script>alert("Account deleted");window.location.href="../login.php";</script>';
    } 
    if ($_POST['new_username_check'] == '1' && htmlspecialchars($_POST['new_username_account']) != "")
    {
        $new_username = htmlspecialchars($_POST['new_username_account']);
        change_username($username, $password, $new_username);
        $username = $new_username;
    }
    if ($_POST['new_email_check'] == '1' && htmlspecialchars($_POST['new_email_account']) != "")
    {
        $new_email = htmlspecialchars($_POST['new_email_account']);
        change_email($username, $new_email, $password);
    }
    if ($_POST['new_password_check'] == '1' && htmlspecialchars($_POST['new_password_account']) != "")
    {
        $new_password = hash('whirlpool', htmlspecialchars($_POST['new_password_account']));
        if (strlen($new_password) < 8 || !(preg_match('/\\d/', $new_password) > 0) || !(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $new_password) > 0))
            {
                echo('<<script>alert ("Password too short or does not contain a digit or/and special character!!!");window.location.href="../account.php";</script>');
            }
        change_password($username, $password, $new_password);
        $password = $new_password;
    }
    if ($_POST['new_comment_email_check'] == '1' && $_POST['new_comment_email_account'] != "")
    {
        $new_comment_email = $_POST['new_comment_email_account'];
        change_comment_email($new_comment_email, $username);
    }
    echo('<script>alert ("Details changed redirecting to main page.!!!");window.location.href="../index.php";</script>');
}
else
{
    echo('<script>alert ("Username/password incorrect, please ensure details are correct.!!!");window.location.href="../account.php";</script>');
}
?>