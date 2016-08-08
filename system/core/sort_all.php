<?php
session_start();
if (!isset($_SESSION['id'])) exit();

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE type='category' ORDER BY position"));	
	$n=1;
	while ($row = mysqli_fetch_array($res))	{
		$cat_id = $row['cat_id'];
		cat_id_sort($cat_id);
		}

$res = $con->query($q=("SELECT * FROM site_map WHERE type='page' ORDER BY position"));	
	$n=1;
	while ($row = mysqli_fetch_array($res))	{
		$cat_id = $row['cat_id'];
		cat_id_sort($cat_id);
		}


$res = $con->query($q=("SELECT * FROM site_map WHERE type='section' ORDER BY position"));	
	$n=1;
	while ($row = mysqli_fetch_array($res))	{
		$cat_id = $row['cat_id'];
		cat_id_sort($cat_id);
		}


function cat_id_sort($cat_id){
	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	$res = $con->query($q=("SELECT * FROM site_map WHERE cat_id=$cat_id ORDER BY position"));	
	$n=1;
	while ($row = mysqli_fetch_array($res))	{
		$id = $row['id'];
		new_pos($id, $n);
		$n++;
	}
}

function new_pos($id, $n){
	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	$res = $con->query($q=("UPDATE site_map SET position=$n WHERE id=$id"));	
}

?>

