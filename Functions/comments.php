<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Comments</h1>
<?php
include 'get_comments.php';
session_start();
if (empty($_POST['image']) == false|| empty($_POST['username_image']) == false){
    $_SESSION['pic_id'] = $_POST['image'];
    $_SESSION['user_image'] = $_POST['username_image'];
}
$results = get_comments($_SESSION['pic_id']);
foreach ($results as $t){
    echo '<div class="comment_box">';
    echo  '<h3>'.$t['username'].'  </h3>';
    echo '<p class="comment">'.$t['comment'].'</p>';
    echo '</div>';
}
?>
<div class="comment_box">
<form action="insert_comments.php" method="POST">
<input type="text_area" id="comment" name="comment" class="comment">
<input type="hidden" name="image_id" value="<?php echo $_SESSION['pic_id'] ?>">
<input type="hidden" name="username_image" value="<?php echo $_SESSION['user_image'] ?>">
<button type="submit" name="comment_submit" id="comment_submit" value="" onclick="window.location.href='comments.php';">Comment</button>
</form>
</div>
</body>
</html>