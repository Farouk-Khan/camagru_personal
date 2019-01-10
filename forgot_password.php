<?php
include 'Functions/change_password.php';
session_start();
if ($_POST['submit_forgot_password'] == OK){
    $email = $_POST['email'];
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
    $sql = "SELECT * FROM users WHERE email='$email' ";
    try {
        $stmt = $conn->query($sql);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
        return (0);
    }
    if ($stmt->rowCount() > 0)
    {
       $new_password = '$'.bin2hex(openssl_random_pseudo_bytes(4));
       $np = hash('whirlpool', $new_password);
       $sql1 = "UPDATE users SET password='$np' WHERE email='$email' ";
        try {
            $ex = $conn->prepare($sql1);
            $ex->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            return (0);
        }
        $conn = null;
       $sent = mail($email, "New password for Camagru", "Goodday,This is your temporary password ".$new_password, "From : no_reply@camagru.com \r\n");
        if ($sent == true){
            echo('<<script>alert ("Email sent with temporary password!!!");window.location.href="login.php";</script>');
            return (1);
        }else{
            echo('<<script>alert ("Email not working!!!");window.location.href="forgot_password.php";</script>');
            return (0);
        }
    }
    else{
        echo('<<script>alert ("Email not in database!!!");window.location.href="forgot_password.php";</script>');
        $conn = null;
        return (0);
    }
}
?>
<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru Forgot Password</title>
    <!-- <link rel="stylesheet" type="text/css" href="stylesheet.css"/> -->
    <style>
    #header{
               width:100%;
               height:6vh;
               background-image: url("https://wonderfulengineering.com/wp-content/uploads/2014/06/star-wallpapers-22.jpg");
               color:white;
               top:0%;
               font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
               text-shadow: 2px 2px 2px 2px;
               text-align: center;
               line-height: 6vh;
               display:block;
               text-decoration: none;
               font-size:2.5vh;
           }
           #header h1{
               text-shadow: 2px 2px 2px black;
           }
           #navi{
               width:100%;
               height: 6vh;
               
               display:flex;
               flex: wrap;
               justify-content: center;
               background-color:rgb(75, 75, 105);
               line-height: 6vh;
           }
   
           #navi a{
               font-size: 2vh;
               padding-right: 2vh;
               text-decoration-line: none;
               color:rgb(3, 3, 37);
           }
   
           #navi a:hover{
               color:olive;
           }
   
           #navi a:active{
               color:midnightblue;
           }
   
           #footer{
               bottom:0%;
               position: absolute;
               background-image: url("https://wonderfulengineering.com/wp-content/uploads/2014/06/star-wallpapers-22.jpg");
               width:100%;
               height:3vh;
               line-height: 1vh;
               text-align: center;
               
           }
           #contact{
               width : 50%;
               margin : auto;
               
           }
    </style>
</head>
<body>
<div id="header">
                <header>
                <h1>Camagru</h1>
                </header>
</div>
<div id="navi">
                <nav></nav>
                    <a href="javascript:history.back()">Back</a>
                </nav>
</div>
<div id="forgot_password">
        <h2 id='err'>Please fill in email and submit to get temporary password.</h2>
            <form action="forgot_password.php" method="POST">
                <div class="field_wrap">
                    <label>Email <span class="req">.</span></label>
                    <input type="email" required autocomplete="off" name="email">
                </div>
                    <button type="submit" class="button button-block" value="OK" name="submit_forgot_password">
                        Submit
                </button>
             </form>
    </div>
<div id="footer">
        <p>&copy; fkhan 2018</p>
</div>
</body>
</html>