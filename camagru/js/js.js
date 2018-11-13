(function() {
    var video = document.getElementById('camera'),
        canvas = document.getElementById('canvas'),
        context = canvas.getContect('2d'),
        vendorUrl = window.URL || window.webkitURL;
        
    navigator.getMedia = navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia;

    navigator.getMedia({
        video: true,
        audio: false
    }, function(stream) {
        video.src = vendorUrl.createObjectURL(stream);
        video.play();
    }, function(error) {
        // message
    });

    document.getElementById('startbutton').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 200, 200);
    })
});

// var width = 300;
// var height = 0;
// var video = document.querySelector('camera');
// var canvas = document.getElementById('canvas');
// var photo = document.getElementById('photo');
// var startbutton = document.getElementById('startbutton');
// var streaming = false;

//  if (navigator.mediaDevices.getUserMedia) {       
//      navigator.mediaDevices.getUserMedia({video: true})
//    .then(function(stream) {
//      video.srcObject = stream;
//    })
//    .catch(function(err0r) {
//      console.log("Something went wrong!");
//    });
//  }