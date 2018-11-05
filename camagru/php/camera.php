<div id="cam" class="logout">
    <div class="animate undercam posCam">
        <video class="animate" autoplay="true" id="camera">
        </video>
    </div>
</div>
<script>
var video = document.querySelector("#camera");
 
 if (navigator.mediaDevices.getUserMedia) {       
     navigator.mediaDevices.getUserMedia({video: true})
   .then(function(stream) {
     video.srcObject = stream;
   })
   .catch(function(err0r) {
     console.log("Something went wrong!");
   });
 }

</script>