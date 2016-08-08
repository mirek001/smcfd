
<?php

$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='license_key'"));
$row = mysqli_fetch_array($res);
$key = $row['value'];
$keyl = strlen($key);


if ($keyl == 22){
	echo '<li><a href="system.php?page=license">'.$_SESSION['lg_license'].'</a></li>';
}
else  {
	echo '<li  class="btn-primary" ><a href="system.php?page=license" style="color:white;">'.$_SESSION['lg_license'].'  <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a></li>';
		if (!isset($_SESSION['show_new_update'])){
		$_SESSION['note']="<b>".$_SESSION['lg_exist_new_update']."!</b>";
		$_SESSION['show_new_update']=1;
		}
}
?>
