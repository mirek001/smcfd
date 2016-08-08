<?php
session_start();
require_once 'functions.php';
require_once 'mysql_data.php';


	if (!isset($_COOKIE['emgiee']))
	{
		header('Location: login.php');
		//exit();
	}
	else {
	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	
	if ($con->connect_errno!=0)
	{
		echo "Error: ".$con->connect_errno;
	}
	else
	{
		$cookie = $_COOKIE['emgiee'];
		$res = @$con->query("SELECT * FROM users WHERE cookie= $cookie");
			$user = mysqli_fetch_array($res);
					$_SESSION['id']= $user['id'];		
					header('Location: system.php');	
	}
}
?>