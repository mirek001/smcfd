<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';

$id = $_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
$disable = $_GET['disable'];
$disable = htmlentities($disable, ENT_QUOTES, "UTF-8");


$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE settings SET int_value='$disable' WHERE id=$id"));		
//echo $q;

			if ($disable=="0") $_SESSION['note']=$_SESSION['lg_facebook_is_now_disabled'];
			if ($disable=="1") $_SESSION['note']=$_SESSION['lg_facebook_is_now_enabled'];

			$header="../../system.php?page=facebook";
			header("Location: $header");

?>