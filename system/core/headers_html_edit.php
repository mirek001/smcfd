<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require_once '../../functions.php';
require_once '../../mysql_data.php';


$content=$_GET['content'];
$content = htmlentities($content, ENT_QUOTES, "UTF-8");
$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
$section_color=$_GET['section_color'];
$section_color = htmlentities($section_color, ENT_QUOTES, "UTF-8");
$name=$_GET['name'];
$name = htmlentities($name, ENT_QUOTES, "UTF-8");





$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);

			$con->query($q=("UPDATE site_map SET content='$content', section_color='$section_color' WHERE id=$id"));


//echo $q;

			if (isset($_GET['update'])) {$header="../../system.php?page=edit_headers&name=$name";}
			else $header="../../system.php";
			//echo $header;
			header("Location: $header");
?>