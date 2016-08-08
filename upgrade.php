<?php
session_start();
ob_start();
require_once  'mysql_data.php';
require_once  'load_lang.php';

if (!isset($_GET['install'])) {
	echo "<center>sorry, you must login first (errno: 781)</center>";
	header ("Refresh:5; url=system.php");
	exit();
}

if (!isset($_COOKIE['emgiee']))
{
	header('Location: system.php');
}

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	
	if ($con->connect_errno!=0)
	{
		echo "Error: ".$con->connect_errno;
	}
	else
	{
		
		$cookie = $_COOKIE['emgiee'];
		$res = @$con->query("SELECT * FROM users WHERE cookie=$cookie");
			$spr = mysqli_fetch_array($res);
			if ($spr){
				$file=$_GET['install'];
				unlink("$file.zip");
				system("wget http://update.sitemapcms.com/$file.zip");
				sleep(3);
				system("unzip -o $file.zip");
				sleep(3);
				unlink("$file.zip");
				//unlink("translate.php");
				//include_once 'mysql_update.php';
				//unlink("mysql_update.php");
				require_once 'check.php';
				if ($check == $file) {
					$_SESSION['note']=$_SESSION['lg_update_ok_is_new_ver'];
					require_once ('last.php');
					$con->query("UPDATE updates SET name='$new_name', value='$new_ver'");
				}
				else $_SESSION['note']=$_SESSION['update_something_wrong']." (Errno: 766";
				
				header("Location: update.php?update=1");

			}
			else { 
				echo "<center>sorry, you must login first (errno: 734)</center>";
				header ("Refresh:5; url=system.php");
			}
	}

$con->close();	
ob_end_flush();
?>