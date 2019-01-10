var width = 320;
var height = 640;
var streaming = false;
var video = document.getElementById('video');
var canvas = document.getElementById('canvas');
var photo = document.getElementById('photo');
var startbutton = document.getElementById('startbutton');
var cam = document.getElementById('camera');
var cam_file_sel = document.getElementById('cam_file');
var test = document.getElementById('test');
document.querySelector('#sticker_image').src = document.getElementById('sticker_select').value;
document.getElementById('image_upload').hidden = true;
var img2 = document.getElementById('sticker_image');
var image2 = document.getElementById('image_2');

navigator.mediaDevices.getUserMedia({ video: true, audio: false })
    .then(function(stream) {
        video.srcObject = stream;
        video.play();
    })
    .catch(function(err) {
        console.log("An error occurred! " + err);
    });
video.addEventListener('canplay', function(ev) {
    if (!streaming) {
        height = video.videoHeight / (video.videoWidth / width);

        video.setAttribute('width', 640);
        video.setAttribute('height', 320);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
    }
}, false);

function web_upload(){
    if (cam_file_sel.value == "file") {
        document.getElementById('camera').hidden = true;
        document.getElementById('image_upload').hidden = false;
    } else {
        document.getElementById('camera').hidden = false;
        document.getElementById('image_upload').hidden = true;
    }
}

setInterval(web_upload(),300);

function takepicture() {
    var exportBtn = document.getElementById('export');
    image2.value = img2.src;
    exportBtn.style.display = 'block';
    if (cam_file_sel.value == "camera") {
        var context = canvas.getContext('2d');
        if (width && height) {
            canvas.width = width;
            canvas.height = height;
            context.drawImage(video, 0, 0, width, height);
            var data = canvas.toDataURL();
            document.getElementById('merged_image').value = data;
        }
    } else if (cam_file_sel.value == "file") {
        var context = canvas.getContext('2d');
        if (width && height) {
            canvas.width = width;
            canvas.height = height;
            var img = document.getElementById('upload_image');
            context.drawImage(img, 0, 0, width, height);
            var data = canvas.toDataURL();
            document.getElementById('merged_image').value = data;
        }
    } else {
        clearphoto();
    }
}

function clearphoto() {
    var context = canvas.getContext('2d');
    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);

    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
}

startbutton.addEventListener('click', function(ev) {
    takepicture();
    ev.preventDefault();
}, false);

cam_file_sel.addEventListener('change', function() {
    if (cam_file_sel.value == "file") {
        document.getElementById('camera').hidden = true;
        document.getElementById('image_upload').hidden = false;
    } else {
        document.getElementById('camera').hidden = false;
        document.getElementById('image_upload').hidden = true;
    }
}, false);

document.querySelector('#img_upload').addEventListener('change', function() {

    if (this.files.length === 0)
        return;

    var file = this.files[0]; 
    var reader = new FileReader();
    reader.onload = function(e) {
        document.querySelector('#upload_image').src = e.target.result;

    };
    reader.readAsDataURL(file);
}, false);

document.querySelector('#sticker_select').addEventListener('change', function() {
    document.querySelector('#sticker_image').src = document.getElementById('sticker_select').value;
    var reader = new FileReader();
}, false);