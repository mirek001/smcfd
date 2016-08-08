<?php
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE type='cookie_terms'"));
$row = mysqli_fetch_array($res);

$id = $row['id'];
$position = $row['int_value'];
$description = $row['description'];
$hidden = $row['hidden'];
?>
<?php  /// wybór wyglądu cookie


if ($position=='1' AND $hidden=='0') {
echo<<<END
<!-- Cookies Bar Code START -->
\t<script type="text/javascript">
\t\twindow.cookieconsent_options = {"message":"$description","dismiss":"OK!","learnMore":"read about cookies...","link":"index.php?page=cookie_terms","theme":"dark-top"};
\t</script>
\t<script type="text/javascript" src="js/cookieconsent.min.js"></script>
<!-- Cookies Bar Code END -->\n
END;
}
else if ($position=='2' AND $hidden=='0') {
echo<<<END
<!-- Cookies Bar Code START -->
\t<script type="text/javascript">
\t\twindow.cookieconsent_options = {"message":"$description","dismiss":"OK!","learnMore":"read about cookies...","link":"index.php?page=cookie_terms","theme":"dark-bottom"};
\t</script>
\t<script type="text/javascript" src="js/cookieconsent.min.js"></script>
<!-- Cookies Bar Code END -->\n
END;
}
else if ($position=='3' AND $hidden=='0') {
echo<<<END
<!-- Cookies Bar Code START -->
\t<script type="text/javascript">
\t\twindow.cookieconsent_options = {"message":"$description","dismiss":"OK!","learnMore":"read about cookies...","link":"index.php?page=cookie_terms","theme":"light-top"};
\t</script>
\t<script type="text/javascript" src="js/cookieconsent.min.js"></script>
<!-- Cookies Bar Code END -->\n
END;
}
else if ($position=='4' AND $hidden=='0') {
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

?>