<?php

$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE type='cookie_terms'"));
$row = mysqli_fetch_array($res);

$id = $row['id'];
$position = $row['int_value'];
$hidden = $row['hidden'];
$description = $row['description'];
$content = $row['content'];



if ($hidden=="1"){
	$disabled="disabled";
}
else $disabled="";

?>

<?php  /// wybór motywu menu
echo<<<END
<div class="container">
<form action="system/core/change_cookie_terms.php">
<div style="overflow:auto;">
<div style="width:30%; float:left" class="form-group">
END;
enable_disable_cookies_settings($id, $hidden);
$lang_select_cookie_bar_style=$_SESSION['lg_select_cookie_bar_style'];
echo<<<END
</div>
<div style="width:40%; float:left" class="form-group">
</div>

<div style="width:30%; float:left;" class="form-group">
$lang_select_cookie_bar_style:
END;
select_cookie_bar_style($position, $disabled);
echo<<<END
</div>
</div>
<br>
END;
?>

<?php
$lang_text_on_cookies_bar=$_SESSION['lg_text_on_cookies_bar'];
echo<<<END
<div class="form-group">
$lang_text_on_cookies_bar:
  <textarea class="form-control" name="description" rows="3" $disabled>$description</textarea>
</div>
END;
?>

<?php
$lang_cookies_terms=$_SESSION['lg_cookies_terms'];
$lang_update=$_SESSION['lg_update'];
$lang_save_and_quit=$_SESSION['lg_save_and_quit'];
$lang_cancel=$_SESSION['lg_cancel'];
echo<<<END
<div class="form-group">
$lang_cookies_terms:
  <textarea class="form-control" name="content" rows="15" $disabled>$content</textarea>
</div>
  	<input type="hidden" name="id" value="$id">
  	<input class="btn btn-primary $disabled" type="submit" name="update" value="$lang_update">
      <input class="btn btn-primary $disabled" type="submit" name="save" value="$lang_save_and_quit">
      <a class="btn btn-default" href="system.php" role="button">$lang_cancel</a>
</form>
</div>
END;
?>



<?php ///funkcje

function select_cookie_bar_style($position, $disabled){
echo "<fieldset $disabled>";
echo "<select name=\"position\" class=\"form-control\" >";
echo "<option  value=\"1\" ".check_selected_cookie_style(1, $position).">Dark Top Bar</option>";
echo "<option  value=\"2\" ".check_selected_cookie_style(2, $position).">Dark Bottom Bar</option>";
echo "<option  value=\"3\" ".check_selected_cookie_style(3, $position).">Light Top Bar</option>";
echo "<option  value=\"4\" ".check_selected_cookie_style(4, $position).">Light Bottom Bar</option>";
echo "</select>";
echo "</fieldset>";
}

function check_selected_cookie_style($no, $position){
if ($no==$position) return "selected";
}

function enable_disable_cookies_settings($id, $hidden) {
	if ($hidden=="0"){
		echo "<a href=\"system/core/enable_disable_cookie_bar.php?id=$id&hidden=1\" class=\"btn btn-success btn\" role=\"button\">".$_SESSION['lg_cookies_bar_is_on']."</a>";
	}
	else echo "<a href=\"system/core/enable_disable_cookie_bar.php?id=$id&hidden=0\" class=\"btn btn-danger btn\" role=\"button\">".$_SESSION['lg_cookies_bar_is_off']."</a>";

}


?>


