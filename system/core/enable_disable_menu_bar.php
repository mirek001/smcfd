
<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';

$hidden = $_GET['hidden'];
$hidden = htmlentities($hidden, ENT_QUOTES, "UTF-8");


$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE settings SET int_value='$hidden' WHERE name='disabled_menu'"));		
//echo $q;


			if ($hidden=="1") $_SESSION['note']="Menu is now disabled!";
			if ($hidden=="0") $_SESSION['note']="Menu is now enabled!";

			$header="../../system.php?page=menu_css";
			header("Location: $header");

?>