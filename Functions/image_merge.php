<?php
include 'insert_image.php';
function base64_to_png( $base64_string, $output_file ) {
    $ifp = fopen( $output_file, "wb" ); 
    fwrite( $ifp, base64_decode( $base64_string) ); 
    fclose( $ifp ); 
    return( $output_file ); 
}
function gdImgToHTML( $image) {
    ob_start();
    imagepng($image);
    $image_data = ob_get_contents();
    ob_end_clean();
    return "data:image/$format;base64,".base64_encode($image_data);
}
    session_start();
    base64_to_png(str_replace('data:image/png;base64,', '',$_POST['image_1']), 'tmp.png');
    $image2 = imagecreatefrompng($_POST['image_2']);
    $image1 = imagecreatefrompng('tmp.png');
    $username = htmlspecialchars($_SESSION['username']);
    imagealphablending($image1, false);
    imagesavealpha($image1, true);
    imagecopymerge($image1, $image2, 0, 0, 0, 0, 150, 150, 100);
    $new_img = gdImgToHTML($image1, 'png');
    if (strlen($new_img) > 5000){
        insert_image($username, $new_img);
        echo '<script>history.back();</script>';
    }else{
        echo '<script>alert("Something went wrong when submitting the photo");history.back();</script>';
    }
?>