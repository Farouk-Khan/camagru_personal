<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Camagru Guest Gallery</title>
</head>
<body>
<div id="header">
                <header>
                <h1>Camagru</h1>
                </header>
</div>
<div id="navi">
                <nav>
                <a href="javascript:history.back()">Back</a>
                </nav>
</div>
<div id="main">
<h1>Camagru gallery</h1>
<?php
include 'Functions/get_images.php';
$results = get_images();
foreach($results as $t){
echo '<div class="photo_block">';
echo '<img src="'.$t['picture'].'" />';
echo '
<div class="buttons">
<button type = "submit" name="like_butt" value = ""/><img class="like" src="Images/like.png" onclick="javascript:history.back()"></button>
';
echo '
<button type = "submit" name="delete_butt" value = ""/><img class="like" src="Images/delete.png" onclick="javascript:history.back()"></button>
<button type ="submit" name="comment_but" value = "OK"/><img class="like" src="Images/comment.png" onclick="javascript:history.back()"></button>
</div>';
echo '</div>';
}
?>
</div>
<div id="footer">
        <p>&copy; fkhan 2018</p>
</div>
</body>
</html>