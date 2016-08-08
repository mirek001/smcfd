<?php

$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='meta_title'"));
$row = mysqli_fetch_array($res);
$meta_title = $row['value'];
$res = $con->query($q=("SELECT *  FROM settings WHERE name='meta_description'"));
$row = mysqli_fetch_array($res);
$meta_description = $row['value'];
$res = $con->query($q=("SELECT *  FROM settings WHERE name='website_address'"));
$row = mysqli_fetch_array($res);
$website_address = $row['value'];



make_thumb("images/favicon-src.jpg", "images/favicon.jpg", '32');

$lang_change_icon=$_SESSION['lg_change_icon'];
$lang_select_jpg_file=$_SESSION['lg_select_jpg_file'];


?>


<?php  /// wybór motywu menu
echo<<<END
<div class="container" style="width:1000px;">

<div style="overflow:auto;">
<div style="width:30%; float:left" class="form-group">

</div>
<div style="width:40%; float:left;" class="form-group">
<span style="text-align:right;  float:left;"><img src="images/favicon.jpg"></span>
<form role="form" class="form-inline" action="system/core/favicon_upload.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
	<input  class="btn btn-default" type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" value="$lang_change_icon" name="submit">
    </div>
</form>
<center><small>*- $lang_select_jpg_file</small></center>
</div>

<div style="width:30%; float:right;" class="form-group">

</div>
</div>
<br>
END;
?>

<?php
$lang_website_address=$_SESSION['lg_website_address'];
echo<<<END
<form action="system/core/change_meta_tags.php" method="GET">
<div class="form-group ">
$lang_website_address: 
  <textarea class="form-control col-sm-4" name="website_address" rows="1">$website_address </textarea>
</div>
END;
?>


<?php
$lang_website_title=$_SESSION['lg_website_title'];
echo<<<END
<div class="form-group">
$lang_website_title: 
  <textarea class="form-control" name="meta_title" rows="1">$meta_title</textarea>
</div>
END;
?>

<?php
$lang_website_description=$_SESSION['lg_website_description'];
$lang_update=$_SESSION['lg_update'];
$lang_save_and_quit=$_SESSION['lg_save_and_quit'];
$lang_cancel=$_SESSION['lg_cancel'];
echo<<<END
<div class="form-group">
$lang_website_description:
  <textarea class="form-control" name="meta_description" rows="3">$meta_description</textarea>
</div>
  	<input class="btn btn-primary" type="submit" name="update" value="$lang_update">
      <input class="btn btn-primary" type="submit" name="save" value="$lang_save_and_quit">
      <a class="btn btn-default" href="system.php" role="button">$lang_cancel</a>
</form>
</div>
END;
?>
<br><br>
<div class="container" style="width:500px;">
<form class="form-horizontal" action="system/core/change_passwd.php" method="POST">
  <div class="form-group">
    <label for="" class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
      <?php echo '<h4>'.$_SESSION['lg_change_passwd'].':</h4>';?>
    </div>
  </div>
  <div class="form-group">
    <?php echo '<label for="old_passwd" class="col-sm-4 control-label">'.$_SESSION['lg_old_password'].'</label>';?>
    <div class="col-sm-8">
      <?php echo '<input type="password" class="form-control" name="old_passwd" id="old_passwd" placeholder="'.$_SESSION['lg_old_password'].'">';?>
    </div>
  </div>
  <div class="form-group">
    <?php echo '<label for="new_passwd" class="col-sm-4 control-label">'.$_SESSION['lg_new_password'].'</label>';?>
    <div class="col-sm-8">
      <?php echo '<input type="password" class="form-control" name="new_passwd" id="new_passwd" placeholder="'.$_SESSION['lg_new_password'].'">'?>
    </div>
  </div>
  <div class="form-group">
    <?php echo '<label for="passwd_confirm" class="col-sm-4 control-label">'.$_SESSION['lg_new_password_confirm'].'</label>';?>
    <div class="col-sm-8">
      <?php echo '<input type="password" class="form-control" name="passwd_confirm" id="passwd_confirm" placeholder="'.$_SESSION['lg_new_password'].'">';?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <?php echo '<button type="submit" class="btn btn-default">'.$_SESSION['lg_update'].'</button>';?>
    </div>
  </div>
</form></div>
<script>
  var password = document.getElementById("new_passwd")
  , confirm_password = document.getElementById("passwd_confirm");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
<?php ///funkcje

function make_thumb($src, $dest, $desired_width) {

	/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));
	
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor('32', '32');
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, '32', '32', $width, $height);
	
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image, $dest);
}

?>


