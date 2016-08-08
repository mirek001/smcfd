<?php
$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");


$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE id=$id"));
$row = mysqli_fetch_array($res);
$page_name = $row['name'];
$page_desc = $row['description'];
$page_content = $row['content'];
$section_color = $row['section_color'];
?>

  <div id="editor">
    <form action="system/core/section_code_edit.php">
    	<div style="overflow: auto;">
    		<div style="width:30%; float:left" class="form-group">
    			<?php echo '<label >'.$_SESSION['lg_type_page_name'].': </label>';?>
    			<?php echo '<input type="input" name="name" class="form-control" placeholder="'.$_SESSION['lg_type_page_name'].'" value="'.$page_name.'">'; ?>
 			</div>
 			<div style="width:40%; float:left" class="form-group">

 			</div>
            <div style="width:30%; float:left" class="form-group">
          <?php echo '<label >'.$_SESSION['lg_section_color'].': <a href="https://color.adobe.com" target="_blank">'.$_SESSION['lg_select_color_from_adobe'].'</a></label>'?>
          <?php echo '<input type="input" name="section_color" class="form-control" placeholder="np.: #336699" value="'.$section_color.'">'; ?>
      </div>
 		</div>
 		<div class="form-group">
          <?php //echo '<label >'.lang('type_page_desc').': </label>';?>
 		<?php //echo '<textarea class="form-control" name="desc" rows="3" placeholder="'.lang('desc_for_robots').'" >'.$page_desc.'</textarea>'; ?>
 		</div>
 		<div class="form-group">

          <?php echo '<label >'.$_SESSION['lg_content'].': </label>';?>
      		<textarea class="form-control" name="content" rows="23"><?php echo $page_content;?></textarea>
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

