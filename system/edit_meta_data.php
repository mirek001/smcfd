<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE id=$id"));
$row = mysqli_fetch_array($res);
$page_name = $row['name'];
$page_desc = $row['meta_desc'];
$page_keywords = $row['meta_keywords'];
?>

<form action="./system/core/change_meta_data.php">
<div class="container" style="width:800px">

<div class="form-group">
    <?php echo '<label >'.$_SESSION['lg_page_name'].': </label>';?>
 	<?php echo '<input type="text" class="form-control"  name="name" placeholder="'.$_SESSION['lg_page_name'].'" value="'.$page_name.'">'; ?>
</div>

<div class="form-group">
    <?php echo '<label >'.$_SESSION['lg_description'].': </label>';?>
 	<?php echo '<textarea class="form-control" name="desc" rows="3" placeholder="'.$_SESSION['lg_description'].'" >'.$page_desc.'</textarea>'; ?>
</div>

<div class="form-group">
    <?php echo '<label >'.$_SESSION['meta_keywords'].': </label>';?>
 	<?php echo '<textarea class="form-control" name="keywords" rows="3" placeholder="'.$_SESSION['meta_keywords'].'" >'.$page_keywords.'</textarea>'; ?>
</div>

    <div style="text-align:center;">
      <?php echo '<input type="hidden" name="id" value="'.$id.'">'; ?>
      <?php echo '<input class="btn btn-primary" type="submit" name="update" value="'.$_SESSION['lg_update'].'">';?>
      <?php echo '<input class="btn btn-primary" type="submit" name="save" value="'.$_SESSION['lg_save_and_quit'].'">';?>
      <?php echo '<a class="btn btn-default" href="system.php" role="button">'.$_SESSION['lg_cancel'].'</a>';?>
    </div>
</form>
  </div>
  <br><br><br>

<?php

?>

