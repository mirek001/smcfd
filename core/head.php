<?php
if (isset($_GET['id'])){
$id=$_GET['id'];
} else {
  $id=0;
}
show_meta_title($id); 
show_meta_description($id); 
show_meta_keywords($id); 
echo '	<meta author="'.$CONFIG['meta_author'].'">'."\n";?>
    <meta name="application-name" content="Site Map CMS">
    <link rel="icon" type="image" href="./images/favicon.jpg" />
    <link rel="stylesheet" href="./css/froala_style.css">
<?php require_once './cookies_bar.php';?>
<?php 
$css_dir = $home_url.'css';
$js_dir = $home_url.'js/head';

// Open a known directory, and proceed to read its contents
if (is_dir($css_dir)) {
   if ($dh = opendir($css_dir)) {
       while (($file = readdir($dh)) !== false) {
       		if ($file != "." && $file != "..") { 
				echo '	<link rel="stylesheet" href="'.$home_url.'css/'.$file.'">'."\n";
       } 
       }
       closedir($dh);
   }
}
if (is_dir($js_dir)) {
   if ($dh = opendir($js_dir)) {
       while (($file = readdir($dh)) !== false) {
       		if ($file != "." && $file != "..") { 
				echo '	<script src="'.$home_url.'js/head/'.$file.'"></script>'."\n\r";
       } 
       }
       closedir($dh);
   }
}
?>