<?php
if (!function_exists("page_classic")){
function page_classic($id){
$developer=0;
global $developer;
if ($id==0) {
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE cat_id = 1 AND type='page' ORDER BY position"));
$row = mysqli_fetch_array($res);
mysqli_close($con);
$id=$row['id'];
}
else {
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
}


$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query("SELECT * FROM site_map WHERE cat_id = $id ORDER BY position");
mysqli_close($con);

	if ($res==FALSE) { // Jeżeli baza stron jest pusta to pokazuje przycisk "Zaloguj i stwórz stronę"
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

			$article_in="<article  class=\"container-fluid fr-view\">\n";
			$article_out="</article>\n";

			echo $article_in;
			echo "\t".$content."\n";
			echo $article_out;
		}
		else if ($section_type=="gallery") {
			show_gallery($id, $section_color);
		}
		else if ($section_type=="code") {
			$code_in="<div class=\"container-fluid\">";
			$code_out="</div>";
			echo $code_in;
			$code=stripslashes($code); 
			$code='?>'.$code;
			eval($code);
			echo "\n".$code_out;
		}
		}}}
?>