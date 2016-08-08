<?php
session_start();
if (!isset($_SESSION['id'])) exit();

require_once '../../mysql_data.php';



$action=$_GET['action'];
$id=$_GET['id'];


$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query("SELECT * FROM site_map  WHERE id=$id");
	$row = mysqli_fetch_array($res);
	//$cat_id = $row['cat_id'];


if ($action=="new_section_html"){
	$page="page";
	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	$con->query($q=("INSERT INTO site_map (id, name, cat_id, position, type, section_type, hidden, create_time) VALUES (NULL, 'WYSIWYG Section', '$id', 9999, 'section', 'html', 0, NULL)"));


	//echo $q;
	header("Location: ../../system.php#section-$id");
}

if ($action=="new_section_gallery"){
	$page="page";
	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	$con->query($q=("INSERT INTO site_map (id, name, cat_id, position, type, section_type, hidden, create_time) VALUES (NULL, 'Gallery Section', '$id', 9999, 'section', 'gallery', 0, NULL)"));


	//echo $q;
	header("Location: ../../system.php#section-$id");
}

if ($action=="new_section_code"){
	$page="page";
	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	$con->query($q=("INSERT INTO site_map (id, name, cat_id, position, type, section_type, hidden, create_time) VALUES (NULL, 'Code Section', '$id', 9999, 'section', 'code', 0, NULL)"));


	//echo $q;
	header("Location: ../../system.php#section-$id");
}

if ($action=="new_page"){
	$page="page";
	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	$con->query($q=("INSERT INTO site_map (id, name, cat_id, position, type, hidden, create_time) VALUES (NULL, 'New Page', '$id', 9999,  'page', 0, NULL)"));


	//echo $q;
	header("Location: ../../system.php#section-$id");
}
if ($action=="new_category"){
	$page="page";
	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	$con->query($q=("INSERT INTO site_map (id, name, cat_id, position, type, hidden, create_time) VALUES (NULL, 'New Category', '$id', 9999,  'category', 0, NULL)"));


	//echo $q;
	header("Location: ../../system.php#section-$id");
}
?>
