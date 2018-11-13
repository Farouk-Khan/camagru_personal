<link rel="stylesheet" href="../css/main.css">
<nav class="topbar">
    <ul class="list">
        <li class="list"><a href="#">HOME</a></li>
        <li class="list" style="cursor:pointer" onclick="document.getElementById('cam').style.display='block'">CAMERA</a></li>
        <li class="list"><a href="#">PORTFOLIO</a></li>
        <li class="list" style="float:right;cursor:pointer" onclick="document.getElementById('out').style.display='block'">LOG OUT</a></li>
    </ul>
</nav>

<?php
    include "camera.php";
?>

<div class="logout" id="out">
    <div class="out-content animate">
        <h2>Would You Like To Logut?</h2>
        <div class="out-cancel">
        <a href="logout.php" style="padding:0"><div class="button">
                <h3>Logout</h3>
            </div></a>
            <div class="button" onclick="document.getElementById('out').style.display='none'">
                <h3>Cancel</h3>
            </div>
        </div>
    </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('out');
var cam = document.getElementById('cam');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == cam) {
        cam.style.display = "none";
    }
}
</script>