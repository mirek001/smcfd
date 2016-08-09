<?php
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='show_cookies_bar'"));
$row = mysqli_fetch_array($res);
$show = $row['int_value'];

if ($show==1){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='cookies_bar_pos'"));
$row = mysqli_fetch_array($res);
$position = $row['int_value'];

$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE type='cookie_terms'"));
$row = mysqli_fetch_array($res);

$id = $row['id'];
$description = $row['description'];


if ($position=='1') {
echo<<<END
<!-- Cookies Bar Code START -->
\t<script type="text/javascript">
\t\twindow.cookieconsent_options = {"message":"$description","dismiss":"OK!","learnMore":"read about cookies...","link":"index.php?page=cookie_terms","theme":"dark-top"};
\t</script>
\t<script type="text/javascript" src="js/cookieconsent.min.js"></script>
<!-- Cookies Bar Code END -->\n
END;
}
else if ($position=='2') {
echo<<<END
<!-- Cookies Bar Code START -->
\t<script type="text/javascript">
\t\twindow.cookieconsent_options = {"message":"$description","dismiss":"OK!","learnMore":"read about cookies...","link":"index.php?page=cookie_terms","theme":"dark-bottom"};
\t</script>
\t<script type="text/javascript" src="js/cookieconsent.min.js"></script>
<!-- Cookies Bar Code END -->\n
END;
}
else if ($position=='3') {
echo<<<END
<!-- Cookies Bar Code START -->
\t<script type="text/javascript">
\t\twindow.cookieconsent_options = {"message":"$description","dismiss":"OK!","learnMore":"read about cookies...","link":"index.php?page=cookie_terms","theme":"light-top"};
\t</script>
\t<script type="text/javascript" src="js/cookieconsent.min.js"></script>
<!-- Cookies Bar Code END -->\n
END;
}
else if ($position=='4') {
echo<<<END
<!-- Cookies Bar Code START -->
\t<script type="text/javascript">
\t\twindow.cookieconsent_options = {"message":"$description","dismiss":"OK!","learnMore":"read about cookies...","link":"index.php?page=cookie_terms","theme":"light-bottom"};
\t</script>
\t<script type="text/javascript" src="js/cookieconsent.min.js"></script>
<!-- Cookies Bar Code END -->\n
END;
}
else echo "";
}
?>