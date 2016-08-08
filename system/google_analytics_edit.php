<?php

$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='google_analytics'"));
$row = mysqli_fetch_array($res);

$id = $row['id'];
$code = $row['value'];
$disable = $row['int_value'];


if ($disable=="0"){
	$disabled="disabled";
}
else $disabled="";

?>

<?php  /// wybór motywu menu
echo<<<END
<div class="container">
<form class="form-inline" action="system/core/change_google_analytics_code.php">
  <div class="form-group">
END;
enable_disable_google_analytics($id, $disable);
$lang_analytics_ua_code=$_SESSION['lg_analytics_ua_code'];
$lang_save=$_SESSION['lg_save'];
$lang_cancel=$_SESSION['lg_cancel'];
echo<<<END
  </div>
  <div class="form-group">
    <label class="sr-only">$lang_analytics_ua_code:</label>
    <input type="input" class="form-control" name="code" placeholder="UA-xxxxxxxx-x" value="$code" $disabled>
  </div>
  <button type="submit" class="btn btn-primary">$lang_save</button>
  <a href="system.php" class="btn btn-default" role="button">$lang_cancel</a>
</form>
</div>
END;
?>



<?php ///funkcje

function enable_disable_google_analytics($id, $disable) {
	if ($disable=="1"){
		echo "<a href=\"system/core/enable_disable_google_analytics.php?id=$id&disable=0\" class=\"btn btn-success btn\" role=\"button\">".$_SESSION['lg_google_analytics_is_on']."</a>";
	}
	else echo "<a href=\"system/core/enable_disable_google_analytics.php?id=$id&disable=1\" class=\"btn btn-danger btn\" role=\"button\">".$_SESSION['lg_google_analytics_is_off']."</a>";

}


?>


