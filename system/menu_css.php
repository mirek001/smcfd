<?php

$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM css WHERE name='menu_css'"));
$row = mysqli_fetch_array($res);
$css = $row['css'];
$id = $row['id'];
$res = $con->query($q=("SELECT *  FROM settings WHERE name='disabled_menu'"));
$row = mysqli_fetch_array($res);
$hidden = $row['int_value'];

?>

<?php  /// wybór motywu menu
enable_disable_menu($hidden) ;
$lang_change_menu_style=$_SESSION['lg_change_menu_style'];
echo<<<END
<div class="container">
<form class="form-inline" action="system/core/change_menu_style_from_db.php">
  <div class="form-group">
  $lang_change_menu_style: 
END;
select_css_menu_theme();
$lang_update=$_SESSION['lg_update'];
echo<<<END
      <input class="btn btn-primary" type="submit" name="save" value="$lang_update">
</form>
</div>
<br>
END;
?>


<?php
$lang_update=$_SESSION['lg_update'];
$lang_save_and_quit=$_SESSION['lg_save_and_quit'];
$lang_cancel=$_SESSION['lg_cancel'];
echo<<<END
<div class="container">
<form action="system/core/menu_css_save.php">
  <div class="form-group">
  <textarea class="form-control" name="css" rows="23">$css</textarea>
  </div>
  	<input type="hidden" name="id" value="$id">
  	<input class="btn btn-primary" type="submit" name="update" value="$lang_update">
      <input class="btn btn-primary" type="submit" name="save" value="$lang_save_and_quit">
      <a class="btn btn-default" href="system.php" role="button">$lang_cancel</a>
</form>
</div>
END;
?>



<?php ///funkcje

function select_css_menu_theme(){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM css_def_menu"));
echo "<select name=\"id\" class=\"form-control\">";
echo "<option  value=\"0\">Click and choose menu style.</option>";
while ($row = mysqli_fetch_array($res)){
	$id = $row['id'];
	$name = $row['name'];
echo "<option  value=\"$id\">$name</option>";
}
echo "</select>";
}

function check_selected_cookie_style($no, $position){
if ($no==$position) return "selected";
}

function enable_disable_menu($hidden) {
  if ($hidden=="0"){
    echo "<a href=\"system/core/enable_disable_menu_bar.php?hidden=1\" class=\"btn btn-success btn\" role=\"button\">".$_SESSION['lg_menu_is_on']."</a>";
  }
  else echo "<a href=\"system/core/enable_disable_menu_bar.php?hidden=0\" class=\"btn btn-danger btn\" role=\"button\">".$_SESSION['lg_menu_is_off']."</a>";

}
?>


