<?php
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
		$res = $con->query("SELECT * FROM settings WHERE name = 'lang'");
		$row = mysqli_fetch_array($res);
		$language = $row['value'];
		$_SESSION['lang']=$language;

if ($language=="pl") require_once 'lang/pl.php';
if ($language=="en") require_once 'lang/en.php';


?>