<?php
include('connection.php');
//print_r($_FILES);
	//upload photo


$target_dir = "student_img/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
    echo     $data[]="File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        $data[]=$uploadOk;
    } else {
     echo    $data[]="File is not an image.";
        $uploadOk = 0;
        $data[]=$uploadOk;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
   echo $data[]="Sorry, file already exists.";
    $uploadOk = 0;
    $data[]=$uploadOk;
}
// Check file size & set limit 50kb
if ($_FILES["photo"]["size"] > 100000) {
    echo $data[]="Sorry, your file is too large.";
    $uploadOk = 0;
    $data[]=$uploadOk;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   echo $data[]="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    $data[]=$uploadOk;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo $data[]= "Sorry, your file was not uploaded Successfully.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
   echo    $data[]= "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
    } else {
     echo  $data[]="Sorry, there was an error uploading your file.";
    }
    }

if($uploadOk ==1){
//return $uploadOk;
$data[]=$uploadOk;
echo $data[]='<img src="student_img/'.basename( $_FILES["photo"]["name"]).'" height="100" width="100"class="w3-border" alt="img" id="ima">';
}


//echo json_encode($data);
?>