
<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';

$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
$name=$_GET['name'];
$name = htmlentities($name, ENT_QUOTES, "UTF-8");

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE site_map SET name='$name' WHERE id=$id"));		
//echo $q;

header("Location:../../system.php#section-$id");

?>