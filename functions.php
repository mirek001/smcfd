<?php
require_once 'mysql_data.php';


function login($id) {

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	
	if ($con->connect_errno!=0)
	{
		echo "Error: ".$con->connect_errno;
	}
	else
	{
		$res = $con->query("SELECT * FROM users WHERE id= 1");
				$user = mysqli_fetch_array($res);
						echo $user['user'];
	}
	$con->close();
}





?>