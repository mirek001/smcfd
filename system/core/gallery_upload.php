<?php
session_start();
if (!isset($_SESSION['id'])) exit();

$id=$_POST['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");




$target_dir = "../../upload/$id/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $_SESSION['note'] = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        header ("Location: ../../system.php?page=gallery&id=$id");
    } else {
        $_SESSION['note'] = "File is not an image.";
        $uploadOk = 0;
        header ("Location: ../../system.php?page=gallery&id=$id");
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['note'] = "Sorry, file already exists.";
    $uploadOk = 0;
    header ("Location: ../../system.php?page=gallery&id=$id");
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    $_SESSION['note'] = "Sorry, your file is too large.";
    $uploadOk = 0;
    header ("Location: ../../system.php?page=gallery&id=$id");
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $_SESSION['note'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    header ("Location: ../../system.php?page=gallery&id=$id");
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION['note'] = "Sorry, your file was not uploaded.";
    header ("Location: ../../system.php?page=gallery&id=$id");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir$target_file")) {
        $_SESSION['note'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        header ("Location: ../../system.php?page=gallery&id=$id");
    } else {
        $_SESSION['note'] = "Sorry, there was an error uploading your file.";
        header ("Location: ../../system.php?page=gallery&id=$id");
    }
}


?>