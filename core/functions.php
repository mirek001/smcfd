<?php

$developer=$CONFIG['developer_mode'];
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);

if (!function_exists("show_menu_css")){
function show_menu_css(){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM css WHERE name='menu_css'"));
mysqli_close($con);
$row = mysqli_fetch_array($res);
echo "<style>";
echo $row['css'];
echo "</style>";
}}

if (!function_exists("show_google_analytics")){
function show_google_analytics(){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='google_analytics'"));
mysqli_close($con);
$row = mysqli_fetch_array($res);
$active = $row['int_value'];
$code = $row['value'];

if ($active=="1"){
echo<<<END
<!-- Google Analytics START -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '$code', 'auto');
  ga('send', 'pageview');
</script>
<!-- Google Analytics END -->

END;
}
else echo "";
}}

if (!function_exists("show_meta_title")){
function show_meta_title($id){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$page_title='';
if (isset($id)&&$id!=0) {
$res = $con->query($q=("SELECT *  FROM site_map WHERE id=$id"));
mysqli_close($con);
	$row = mysqli_fetch_array($res);
	$page_title = $row['name'];
}
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='meta_title'"));
mysqli_close($con);
	$row = mysqli_fetch_array($res);
	$site_title = $row['value'];
	$site_title = html_entity_decode($site_title);
	if ($id!=0) {$page_title=" - $page_title";}
	echo "\t<title>$site_title"."$page_title</title>\n";
}}

if (!function_exists("show_meta_description")){
function show_meta_description($id){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE id='$id'"));
mysqli_close($con);
	$row = mysqli_fetch_array($res);
	$page_description = NULL;
	$page_description = $row['meta_desc'];
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='meta_description'"));
mysqli_close($con);
	$row = mysqli_fetch_array($res);
	$description = $row['value'];
	if ($page_description!=NULL){
		$description=$description." - ".$page_description;
	}
	$description = html_entity_decode($description);
	echo '	<meta name=”description” content=”'.$description.'”>'."\n";
}}

if (!function_exists("show_meta_keywords")){
function show_meta_keywords($id){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE id='$id'"));
mysqli_close($con);
	$row = mysqli_fetch_array($res);
	$page_keywords = NULL;
	$page_keywords = $row['meta_keywords'];
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='meta_keywords'"));
mysqli_close($con);
	$row = mysqli_fetch_array($res);
	$keywords = $row['value'];
	if ($page_keywords!=NULL){
		$keywords=$keywords.", ".$page_keywords;
	}
	$keywords = html_entity_decode($keywords);
	echo '	<meta name=”keywords” content=”'.$keywords.'”>'."\n";
}}

if (!function_exists("show_gallery")){
function show_gallery($id, $section_color){
global $CONFIG;
$folder = "upload/$id/"; 
$files = scandir($folder); 
$num_columns=$CONFIG['gallery_numcolumns'];
$i=0;
echo '<div class="gallery" >'."\n";
echo "<table>\n\t<tr>\n";

foreach($files as $file) {
	if ($file!="." && $file!=".." && $file!="thumb"){
	$sciezka = "upload/$id/$file";
	$sciezka_thumb = "upload/$id/thumb/$file";

	if ($i==$num_columns) {
		echo "\t</tr>\n\t<tr>\n";
		$i=0;
	}
	echo "\t\t<td>\n\t\t\t<a href=\"$sciezka\" data-lightbox=\"roadtrip\" ><img src=\"$sciezka_thumb\" /></a>\n\t\t</td>\n";
	$i++; 
	}
}
echo "\t</tr>\r\n</table>\r\n</center>\r\n</div>\r\n";
}}

if (!function_exists("show_headers")){
function show_headers($name){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE type='$name'"));
$row = mysqli_fetch_array($res);
mysqli_close($con);
$page_content = $row['content'];
$section_color = $row['section_color'];
$page_content = html_entity_decode($page_content);
$page_content = nl2br($page_content, true);

	$divin="<div class=\"fr-view\">";
	$divout="</div>";


echo<<<END
\t$divin\n\t\t $page_content \n\t$divout \n
END;
}}


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

	if ($res==FALSE) { // If database is empty, this IF show "Login and create your page" button.
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

			$article_in="<article class=\"fr-view\">\n";
			$article_out="</article>\n";

			echo $article_in;
			echo "\t".$content."\n";
			echo $article_out;
		}
		else if ($section_type=="gallery") {
			show_gallery($id, $section_color);
		}
		else if ($section_type=="code") {
			$code_in="";
			$code_out="";
			echo $code_in;
			$code=stripslashes($code); 
			$code='?>'.$code;
			eval($code);
			echo "\n".$code_out;
		}
		}}}
?>