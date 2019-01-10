<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <title>Camagru Gallery</title>
    <?php 
        session_start();
        if ($_SESSION['username'] == "" ||empty($_SESSION))
            echo '<script>alert("Please login or create an account first!!!!");window.location.href="login.php";</script>';
    ?>
    <style>
           #main{
               width : 80%;
               margin : auto;
               overflow: scroll;
               height : 70%;
               
           }
           .like{
               width: 15px;
               height: 15px;
           }
           form{
               display:inline;
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
                <a href="account.php">Account</a>
                <a href="contact.html">Contact</a>
                <a href="index.php">Take Photos</a>
                <a href="Functions/logout.php">Logout</a>
                </nav>
</div>
<div id="main">
<h1>Camagru gallery<h1>
<?php
include 'Functions/get_images.php';
$results = get_images();
$pag = $_GET['pagination'];
foreach($results as $key => $value){
if (($key >= ($pag * 5 - 5 ) && $key < ($pag *5))|| $pag == 0){
echo '<div class="photo_block">';
echo '<div class="photo">';
echo '<h6>'.$value['username'].'  photo id:'.$value['pic_id'].'</h6>';
echo '<img src="'.$value['picture'].'" />';
echo '</div>';
echo '
<form action="Functions/likes.php" method="POST">
<button type = "submit" name="like_butt" value = "'.$value['pic_id'].'"/><img class="like" src="Images/like1.png">';echo $value['Likes']; echo '</button>
</form>
';
echo '
<form action="Functions/delete_image.php" method="POST">
<input type=hidden name="true_username" value="'.$value['username'].'">
<button type = "submit" name="delete_butt" value = "'.$value['pic_id'].'"/><img class="like" src="Images/delete1.png"></button>
</form>
<form action="Functions/comments.php" method="POST" target="'.$value['pic_id'].'">
<input type=hidden name="image" value="'.$value['pic_id'].'">
<input type=hidden name="username_image" value="'.$value['username'].'">
<button type ="submit" name="comment_but" value = "OK"/><img class="like" src="Images/comment.png"></button>
</form>
<iframe name="'.$value['pic_id'].'" width="90%" height="400px">Comments not working</iframe>
';
echo '</div>';
}
}
?>
<form action="gallery.php" method="POST" id="page">
<label for="pagenation">Page</label>
<div id="pagination">
<a href="gallery.php?pagination=1">1</a>    
<a href="gallery.php?pagination=2">2</a>
<a href="gallery.php?pagination=3">3</a>
<a href="gallery.php?pagination=4">4</a>
<a href="gallery.php?pagination=5">5</a>
<a href="gallery.php?pagination=6">6</a>
<a href="gallery.php?pagination=7">7</a>
<a href="gallery.php?pagination=8">8</a>
<a href="gallery.php?pagination=9">9</a>
<a href="gallery.php?pagination=10">10</a>
<a href="gallery.php?pagination=11">11</a>
<a href="gallery.php?pagination=0">infinte</a>
</div>
<script>
    document.getElementById('pagination').addEventListener("change", function() {
            document.getElementById('page').submit();
            document.getElementById('pagination').selectedIndex = "2";
    }, false);
</script>
<div id="footer">
        <p>&copy; fkhan 2018</p>
</div>
</body>
</html>