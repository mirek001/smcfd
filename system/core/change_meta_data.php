<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
$name=$_GET['name'];
$name = htmlentities($name, ENT_QUOTES, "UTF-8");
$desc=$_GET['desc'];
$desc = htmlentities($desc, ENT_QUOTES, "UTF-8");
$keywords=$_GET['keywords'];
$keywords = htmlentities($keywords, ENT_QUOTES, "UTF-8");
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$con->query($q=("UPDATE site_map SET name='$name', meta_desc='$desc', meta_keywords='$keywords' WHERE id='$id'"));	
mysqli_close($con);


			if (isset($_GET['update'])) {$header="../../system.php?page=edit_meta_data&id=$id";}
			else $header="../../system.php";

header("Location: $header");
?>