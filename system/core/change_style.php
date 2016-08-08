
<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';

$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
$column=$_GET['column'];
$column = htmlentities($column, ENT_QUOTES, "UTF-8");
$edit=$_GET['edit'];
$edit = htmlentities($edit, ENT_QUOTES, "UTF-8");

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE gallery SET $edit='$column' WHERE sm_id=$id"));		
//echo $q;

header("Location:../../system.php?page=gallery&id=$id");

?>