<div id="cam" class="logout">
    <div class="animate undercam posCam">
        <video class="animate" autoplay="true" id="camera">
        </video>
        <button id="startbutton">take pic</button>
        <canvas id="canvas" width="200px" height="200px">
        </canvas>
        <br>
        <img id="photo" alt="one images taken"> 
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
</script>