<?php
session_start();
require_once './config.php';
require_once 'mysql_data.php';
$developer=$CONFIG['developer_mode'];
$home_url=$CONFIG['developer_folder_name'];
$home_url="./developer/$home_url/";
include_once "$home_url".'core/functions.php';
require_once './core/functions.php';

if ($developer!=1){
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
		$res = $con->query("SELECT * FROM settings WHERE name = 'theme'");
				$row = mysqli_fetch_array($res);
				$theme = $row['value'];
mysqli_close($con);
require_once "themes/$theme/index.php";
}
else{	
require_once "$home_url".'index.php';
}

?>