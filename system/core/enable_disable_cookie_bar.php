
<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';

$id = $_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
$hidden = $_GET['hidden'];
$hidden = htmlentities($hidden, ENT_QUOTES, "UTF-8");


$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE settings SET int_value='$hidden' WHERE name='show_cookies_bar'"));		
//echo $q;


			if ($hidden=="0") $_SESSION['note']="Cookies bar is now disabled!";
			if ($hidden=="1") $_SESSION['note']="Cookies bar is now enabled!";

			$header="../../system.php?page=cookie_terms_edit";
			header("Location: $header");

?>