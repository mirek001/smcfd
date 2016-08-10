<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
if (!isset($_SESSION['id'])) exit();
$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query("DELETE  FROM users  WHERE id=$id");

header("Location: ../../system.php?page=users");
?>