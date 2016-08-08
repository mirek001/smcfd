<?php
session_start();

$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='license_key'"));
$row = mysqli_fetch_array($res);

$key = $row['value'];


?>

<?php 
echo<<<END
<div class="container">
<form class="form-inline" action="system/core/change_license_code.php">
  <div class="form-group">
END;
$lang_analytics_ua_code=$_SESSION['lg_analytics_ua_code'];
$lang_save=$_SESSION['lg_save'];
$lang_cancel=$_SESSION['lg_cancel'];
echo<<<END
  </div>
  <div class="form-group">
    <label class="sr-only">$lang_analytics_ua_code:</label>
    <input type="input" class="form-control" name="key" placeholder="xxxxx-xxxxxxxxxx-xxxxx" value="$key" >
  </div>
  <button type="submit" class="btn btn-primary">$lang_save</button>
  <a href="system.php" class="btn btn-default" role="button">$lang_cancel</a>
</form>
</div>
END;
?>






