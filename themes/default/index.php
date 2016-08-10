<?php
session_start();
require_once './mysql_data.php';
require_once './core/functions.php';

if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$id = htmlentities($id, ENT_QUOTES, "UTF-8");
}
else $id=NULL;

?>
<!DOCTYPE HTML>
<?php require './core/doctype.php'; //############################################# LANG>PHP?>

<head>
<?php require './core/head.php'; //############################################# HEAD>PHP?>   
</head>
<body>
<header>
	<?php require_once './core/header.php'; ?>
<nav>
	<?php require_once './core/nav.php'; ?>
</nav>
</header>
<section>
<?php require_once './core/page.php';?>
</section>
<footer>
<?php require_once './core/footer.php'; ?>
</footer>
<?php require './core/body_end.php'; //############################################# BODY>PHP?>
</body>
</html>