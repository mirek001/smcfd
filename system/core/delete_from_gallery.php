<?php
session_start();
if (!isset($_SESSION['id'])) exit();
$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
$plik=$_GET['plik'];
$plik = htmlentities($plik, ENT_QUOTES, "UTF-8");


unlink("../../upload/$id/$plik");
unlink("../../upload/$id/thumb/$plik");

header("Location: ../../system.php?page=gallery&id=$id");
?>