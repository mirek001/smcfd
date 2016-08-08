<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';

$key = $_GET['key'];
//$key = htmlentities($key, ENT_QUOTES, "UTF-8");


$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE settings SET value='$key' WHERE name='license_key'"));		

			header("Location:../../system.php?page=license");
?>