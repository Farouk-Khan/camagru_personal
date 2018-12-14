<div id="cam" class="logout">
    <div id="cam_hide" class="animate undercam posCam">
        <video class="animate" autoplay="true" id="camera">
            <canvas id="overlay">
            </canvas>
        </video>
        <div>
        <button id="savebutton">Save pic</button>
        <button id="cancel">Cancel</button>
        <button id="startbutton">take pic</button>
        </div>
        <canvas id="canvas" width="500px" height="375px">
        </canvas>
        <img id="photo">
        <form action="upload_file.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" id="image">
            <input type="submit" name="submit" value="Save">
        </form>
        <form action="" method="POST" class="row">
            <label class="container"><img class="trans" id="hair" src="../resourses/hairdo.png" width="200px" height="200px"><input type="checkbox" id="img1"><span class="checkmark"></span></label>
            <label class="container"><img class="trans" id="lay" src="../resourses/Laser.png" width="200px" height="200px"><input type="checkbox" id="img2"><span class="checkmark"></span></label>
            <label class="container"><img class="trans" id="sun" src="../resourses/sunshine.png" width="200px" height="200px"><input type="checkbox" id="img3"><span class="checkmark"></span></label>
        </form>
    </div>
</div>
<script>
var video = document.querySelector("#camera");
var canvas = document.getElementById('canvas');
var photo = document.getElementById('photo');
var context = canvas.getContext('2d');
var img1 = document.getElementById('img1');
var img2 = document.getElementById('img2');
var img3 = document.getElementById('img3');
var hair = document.getElementById('hair');
var lay = document.getElementById('lay');
var sun = document.getElementById('sun');
var width = 500;
var height = 375;
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


function getRand() {
    var rand = Math.floor((Math.random() * 10000) + 2);
    return(rand);
}

function capture(rand) {
    console.log('capture');

    if(img1.checked && video.currentTime > 0 || 
    img2.checked && video.currentTime > 0 || 
    img3.checked && video.currentTime > 0){
    var data = canvas.toDataURL('image/png');

        console.log('first');

    context.drawImage(video, 0, 0, 500, 375);
    photo.setAttribute('src', data);
    if (img1.checked)
        filter = "../resourses/hairdo.png";
    if (img2.checked)
        filter = "../resourses/Laser.png";
    if (img3.checked)
        filter = "../resourses/sunshine.png";
    
        console.log(data);
        console.log('second');

    var xhr_mergeIN = new XMLHttpRequest();
    mergeIN = new FormData();
    mergeIN.append('action', 'merge');
    mergeIN.append('data', data);
    mergeIN.append('filter', filter);
    mergeIN.append('tmp', rand);
    xhr_mergeIN.open('POST', 'upload_image.php');
    xhr_mergeIN.send(mergeIN);

        console.log('third');

    xhr_mergeIN.onreadystatechange = function () {
        var DONE  = 4;
        var OK    = 200;
        if (xhr_mergeIN.readyState === DONE) {
            if (xhr_mergeIN.status === OK) {
                var output = xhr_mergeIN.responseText;
                if (output == "ERROR") {
                    console.log('del');
            // del.click();
            }
            else {
              var filtered = new Image();
              filtered.src = output;

              console.log(filtered.src);

              context.clearRect(0, 0, canvas.width, canvas.height);
              filtered.onload = function() {
                context.drawImage(filtered, 0, 0, canvas.width, canvas.height);
                    }
                }
            }
        }
    }
}
    console.log('end');
}

document.getElementById('startbutton').addEventListener('click', function(ev) {
        // var data = canvas.toDataURL('image/png');
        // context.drawImage(video, 0, 0, 200, 200);
        
    if (img1.checked){
    console.log('image1 ' + img1.checked);
    filter = "../resourses/hairdo.png";
    hair.style.backgroundColor = 'transparent';
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(hair, 0, 0, width, height);
}
if (img2.checked){
    console.log('image2 ' + img2.checked);
    filter = "../resourses/Laser.png";
    lay.style.backgroundColor = 'transparent';
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(lay, 0, 0, width, height);
}
if (img3.checked){
    console.log('image3 ' + img3.checked);
    filter = "../resourses/sunshine.png";
    sun.style.backgroundColor = 'transparent';
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(sun, 0, 0, width, height);
}

        console.log('start');
        rand = getRand();
        capture(rand);
        ev.preventDefault();
        video.pause();
    })

document.getElementById('cancel').addEventListener('click', function() {

    console.log("DEL");
    var xhr_del = new XMLHttpRequest();
    var del = new FormData();
    del.append('action', 'delete');
    del.append('tmp', rand);
    xhr_del.open('POST', 'upload_image.php');
    xhr_del.send(del);
    xhr_del.onreadystatechange = function (){
        if(xhr_del.status === 4)
            if(xhr_del.status === 200){
                var output = xhr_del.responseText;
                if (output == "ERROR"){
                    console.log("ERROR");
                }
                else{
                    var filtered = new Image();
                    filtered.src = output;
                    console.log(filtered.src);
                }
            }
    }
    video.play();
})

document.getElementById('savebutton').addEventListener('click', function() {
    video.play();

    console.log("running save");

    var xhr = new XMLHttpRequest();
    var newimage = new FormData();
    newimage.append('action', 'save');
    newimage.append('tmp', rand); ype', 'application/json');
    xhr.send(newimage);
    
    console.log("after POST\n");

    xhr.onreadystatechange = function () {
        var DONE  = 4;
        var OK    = 200;

        console.log("in if\n");
        var stat = xhr.readyState;
        console.log(stat);

        if (xhr.readyState === 4) {
            if (xhr.status === OK) {
                var output = xhr.responseText;
                if (output == "ERROR") {
                    console.log("BROKE");
                }else{
                    var filtered = new Image();
              filtered.src = output;

              console.log(filtered.src);
                    console.log('WORKS');
                }
            // del.click();
            }
            }
        }
        // if (xhr.readyState == 4 && xhr.status == 200) {
        //     console.log("working");
        // }else{
        //     console.log("BROKE");
        // }
        // xhr.setRequestHeader('Content-type', 'application/json');

})

</script>