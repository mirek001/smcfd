
<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';

$type = $_GET['type'];
$type = htmlentities($type, ENT_QUOTES, "UTF-8");
$disabled = $_GET['disabled'];
$disabled = htmlentities($disabled, ENT_QUOTES, "UTF-8");



$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE site_map SET disabled='$disabled' WHERE type='$type'"));		
//echo $q;


			if ($disabled=="1") $_SESSION['note']=$_SESSION['lg_changes_saved']."!";
			if ($disabled=="0") $_SESSION['note']=$_SESSION['lg_changes_saved']."!";

			$header="index.php";
			header("Location: $header");

?>