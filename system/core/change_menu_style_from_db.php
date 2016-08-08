<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require_once '../../functions.php';
require_once '../../mysql_data.php';


$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");

if ($id=='0') {
	header("Location: ../../system.php?page=menu_css");
	exit();
}

$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM css_def_menu WHERE id='$id'"));
$row = mysqli_fetch_array($res);
$css = $row['value'];


$con->query($q=("UPDATE  css SET css='$css' WHERE name='menu_css'"));

			$header="../../system.php?page=menu_css";
			//echo $header;
			header("Location: $header");
?>