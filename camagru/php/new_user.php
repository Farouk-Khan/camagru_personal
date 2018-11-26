<?php
    echo "hello world";
    include 'config.php';
    
    echo "<br>next";
    $nuser = $_POST['nuser'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = hash('sha512', $_POST['passwd']);
    $npass = hash('sha512', $_POST['npass']);

    if ($pwd != $npass)
    {
        echo "incorrect password";
        header("Location: ../html/login.phtml?err=". urlencode("The password you have entered does not match"));
        exit();
    }
    try {
        echo "<br>try";
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->beginTransaction();
        $pdo->exec("INSERT INTO users (uname, fname, lname, email, passwd) 
        VALUES ('$nuser', '$fname', '$lname', '$email', '$pwd')");

        $pdo->commit();
        header('Location: ../html/login.phtml');
        echo "New records created";
    } catch(PDOException $e) {
        $pdo->rollback();
        echo "Error: ".$e->getMessage();
    }
    $pdo = null;
?>