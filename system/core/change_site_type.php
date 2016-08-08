
<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';
require '../../load_lang.php';


$type = $_GET['type'];
$type = htmlentities($type, ENT_QUOTES, "UTF-8");



$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE settings SET int_value='$type' WHERE name='site_type'"));	

//echo $q;

			$_SESSION['note']=$_SESSION['lg_changes_saved']." ! <a href=\"index.php\" target=\"_blank\">(".$_SESSION['lg_preview'].")</a>";

			if (isset($_GET['update'])) {$header="../../system.php?page=general_settings";}
			else $header="../../system.php";
			//echo $header;
			header("Location: $header");

?>