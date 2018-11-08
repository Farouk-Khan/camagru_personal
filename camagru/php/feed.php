<link rel="stylesheet" href="../css/main.css">
<div class="feed">
    hey there
</div>
<div class="prof">
    <img src="../resourses/logLogo.png" width="50%" height="20%">
    <h3>Hi</h3>
    <?php
    echo $_SESSION['username'];
    ?>
    <div style="position:absolute;bottom:5px;right:10px;margin:5px;background-color:cornsilk;">
        <span style="cursor:pointer" onclick="document.getElementById('edit').style.display='block'">edit profile</span>
    </div>
</div>

<?php
    include "edit_user.php";
?>

<script>
var edit = document.getElementById('edit');
// When the user clicks anywhere outside of the edit, close it
window.onclick = function(event) {
    if (event.target == edit) {
        edit.style.display = "none";
    }
</script>