<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require_once '../../functions.php';
require_once '../../mysql_data.php';


$css=$_GET['css'];
$css = htmlentities($css, ENT_QUOTES, "UTF-8");
$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");



$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);

			$con->query($q=("UPDATE css SET css='$css' WHERE id=$id"));


//echo $q;

			if (isset($_GET['update'])) {$header="../../system.php?page=menu_css";}
			else $header="../../system.php";
			//echo $header;
			header("Location: $header");
?>