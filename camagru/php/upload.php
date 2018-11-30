<?php
    if(isset($_FILES['image'])){
        $imagefile = '../image/' . basename($_FILES['image']['name']);
        $imagesize = $_FILES['image']['size'];
        $imageFileType = strtolower(pathinfo($imagefile,PATHINFO_EXTENSION));
        $errors = array();

    echo "". $imagefile."<br>";

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
           $error[]="Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
        }

        if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
         }

    echo $_FILES['image']['tmp_name']."<br>";
    echo $imagefile;
        
        if (empty($errors)==true){
            move_uploaded_file($_FILES['image']['tmp_name'], $imagefile);
            echo "file is valid. \n";
        } else {
            echo "Upload failed";
        }
        
        header('Location: home.php');
    }
?>


<!-- <?php
//$_POST['submit']
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = '../images/' . basename($_FILES['image']['name']);
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      echo $_FILES['image']['tmp_name']."<br>";
      echo $_FILES['image']['error']."<br>";

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?> -->