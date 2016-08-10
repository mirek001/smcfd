<?php
$id=$_GET['id'];
$id = htmlentities($id, ENT_QUOTES, "UTF-8");


$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE id=$id"));
$row = mysqli_fetch_array($res);
$page_name = $row['name'];
$page_desc = $row['meta_desc'];
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
 		<div class="form-group" style="max-height:500px;">

          <?php echo '<label >'.$_SESSION['lg_content'].': </label>';?>

          <textarea NAME="content" class="form-control" style="font-size:20px; height: 500px;" name="data-editor" data-editor="php"  COLS=100 ><?php echo $page_content;?></textarea>

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


<script src="http://ajaxorg.github.io/ace-builds/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<!-- <script src="http://ajaxorg.github.io/ace-builds/src-min-noconflict/keybinding-vim.js"></script> -->

<script>

    // Hook up ACE editor to all textareas with data-editor attribute
    $(function () {

        $('textarea[data-editor]').each(function () {
            var textarea = $(this);

            var mode = textarea.data('editor');

            var editDiv = $('<div>', {
                position: 'absolute',
                width: textarea.width(),
                height: textarea.height(),
                'class': textarea.attr('class')
            }).insertBefore(textarea);

            textarea.css('visibility', 'hidden');

            var editor = ace.edit(editDiv[0]);
            editor.renderer.setShowGutter(false);
            editor.getSession().setValue(textarea.val());
            editor.getSession().setMode("ace/mode/" + mode);
            //editor.setKeyboardHandler("ace/keyboard/vim");
            //editor.setTheme("ace/theme/idle_fingers");
            editor.setTheme("ace/theme/terminal");
            //editor.setTheme("ace/theme/xcode");
            editor.getSession().setUseWrapMode(true);
            editor.resize();
            
            // copy back to textarea on form submit...
            textarea.closest('form').submit(function () {
                textarea.val(editor.getSession().getValue());
            })


        });
    });
</script>