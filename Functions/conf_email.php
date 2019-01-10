<?php
    include_once "delete_account.php";
    function confirm_email($username, $email, $password)
    {
        session_start();
        $to = $email;
        $subject = "Camagru confirmation email";
        $conf_link = hash('whirlpool', $username);
        $headers = "From : no_reply@camgru.com \r\n";
        $message = "Thank you for signing up $username! \r\n
                    Please click on the link provided to confirm your account \r\n
                    <a href='http://localhost:8081/Archive/Functions/confirmation.php?passkey=$conf_link'>sds</a>";
        $sent = mail($to, $subject, $message, $headers);
        if ($sent == true)
            echo('<<script>alert("Email sent, please check email to confirm");window.location.href="../login.php";</script>');
        else
        {
            delete_account($username, $password);
            echo('<<script>alert ("Email not sent, please try to sign up again with correct email.");window.location.href="../signup.php";</script>');
        }
    }
?>