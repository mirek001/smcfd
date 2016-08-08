<?php 
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM settings WHERE name='facebook_address'"));
mysqli_close($con);
	$row = mysqli_fetch_array($res);
	$facebook_address=$row['value'];

echo<<<END
<!-- Facebook Slider START -->
<div id="facebook_slider_widget" style="display: none"><script type="text/javascript" src="http://webfrik.pl/widget/facebook_slider.html?fb_url=$facebook_address&fb_width=290&fb_height=590&fb_faces=true&fb_stream=true&fb_header=true&fb_border=true&fb_theme=light&chx=787&speed=FAST&fb_pic=sign&position=LEFT"></script></div>
<!-- Facebook Slider END -->

END;
?>