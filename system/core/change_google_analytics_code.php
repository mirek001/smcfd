
<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';

$id = $_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
$code = $_GET['code'];
$code = htmlentities($code, ENT_QUOTES, "UTF-8");

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE settings SET value='$code' WHERE name='google_analytics'"));		
//echo $q;

		$_SESSION['note']=$_SESSION['lg_changes_saved']."!";

		$header="../../system.php?page=google_analytics_edit";

			//echo $header;
			header("Location: $header");

?>