<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';

$old_passwd=$_POST['old_passwd'];
$new_passwd=$_POST['new_passwd'];
$passwd_confirm=$_POST['passwd_confirm'];
$user_id=$_SESSION['user_id'];

if ($new_pass==$pass_confirm){
	$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
	$res = $con->query($q=("SELECT * FROM users WHERE id='$user_id'"));
	$row = mysqli_fetch_array($res);

	if(password_verify($old_passwd, $row['passwd'])){
		$passwd_hash=password_hash($new_passwd, PASSWORD_DEFAULT);
		$con->query($q=("UPDATE users SET passwd='$passwd_hash' WHERE id=$user_id"));

		$_SESSION['note']="Password updated!";
	} else $_SESSION['note']="Password incorrect!";

} else $_SESSION['note']="Password incorrect!";

header("Location:../../system.php?page=general_settings");

?>