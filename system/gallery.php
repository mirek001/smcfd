<?php

$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");


if (!isset($_GET['edit'])) {
	$edit="empty";
}
else {
	$edit=$_GET['edit'];
	$edit = htmlentities($edit, ENT_QUOTES, "UTF-8");
}

if (!file_exists("upload/$id/")) {
    mkdir("upload/$id/", 0777, true);
    mkdir("upload/$id/thumb/", 0777, true);
}

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	$res = $con->query("SELECT * FROM gallery WHERE sm_id= $id");


				$row = mysqli_fetch_array($res);
				if ($row['sm_id'] !== $id) {
					$con->query("INSERT INTO gallery (sm_id) VALUES ($id)");
					$res = $con->query("SELECT * FROM gallery WHERE sm_id= $id");
					$row = mysqli_fetch_array($res);
				}
				$num_columns = $row['num_columns'];
				$thumb_width = $row['thumb_width'];
				$border = $row['border'];
				$border_radius = $row['border_radius'];
				$padding = $row['padding'];


?>
<center>
<div style="max-width:500px;">
<div style="text-align:left;">
<?php 
//$lang_num_columns=$_SESSION['lg_num_columns'];
//$lang_border=$_SESSION['lg_border'];
//$lang_border_radius=$_SESSION['lg_border_radius'];
//$lang_padding=$_SESSION['lg_padding'];
//$lang_section_color=$_SESSION['lg_section_color'];

change_style ($id, 'num_columns', $edit, $_SESSION['lg_num_columns']);
change_style ($id, 'border', $edit, $_SESSION['lg_border']);
change_style ($id, 'border_radius', $edit, $_SESSION['lg_border_radius']);
change_style ($id, 'padding', $edit, $_SESSION['lg_padding']);
change_section_color ($id, 'section_color', $edit, $_SESSION['lg_section_color']);
$section_color=$_SESSION['section_color'];

$lang_upload_picture=$_SESSION['lg_upload_picture'];
$lang_choose_file_from_disk=$_SESSION['lg_choose_file_from_disk'];

?>
</div>
</div>
</center>




<br><br>

<center>

<form role="form" action="system/core/gallery_upload.php" method="post" enctype="multipart/form-data">
	<?php echo $lang_choose_file_from_disk; ?>
    <div class="form-group">
    <input class="btn btn-default" type="file" name="fileToUpload" id="fileToUpload" >
    </div>
    <?php echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";?>
    <div class="form-group">
    <?php echo "<input class=\"btn btn-primary\" type=\"submit\" value=\"$lang_upload_picture\" name=\"submit\">";?>
    </div>
</form>
</center>



<?php ///// co poniżej wyświetla galerie, na samej górze jest wczytywanie z bazy to też należy zostawić w plikach themesa 
$katalog    = "upload/$id/"; 
$pliki = scandir($katalog); 
$lang_delete=$_SESSION['lg_delete'];
echo $section_color;
$i=0;
echo "<div style=\"background-color:$section_color;\"  >";
echo "<div class=\"container-fluid\" >";
echo "<center><table><tr>";


foreach($pliki as $plik) {
	if ($plik=="." || $plik=="..") {
		echo "";
	}
	else if ($plik=="thumb") {
		echo "";
	}
	else {
	$sciezka = "upload/$id/$plik";
	$sciezka_thumb = "upload/$id/thumb/$plik";
	make_thumb($sciezka, $sciezka_thumb, '500');
	if ($i==$num_columns) {
		echo "</tr><tr>";
		$i=0;
	}

	echo "<td style=\"padding:$padding\px;\"><a href=\"$sciezka\" data-lightbox=\"roadtrip\">";
	echo "<img style=\"border: $border\px solid; border-radius: $border_radius\px;  max-width:300px; height:auto; margin-left:auto; margin-right:auto; display:table; \" src=\"$sciezka_thumb\"  alt=\"\"/></a><br><div style=\"text-align:center\"><a href=\"system/core/delete_from_gallery.php?id=$id&plik=$plik\"><span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>$lang_delete</div></a></td>";
	$i++; 
	//echo "<img src=\"upload/$id/$plik\" alt=\"Tu podaj tekst alternatywny\" />";
	//echo '<p>'.$plik.'</p>'; 

	}
}

echo "</tr></table></center>";
echo "</div>";
echo "</div>";


function change_style ($id, $type, $edit, $nazwa) {
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query("SELECT * FROM gallery WHERE sm_id= $id");
$lang_save=$_SESSION['lg_save'];
	$row = mysqli_fetch_array($res);
	$value = $row[$type];

	if ($type=='num_columns'){
		$px="";
	}
	else $px="px";


if ($edit==$type) {
echo<<<END
<form class="form-inline" action="system/core/change_style.php" role="form">
  <div class="form-group">
    	<label for="text">$nazwa:</label>
    	<input type="text" name="column" class="form-control" value="$value" id="text">
  </div>
  	<input type="hidden" name="page" value="gallery">
	<input type="hidden" name="id" value="$id">
	<input type="hidden" name="edit" value="$type">
  <button type="submit" class="btn btn-default">$lang_save</button>
</form>
END;
}
else {
echo<<<END
<form class="form-inline" action="system.php" role="form">
  <div class="form-group">
    <label for="text">$nazwa:</label>
  </div>
	<input type="hidden" name="page" value="gallery">
	<input type="hidden" name="id" value="$id">
	<input type="hidden" name="edit" value="$type">
   <button type="submit" class="btn btn-xs btn-default">$value $px</button>
</form>
END;
}


}

function change_section_color ($id, $type, $edit, $nazwa) {
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query("SELECT * FROM site_map WHERE id= $id");
	$row = mysqli_fetch_array($res);
	$value = $row[$type];
	$lang_save=$_SESSION['lg_save'];
	//$section_color=$_SESSION['section_color'];

if ($edit==$type) {
echo<<<END
<form class="form-inline" action="system/core/change_section_color.php" role="form">
  <div class="form-group">
    	<label for="text">$nazwa:</label>
    	<input type="text" name="column" class="form-control" value="$value" id="text">
  </div>
  	<input type="hidden" name="page" value="gallery">
	<input type="hidden" name="id" value="$id">
	<input type="hidden" name="edit" value="$type">
  <button type="submit" class="btn btn-default">$lang_save</button>
</form>
END;
}
else {
$select_color_from_adobe=$_SESSION['lg_select_color_from_adobe'];
echo<<<END
<form class="form-inline" action="system.php" role="form">
  <div class="form-group">
    <label for="text">$nazwa:</label>
  </div>
	<input type="hidden" name="page" value="gallery">
	<input type="hidden" name="id" value="$id">
	<input type="hidden" name="edit" value="$type">
   <button type="submit" class="btn btn-xs btn-default">$value</button>
   <a href="https://color.adobe.com" target="_blank">$select_color_from_adobe</a>
</form>
END;
$_SESSION['section_color']=$value;
}


}


function make_thumb($src, $dest, $desired_width) {

	/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));
	
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image, $dest);
}
?>