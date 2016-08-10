<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';

$email=$_POST['email'];
$new_passwd=$_POST['new_passwd'];
$passwd_confirm=$_POST['passwd_confirm'];
$user_id=$_SESSION['user_id'];

if ($new_passwd==$passwd_confirm){
	$passwd_hash = password_hash($new_passwd, PASSWORD_DEFAULT);
	$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
	$con->query($q=("INSERT INTO `users` (`id`, `user`, `passwd`, `cookie`, `admin`) VALUES (NULL, '$email', '$passwd_hash', NULL, '0');"));
$_SESSION['note']="OK!";

} else $_SESSION['note']="Somethink was wrong! Err: 835";

header("Location:../../system.php?page=users");

?>