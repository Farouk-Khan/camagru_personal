<div id="cam" class="logout">
    <div id="cam_hide" class="animate undercam posCam">
        <video class="animate" autoplay="true" id="camera">
        </video>
        <div>
        <button id="savebutton">Save pic</button>
        <button id="startbutton">take pic</button>
        </div>
        <canvas id="canvas" width="200px" height="200px">
        </canvas>
        <br>
        <img id="photo"> 
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" id="image">
            <input type="submit" name="submit" value="Save">
        </form>
    </div>
</div>
<script>
var video = document.querySelector("#camera");
var canvas = document.getElementById('canvas');
var photo = document.getElementById('photo');
var context = canvas.getContext('2d');
var vendorUrl = window.URL || window.webkitURL;

 if (navigator.mediaDevices.getUserMedia) {       
     navigator.mediaDevices.getUserMedia({video: true})
   .then(function(stream) {
     video.srcObject = stream;
   })
   .catch(function(err0r) {
     console.log("Something went wrong!");
   });
 }

document.getElementById('startbutton').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 200, 200);
        photo.setAttribute('src', canvas.toDataURL('image/png'));
    })

$(document).ready(function(){
    $('#savebutton').click(function() {
        $.ajax({
            url: "upload.php",
            type: "POST",
            data: canvas.toDataURL('image/png'),
            contentType: false,
            cache: false,
            processData: false
        });
    });
});
</script>