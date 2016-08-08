<?php
session_start();
require_once 'mysql_data.php';
require_once 'load_lang.php';
require_once 'functions.php';
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	$res = $con->query("SELECT * FROM updates WHERE description ='last'");
		$version = mysqli_fetch_array($res);
		$install_name = $version['name'];
		$install_ver = $version['value'];

require_once ('last.php');



if (isset($_GET['update'])){ //POCZĄTEK IFA UPDATE


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
  }
}
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta name="Robots" content="none, noarchive" />
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>SITE MAP CMS - UPDATE</title>

	<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body class="container" style="padding: 50px 0;">
<center>
<?php 

if ($install_ver == $new_ver OR $install_ver > $new_ver){
	if (!isset($_SESSION['note'])){
		$_SESSION['note']=$_SESSION['lg_up_to_date']." (".$install_name.")!";
	}
}
else if ($install_ver < $new_ver) {
	if (!isset($_SESSION['note'])) {
		$_SESSION['note']=$_SESSION['lg_exist_new_update']."!";
	}
}

if (isset($_SESSION['note'])) {
      echo '<div class="alert alert-success" role="alert">';
      echo '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
      echo '<span class="sr-only">Error:</span>';
      echo " ".$_SESSION['note'];
      echo '</div>';
      unset($_SESSION['note']);
}

if ($install_ver == $new_ver OR $install_ver > $new_ver){
	echo '<a class="btn btn-default" href="system.php" role="button">'.$_SESSION['lg_back_to_system_panel'].'</a>';
}
else if ($install_ver < $new_ver) {
	echo '<a class="btn btn-primary" href="upgrade.php?install='.$new_ver.'" role="button">'.$_SESSION['lg_update_to_version'].': '.$new_name.'</a>';
	echo '&nbsp';
	echo '<a class="btn btn-default" href="system.php" role="button">'.$_SESSION['lg_back_to_system_panel'].'</a>';
}


?>
<br><br>
<?php include 'changelog.php'; ?>

<script type="text/javascript" src="js/bootstrap.js"></script>
</center>
</body>
</html>

<?php } // koniec ifa UPDATE ?>