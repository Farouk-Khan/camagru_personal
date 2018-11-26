<?php
require_once "config.php";
$host = "localhost";
$username = "root";
$password = "AFRkhanattari";
$dbname = "camagru";
try {
    $pdo = new PDO("mysql:host=$host",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS ".$dbname;
    $pdo->exec($sql);
    echo $sql;
} catch(PDOException $e){
    echo $sql. "<br>" .$e->getMessage();
}
$pdo = null;

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "hey hey ";
    $sql = 'CREATE TABLE Users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        uname VARCHAR(255) NOT NULL,
		fname VARCHAR(255) NOT NULL,
		lname VARCHAR(255) NOT NULL,
		email VARCHAR(255) NOT NULL,
		passwd VARCHAR(255) NOT NULL,
        type VARCHAR(20) NOT NULL default "0"
        )';
      echo "no no ";
      $pdo->exec($sql);
    } catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
    }
    $pdo = null;
?>