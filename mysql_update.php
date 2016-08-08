<?php
session_start();
require_once 'mysql_data.php';
require_once 'load_lang.php';
require_once 'functions.php';
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);

$con->query("ALTER TABLE `site_map` ADD `disabled` INT NOT NULL DEFAULT '0' AFTER `hidden`;");
$con->query("INSERT INTO `settings` (`id`, `name`, `value`, `int_value`, `value_2`, `int_value_2`, `value_3`, `int_value_3`, `created_time`) VALUES (NULL, 'website_address', 'http://www...', '0', '0', '0', '0', '0', '2016-07-19 17:04:55'), (NULL, 'facebook_address', 'https://facebook.com/DavidGuetta', '0', '0', '0', '0', '0', '2016-07-20 13:26:32'), (NULL, 'license_key', 'xxxxx-xxxxxxxxxx-xxxxx', '0', '0', '0', '0', '0', '2016-07-22 15:12:05')");

?>