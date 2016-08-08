<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require_once '../../functions.php';
require_once '../../mysql_data.php';

$name=$_GET['name'];
$name = htmlentities($name, ENT_QUOTES, "UTF-8");
//$desc=$_GET['desc'];
//$desc = htmlentities($desc, ENT_QUOTES, "UTF-8");
$content=$_GET['content'];
$content=addslashes($content); 
//$content = htmlentities($content, ENT_QUOTES, "UTF-8");
$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
$section_color=$_GET['section_color'];
$section_color = htmlentities($section_color, ENT_QUOTES, "UTF-8");



$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);

			$con->query($q=("UPDATE site_map SET name='$name', content='$content', section_color='$section_color' WHERE id=$id"));
			//echo $q;
			$res = $con->query("SELECT MAX(id) AS max_id FROM pages");
			$row = mysqli_fetch_array($res);
			$max_id = $row['max_id'];

			$con->query($q=("UPDATE page SET  pages_id=$max_id WHERE pages_id=$id"));

//echo $q;

			if (isset($_GET['update'])) {$header="../../system.php?page=code&id=$id";}
			else $header="../../system.php";
			//echo $header;
			header("Location: $header");

			
?>