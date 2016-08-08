<?php 
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='disabled_menu'"));
mysqli_close($con);
$row = mysqli_fetch_array($res);
$disabled_menu = $row['int_value'];
if ($disabled_menu=="0"){
require_once "navhtml5.php"; 
}
?>