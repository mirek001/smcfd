
<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';


$meta_title = $_GET['meta_title'];
$meta_title = htmlentities($meta_title, ENT_QUOTES, "UTF-8");
$meta_description = $_GET['meta_description'];
$meta_description = htmlentities($meta_description, ENT_QUOTES, "UTF-8");
$website_address = $_GET['website_address'];
$website_address = htmlentities($website_address, ENT_QUOTES, "UTF-8");

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE settings SET value='$website_address' WHERE name='website_address'"));	
$con->query($q=("UPDATE settings SET value='$meta_title' WHERE name='meta_title'"));	
$con->query($q=("UPDATE settings SET value='$meta_description' WHERE name='meta_description'"));	

//echo $q;

			$_SESSION['note']="Zapisano zmiany !";

			if (isset($_GET['update'])) {$header="../../system.php?page=general_settings";}
			else $header="../../system.php";
			//echo $header;
			header("Location: $header");

?>