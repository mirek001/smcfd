
<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';
require '../../load_lang.php';

$id = $_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
$position = $_GET['position'];
$position = htmlentities($position, ENT_QUOTES, "UTF-8");
$hidden = $_GET['hidden'];
$hidden = htmlentities($hidden, ENT_QUOTES, "UTF-8");
$description = $_GET['description'];
$description = htmlentities($description, ENT_QUOTES, "UTF-8");
$content = $_GET['content'];
$content = htmlentities($content, ENT_QUOTES, "UTF-8");

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE site_map SET meta_desc='$description', content='$content' WHERE id=$id"));
$con->query($q=("UPDATE settings SET int_value='$position' WHERE name='cookies_bar_pos'"));

//echo $q;

			$_SESSION['note']=$_SESSION['lg_changes_saved']."!";

			if (isset($_GET['update'])) {$header="../../system.php?page=cookie_terms_edit";}
			else $header="../../system.php";
			header("Location: $header");

?>