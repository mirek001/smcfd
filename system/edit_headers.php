<?php
$name=$_GET['name'];
$name = htmlentities($name, ENT_QUOTES, "UTF-8");


$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE type='$name'"));
$row = mysqli_fetch_array($res);
      if ($row['type'] !== $name) {
            $con->query("INSERT INTO site_map (name, type, cat_id, section_type) VALUES ('$name', '$name', '0', '$name')");
            $res = $con->query("SELECT *  FROM site_map WHERE type='$name'");
            $row = mysqli_fetch_array($res);
      }
$page_name = $row['name'];
$id = $row['id'];
$page_content = $row['content'];
$section_color = $row['section_color'];


?>

<style>
.fr-box.fr-basic .fr-wrapper {
      background: <?php echo $section_color; ?>;
</style>

  <div id="editor">
<form action="system/core/headers_html_edit.php">
<div style="padding-bottom:50px;">
<div style="width:70%; float:left" class="form-group">
</div>

      <div style="width:30%; float:right" class="form-group">
          <?php echo '<label >'.$_SESSION['lg_section_color'].': <a href="https://color.adobe.com" target="_blank">'.$_SESSION['lg_select_color_from_adobe'].'</a></label>'?>
          <?php echo '<input type="input" name="section_color" class="form-control" placeholder="np.: #336699" value="'.$section_color.'">'; ?>
      </div>
</div>

 		<div class="form-group">
          <?php echo '<label >'.$_SESSION['lg_content'].': </label>';?>
      		<textarea id='edit' name="content" style="margin-top: 30px;">
        	         <?php echo $page_content; ?>
            </textarea>
      	</div>
      <div style="text-align:center;">
      <?php echo '<input type="hidden" name="id" value="'.$id.'">'; ?>
      <?php echo '<input type="hidden" name="name" value="'.$_SESSION['lg_type_page_name'].'">'; ?>
      <?php echo '<input class="btn btn-primary" type="submit" name="update" value="'.$_SESSION['lg_update'].'">';?>
      <?php echo '<input class="btn btn-primary" type="submit" name="save" value="'.$_SESSION['lg_save_and_quit'].'">';?>
      <?php echo '<a class="btn btn-default" href="system.php" role="button">'.$_SESSION['lg_cancel'].'</a>';?>
      </div>
    </form>
  </div>

<?php
?>

