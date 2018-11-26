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

  // if ($row = $query->setFetchMode(PDO::FETCH_ASSOC))
  // {

    echo "".$row->num_rows."<br>";
    echo " 2 ";
    $count = $query->fetchColumn();
    echo "".$count;

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

//$query = $mysqli->query("SELECT email, password from users");
// try {

//   echo "what up";

//   $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $stmt = $conn->prepare("SELECT id, uname, passwd FROM users"); 
//   $stmt->execute();


//   echo "penis1";
//   // set the resulting array to associative
//   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

//   echo "2";

//   // $result = $conn->prepare("SELECT * from `users` order by id ASC");
//   // $result->execute();

//   echo " $result";

//   if($result === FALSE){
//     die(mysql_error());
//   }

//   echo " again";

//   if($result){
//     echo " in";
//     while($obj = $result->fetch(PDO::FETCH_ASSOC)){
//       echo " futher";
//       if($obj->uname === $user && $obj->passwd === $pwd) {

//         $_SESSION['username'] = $user;
//         $_SESSION['type'] = $obj->type;
//         $_SESSION['id'] = $obj->id;
//         header("location: home.php");
//       } else {

//           if($flag === 'true'){
//             redirect();
//             $flag = 'false';
//           }
//       }
//     }
//   }

//   function redirect() {
//     echo '<h1>Invalid Login! Redirecting...</h1>';
//     header("Refresh: 3; url=index.php");
//   }
// } catch(PDOExceptiion $e){
//   echo "Error: " . $e->getMessage();
// }

?>