<?php
//header('Content-type: text/plain');
header('Content-type: application/x-httpd-php-source');
echo file_get_contents("../index.php");
?>