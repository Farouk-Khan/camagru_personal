<?php
//edit form                                                                                             

if(session_id() == '' || !isset($_SESSION)){
	session_start();
}

include 'config.php';

$user = $_POST['user'];
$pwd = hash('sha512', $_POST['passwd']);
$flag = 'true';
//$query = $mysqli->query("SELECT email, password from users");
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id, uname, passwd FROM users"); 
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$result = $mysqli->query('SELECT id,email,password,fname,type from users order by id asc');

  if($result === FALSE){
    die(mysql_error());
  }

  if($result){
    while($obj = $result->fetch_object()){
      if($obj->uname === $user && $obj->passwd === $pwd) {

        $_SESSION['username'] = $user;
        $_SESSION['type'] = $obj->type;
        $_SESSION['id'] = $obj->id;
        header("location: home.php");
      } else {

          if($flag === 'true'){
            redirect();
            $flag = 'false';
          }
      }
    }
  }

  function redirect() {
    echo '<h1>Invalid Login! Redirecting...</h1>';
    header("Refresh: 3; url=index.php");
  }
} catch(PDOExceptiion $e){
  echo "Error: " . $e->getMessage();
}

?>