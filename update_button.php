
<?php
require ('update.php');

if ($install_ver == $new_ver OR $install_ver > $new_ver){
	echo '<li><a href="update.php?update=1">'.$_SESSION['lg_updates'].'</a></li>';

}
else if ($install_ver < $new_ver) {
	echo '<li  class="btn-success" ><a href="update.php?update=1" style="color:white;">'.$_SESSION['lg_updates'].'  <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a></li>';
		if (!isset($_SESSION['show_new_update'])){
		$_SESSION['note']="<b>".$_SESSION['lg_exist_new_update']."!</b>";
		$_SESSION['show_new_update']=1;
		}
}
?>
