<?php
session_start();
if (!isset($_SESSION['id'])) require'login.php';
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='website_address'"));
$row = mysqli_fetch_array($res);
$_SESSION['website_address'] = $row['value'];
?>