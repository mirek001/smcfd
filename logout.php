<?php
	session_start();
	session_start();
require_once 'functions.php';
require_once 'mysql_data.php';

	
	session_unset();
	
	setcookie("emgiee", "", time() - 3600);

	//echo $_COOKIE['emgiee'];

	header('Location: index.php');

?>