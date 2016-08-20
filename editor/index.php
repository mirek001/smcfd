<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
//require_once 'functions.php';
require_once '../mysql_data.php';
require_once '../load_lang.php';
require_once '../load_settings.php';
require_once '../config.php';
?>

<?php
require_once '../functions.php';

  if (!isset($_COOKIE['emgiee']))
  {
    header('Location: ../login.php?app=editor');
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

<frameset cols="15%,*">
<?php echo '<frame src="'.$CONFIG['page_url'].'/editor/tree.php" name="tree">';?>
<?php echo '<frame src="'.$CONFIG['page_url'].'/editor/edit.php" name="edit">';?>
<noframes>
</head>
<body>

</body>
</frameset>
</html>
