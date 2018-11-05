<?php
$host = "localhost";
$username = "root";
$password = "AFRkhanattari";
$dbname = "camagru";
$charset = "utf8mb4";


try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected";
} catch(PDOException $e){
    echo $e->getMessage();
}
?>