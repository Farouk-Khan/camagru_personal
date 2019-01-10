<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <?php 
        session_start();
        if ($_SESSION['username'] == "" ||empty($_SESSION))
            echo '<script>alert("Please login or create an account first!!!!");window.location.href="login.php";</script>';
    ?>
    <title>Camagru | Home</title>
</head>
<body>
        <div id="header">
                <header>
                <h1>Camagru</h1>
                </header>
            </div>
                <div id="navi">
                <nav>
                    <a class="title" href="account.php">Account</a>
                    <a class="title" href="contact.html">Contact</a>
                    <a class="title" href="gallery.php">Gallery</a>
                    <a class="title" href="Functions/logout.php">Logout</a>
                </nav>
                </div>
    <div id ="main2">
        <div id="options">
            <label for="cam_file">Select input method</label>
            <select name="cam_file" id="cam_file">
                <option value="camera">Webcam</option>
                <option value="file">Image upload</option>
            </select>
        </div>
        <div class="camera" id="camera" class="dimensions">
            <video id="video">Video stream not available.</video>
        </div>
        <div id="image_upload">
            <img id="upload_image" src="#" alt="upload_image" class="dimensions">
            <input type="file" name="img_upload" id="img_upload">
        </div>
            <div id="sidebar">
            <img id="sticker_image" src="#" alt="sticker_image">
            <div class="sticker_select">
                <label for="sticker_select">Stickers</label>
                <select id="sticker_select" name="sticker_select">
                    <option value="stickers/beard.png">Beard</option>
                    <option value="stickers/beer.png">Beer</option>
                    <option value="stickers/certified.png">Certified</option>
                    <option value="stickers/darth_vader.png">Darth Vader</option>
                    <option value="stickers/dolphin.png">Dolphin</option>
                    <option value="stickers/ear.png">Ear</option>
                    <option value="stickers/hippo.png">Hippo</option>
                    <option value="stickers/mustang.png">Mustang</option>
                    <option value="stickers/putin.png">Vladimir Putin</option>
                    <option value="stickers/sandwitch.png">Sandwitch</option>
                    <option value="stickers/tomato.png">Tomato</option>
                    <option value="stickers/windows.png">Windows</option>
                    <option value="">None</option>
                </select>
            </div>
            <button id="startbutton" onclick="takepicture();">Take photo</button>
        </div>
        <canvas id="canvas" class="dimensions"></canvas>
        <form id="export" action="Functions/image_merge.php" method="POST">
            <input type=hidden name="image_1" id="merged_image" value="">
            <input type="hidden" name="image_2" id="image_2" value="">
            <button type="submit" name="exp_photo" id="exp_photo" value="OK">Export photo</button>
        </form>
    </div>
     <?php
        include 'Functions/get_user_images.php';
        $results = get_user_images($_SESSION['username']);
            foreach($results as $t){
            echo '<div class="photo_block">';
            echo '<div class="photo">';
            echo '<img src="'.$t['picture'].'" />';
            echo '</div>';
            }
    ?> 
    <div id="footer">
        <p>&copy; fkhan 2018</p>
        <script src="js/webcam.js"></script>
    </div>
</body>
</html>