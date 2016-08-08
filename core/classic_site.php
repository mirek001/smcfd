<?php
if (!isset($_GET['id'])) {
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE cat_id = 1 AND type='page' ORDER BY position"));
mysqli_close($con);
$row = mysqli_fetch_array($res);
$id=$row['id'];
}
else if (isset($_GET['id'])) {
$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
}

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query("SELECT * FROM site_map WHERE cat_id = $id ORDER BY position");
mysqli_close($con);

	if ($res==FALSE) {
		echo '<center><a class="btn btn-default" href="system.php" role="button">'.$_SESSION['lg_login_and_create'].'</a></center>';
                exit();
	}
	while ($row = mysqli_fetch_array($res)){
		$content=$row['content'];
		$code=$content;
		$content = html_entity_decode($content);
		$id=$row['id'];
		$section_type=$row['section_type'];
		$section_color=$row['section_color'];
		if ($section_type=="html") { 
			echo "<div style=\"background-color:$section_color; z-index:0;\"  >";
			echo "<div style=\"padding:20px 0; margin:0;\" class=\"fr-view\" >";
			echo $content;
			echo "</div>";
			echo "</div>";
		}
		else if ($section_type=="gallery") {
			show_gallery($id, $section_color);
		}
		else if ($section_type=="code") {
			echo "<div style=\"background-color:$section_color; \"  >";
			echo "\n\r";
			$code=stripslashes($code); 
			$code='?>'.$code;
			eval($code);
			echo "</div>";
		}
	}
?>