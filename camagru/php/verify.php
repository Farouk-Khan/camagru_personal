<?php
//edit form                                                                                             

if(session_id() == '' || !isset($_SESSION)){
	session_start();
}

include "config.php";

if (isset($_POST['login']))
{
  $uname = $_POST['user'];
  $passwd = hash('sha512', $_POST['passwd']);
  // $passwd = $_POST['passwd'];

  echo "$uname<br>";
  echo "$passwd<br>";
  $query = $pdo->prepare("SELECT COUNT(id) FROM `users` WHERE `uname` = '$uname' AND `passwd` = '$passwd'");
  $query->execute();
  $count = $query->fetchColumn();

    if($count == "1"){
      $_SESSION['username'] = $uname;
      header("Location:home.php");
      // exit();
    }
      else {
        echo "0.1";
         header("Location: ../html/login.phtml?err=". urlencode("The users account is not active"));
        exit();
    }
//   }
//   else {
//     echo "0";
//     // header("Location: index.php?err=". urlencode("Incorrect username"));
//   }
}
?>