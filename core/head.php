<?php show_meta_title($id); ?>
<?php show_meta_description($id); ?>
<?php show_meta_keywords($id); ?>
<?php echo '	<meta author="'.$CONFIG['meta_author'].'">'."\n";?>
	<meta name="application-name" content="Site Map CMS">
<?php 
if ($CONFIG['developer_mode']!=1){
	echo '	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />'."\n";
	echo '	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">'."\n";
	echo '	<link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon" />'."\n";
	echo '	<link rel="stylesheet" href="css/lightbox.css">'."\n";
	echo '	<script src="js/lightbox.js"></script>'."\n";
}
?>
	<link rel="stylesheet" href="./css/froala_style.css">
<?php require_once './cookies_bar.php';?>
<?php 
if ($CONFIG['developer_mode']==1){
$css_dir = $home_url.'css';
$js_dir = $home_url.'js';

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
				echo '	<script src="'.$home_url.'css/'.$file.'"></script>'."\n\r";
       } 
       }
       closedir($dh);
   }
}

}
else show_menu_css();
?>