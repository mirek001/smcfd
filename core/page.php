<div >

<?php
if (!isset($_GET['id'])) {
$id=0;
} else $id=$_GET['id'];

if ($CONFIG['page_type']=='classic'){
	page_classic($id);
}


?>