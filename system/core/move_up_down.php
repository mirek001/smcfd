<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require_once '../../mysql_data.php';



$action=$_GET['action'];
$action = htmlentities($action, ENT_QUOTES, "UTF-8");
$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");




if ($action=="move_up"){
	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);

	$res = $con->query("SELECT * FROM site_map  WHERE id=$id");
	$row = mysqli_fetch_array($res);
	$pos1 = $row['position'];
	$id1 = $row['id'];
	$cat_id = $row['cat_id'];

	$res = $con->query("SELECT * FROM site_map  WHERE cat_id=$cat_id AND position=$pos1-1");
	$row = mysqli_fetch_array($res);
	$pos2 = $row['position'];
	$id2 = $row['id'];

	$con->query("UPDATE site_map SET position=$pos2 WHERE id=$id1");
	$con->query("UPDATE site_map SET position=$pos1 WHERE id=$id2");

	header("Location: ../../system.php#section-$id");
}

if ($action=="move_down"){
	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);

	$res = $con->query("SELECT * FROM site_map  WHERE id=$id");
	$row = mysqli_fetch_array($res);
	$pos1 = $row['position'];
	$id1 = $row['id'];
	$cat_id = $row['cat_id'];

	$res = $con->query("SELECT * FROM site_map  WHERE cat_id=$cat_id AND position=$pos1+1");
	$row = mysqli_fetch_array($res);
	$pos2 = $row['position'];
	$id2 = $row['id'];

	$con->query("UPDATE site_map SET position=$pos2 WHERE id=$id1");
	$con->query("UPDATE site_map SET position=$pos1 WHERE id=$id2");

	header("Location: ../../system.php#section-$id");
}

?>