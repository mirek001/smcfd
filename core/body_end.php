<?php
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM settings WHERE name='facebook_address'"));
mysqli_close($con);
	$row = mysqli_fetch_array($res);
	$facebook_show=$row['int_value'];
if ($facebook_show=='1') require_once 'facebook.php';

show_google_analytics();

?>