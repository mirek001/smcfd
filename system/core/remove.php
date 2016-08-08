<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require_once '../../mysql_data.php';


$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");


$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query("DELETE  FROM site_map  WHERE id=$id");

header("Location: ../../system.php#section-$id");

?>
