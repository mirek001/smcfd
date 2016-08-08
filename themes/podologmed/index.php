<?php
session_start();
require_once 'mysql_data.php';

if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$id = htmlentities($id, ENT_QUOTES, "UTF-8");
}
else $id=NULL;

?>
<!DOCTYPE HTML>
<html lang="pl_PL">
<head>
	<?php show_meta_title($id); ?>
	<?php show_meta_description($id); ?>
	<link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon" />
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="application-name" content="Site Map CMS">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/musli.css" rel="stylesheet">
	<script type="text/javascript" src="js/musli.js"></script>
<?php show_menu_css();?>
    <link rel="stylesheet" href="css/lightbox.css">

 	<script type="text/javascript" src="js/bootstrap.js"></script>
<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="css/froala_style.css">
  	<link rel="stylesheet" href="main.css">
  	<script src="js/lightbox.js"></script>
<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<?php require_once 'cookies.php';?>
<!-- End Cookie Consent plugin -->
    <link rel="stylesheet" href="css/fontello.css">
</head>

<body class="container" style="margin-left:auto; margin-right:auto;">
<?php show_google_analytics(); ?>

<?php 
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
	$res = $con->query($q=("SELECT * FROM settings WHERE name='site_type'"));
	$row = mysqli_fetch_array($res);
if ($row['int_value']=='1') {
	require_once './core/site_type_html5.php';
}
else if ($row['int_value']=='2'){
	require_once './core/site_type_ops.php';
}
?>



<?php ///////     BOOTSTRAP, jQUERY, MONENTJS     ///////////////////////////////////// ?>
 <script type="text/javascript" src="js/bootstrap.js"></script>

 <script src="js/lightbox.js"></script>
<?php ///////     BOOTSTRAP, jQUERY, MONENTJS, LIGHTBOX 2  ---  KONIEC    ///////////////////////////////////// ?>

 <script> // przyciąganie menu do góry
	$(document).ready(function() {
	var NavY = $('header').offset().top;	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();		  
	if (ScrollY > NavY) { 
		$('header').addClass('sticky');
	} else {
		$('header').removeClass('sticky'); 
	}
	};	 
	stickyNav();	 
	$(window).scroll(function() {
		stickyNav();
	});
	});	
</script>
<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script>
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
}); 
</script>

<?php 
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
	$res = $con->query($q=("SELECT * FROM settings WHERE name='facebook_address'"));
	$row = mysqli_fetch_array($res);
	$facebook_show=$row['int_value'];
if ($facebook_show=='1') require_once 'facebook.php';
?>

</body>
</html>

<?php

function show_menu_css(){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM css WHERE name='menu_css'"));
$row = mysqli_fetch_array($res);
echo "<style>";
echo $row['css'];
echo "</style>";
//echo '<link rel="stylesheet" href="menu.css">';

}

function show_google_analytics(){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='google_analytics'"));
$row = mysqli_fetch_array($res);
$active = $row['int_value'];
$code = $row['value'];

if ($active=="1"){
echo<<<END
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '$code', 'auto');
  ga('send', 'pageview');
</script>
END;
}
else echo "";
}

function show_meta_title($id){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
if (isset($id)) {
	$res = $con->query($q=("SELECT *  FROM site_map WHERE id=$id"));
	$row = mysqli_fetch_array($res);
	$title = $row['name'];
}
else {
	$res = $con->query($q=("SELECT *  FROM settings WHERE name='meta_title'"));
	$row = mysqli_fetch_array($res);
	$title = $row['value'];
	$title = html_entity_decode($title);
}
	echo "<title>$title</title>";
}

function show_meta_description($id){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);

	$res = $con->query($q=("SELECT *  FROM settings WHERE name='meta_description'"));
	$row = mysqli_fetch_array($res);
	$description = $row['value'];
	$description = html_entity_decode($description);

	echo '<meta name=”description” content=”'.$description.'” />';
}

?>