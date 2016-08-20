<!DOCTYPE HTML>
<?php require './core/doctype.php'; ?>

<head>
<?php require './core/head.php'; ?>
</head>

<body>

<div>
<header class="container-fluid" style="width:100%; float:left;" >
<?php require_once './core/header.php'; ?>
</header>

<div id="nav">
<input type="checkbox" id="btn-menu"><label for="btn-menu" >MENU: <span class="glyphicon glyphicon-menu-hamburger"></span></label>
<nav class="menu container-fluid">
	<?php require_once './core/nav.php'; ?>
</nav>
</div>

<section class="container-fluid" >
<?php require_once './core/page.php';?>
</section>

<footer class="container-fluid">
<?php require_once './core/footer.php'; ?>
</footer>

<?php require './core/body_end.php'; ?>
</body>
</html>