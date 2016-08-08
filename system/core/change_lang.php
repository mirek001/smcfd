
<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';


$lang = $_GET['lang'];
$lang = htmlentities($lang, ENT_QUOTES, "UTF-8");



$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE settings SET value='$lang' WHERE name='lang'"));	

//echo $q;
			
			if ($lang=='pl') $_SESSION['note']="Wybrano język Polski";
			if ($lang=='en') $_SESSION['note']="Selected English language";

			$header="../../system.php";
			//echo $header;
			header("Location: $header");

?>