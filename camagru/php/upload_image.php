<?php

if(session_id() == '' || !isset($_SESSION)){
    session_start();
}

$action = $_POST['action'];
$data = $_POST['data'];
$filter = $_POST['filter'];
$user = $_SESSION['username'];
$tmp = $_POST['tmp'];
$path = $POST['path'];
$upload = $_POST['uploaded'];

include("config.php");

function mergeImg($data, $filter, $user, $tmp) {

	echo "merge";

	list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);
	$data = base64_decode($data);
	
	echo "<script>console.log('" . $data . "');</script>"; 

	$rpath 	= 'images/' . $user . 'tmp' . $tmp . '.png';
	$path 	= '../' . $rpath;
	file_put_contents($path, $data);
		
	$og 	= imagecreatefrompng($path);
	$src 	= imagecreatefrompng($filter);
		
	$result = imagecreatetruecolor(500, 375);

	imagealphablending($og, false);
	imagesavealpha($og, true);
	$trans_background = imagecolorallocatealpha($result, 0, 0, 0, 127);
	imagefill($result, 0, 0, $trans_background);

	imagecopy($result, $og, 0, 0, 0, 0, 500, 375);
	imagecopy($result, $src, 0, 0, 0, 0, 500, 375);
		
		
	imagepng($result, $path);

	imagedestroy($og);
	imagedestroy($src);
	imagedestroy($result);
	echo $rpath;
}

function saveImg($user, $tmp, $pdo) {
	$path 			= '../images/' . $user . 'tmp' . $tmp . '.png';

	$DBuser 		= $pdo->quote($user);
	$select 		= $pdo->query("SELECT * FROM Users WHERE username=$DBuser");
	$ret 			= $select->rowCount();
	if ($ret == 1) {
		$result 	= $select->fetchAll();
		$id 		= $result[0]['id'];
	}
	else
		die("Error - Please relog and clear your cookies");
	$image = imagecreatefrompng($path);
	$files = glob("../UserImg/" . $user . "/*.png");
	if ($files !== FALSE)
		$filecount 	= count($files);
	else
		$filecount 	= 0;

	$savepath 		= "UserImg/" . $user . "/" . $user . "_" . $filecount . ".png";
	imagepng($image, "../" . $savepath);
	$pdo->query("INSERT INTO images SET user_id='$id', img_path='$savepath', likes=0");
	unlink($path);
}

function del($user, $tmp) {
	$path 	= '../images/' . $user . 'tmp' . $tmp . '.png';
	$path 	= '../' . $rpath;

	unlink($path);
}

if ($action === "merge")
	mergeImg($data, $filter, $user, $tmp, $uploaded);
else if ($action == "delete")
	del($user, $tmp);
else if ($action == "save")
	saveImg($user, $tmp, $pdo);
else if ($action == "trash")
	imgTrash($user, $path, $pdo);
?>