<?php
if ($developer!=1){
echo<<<END
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

 <script> //stickyNAV
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
END;
}

$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM settings WHERE name='facebook_address'"));
mysqli_close($con);
	$row = mysqli_fetch_array($res);
	$facebook_show=$row['int_value'];
if ($facebook_show=='1') require_once 'facebook.php';

show_google_analytics();

?>