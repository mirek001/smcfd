<?php
$dane = "\n\n\n\tWelcome in Site Map CMS file editor.\n\n\tChoose file from tree to edit. \n\n You have to be careful. Only files in the folder \"developer\", are not updated. \nIf you need to change a function, copy it to the directory of your project,\nit will be loaded instead of the original. You can copy all the files from the \"core\" \nto your directory of your project, you will have a guarantee that there will never \nbe changed, but it will never be updated.";
$note = "Choose file from tree";
if (isset($_GET['file'])){
$file = $_GET['file'];
$action = $_GET['action'];
ob_start();
header('Content-type: text/plain');
echo file_get_contents("$file");
$dane = ob_get_contents();
ob_end_clean();
header('Content-type: text/html');
if ($action==1){
    $note="Opened file $file";
} else if ($action==2) {
    $note="Changes saved in file $file";
} else if ($action==3) {
    $note="File was reloaded without changes $file";
}
}
?>

<?php
$plik = "$file";
$info = pathinfo($plik);
$extension = $info['extension'];
if ($extension=='php'){
    $file_type="php";
} else if ($extension=='js'){
    $file_type="javascript";
} else if ($extension=='html'){
    $file_type="html";
} else if ($extension=='css'){
    $file_type="css";
} else if ($extension=='sql'){
    $file_type="sql";
} else $file_type="html";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <script src="//code.jquery.com/jquery-git.js"></script>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Editor</title>
  <link href="../css/bootstrap.css" rel="stylesheet">

  <style type="text/css" media="screen">
    body {
        overflow: hidden;
    }

    #editor {
        margin: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        min-width:100%;
        height:100%;
    }
  </style>
</head>
<body style="background-color:black;">
<form action="save_file.php" method="POST">
<div class="container-fluid" style="height:50px; min-width: 100%; background-color:black; vertical-align: middle; float:left; padding-top:10px;">
    <div style="height:100%; width:100%; float: left; ">
        <div style="height:100%; width:70%; float:left; color:white; font-size: 16px; padding-top: 5px;">
            <?php 
                if (isset($note)) {
                    echo $note;
                    unset($note);
                    }
            ?>
        </div>
        <div style="height:100%; width:30%; float: left;">
            <input class="btn btn-primary" type="submit" value="Save">
            <?php echo '<a class="btn btn-default" href="edit.php?file='.$file.'&action=3" role="button">Cancel</a>';?>
            <?php echo '<a class="btn btn-primary" href="'.$file.'" target="_blank" role="button">Open file in new window</a>';?>
        </div>
    </div>
</div>
<div class="container-fluid" style="height:90% ; min-width: 100%; float:left; display:block;">
<?php echo '<textarea style="width:auto; height:90% ;" id="editor" class="form-control" NAME="content" name="data-editor" data-editor="'.$file_type.'"  COLS=40 ROWS=6>'.$dane.'</textarea>';?>
</div>
<?php echo '<input type="hidden" name="file" value="'.$file.'">';?>
</form>
<div class="container-fluid" style="min-height:50px; min-width: 100%; background-color:#black; color:white;float:left; display:block;">
<center>Site Map CMS Editor v. 1.1.0 - powered by ACE Editor</center>
</div>
<script type="../text/javascript" src="js/bootstrap.js"></script>
</body>

<script src="http://ajaxorg.github.io/ace-builds/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="http://ajaxorg.github.io/ace-builds/src-min-noconflict/keybinding-vim.js"></script>

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
            editor.setTheme("ace/theme/xcode");
            editor.resize();
            editor.getSession().setUseWrapMode(true);
            //editor.setTheme("ace/theme/twilight");
            
            // copy back to textarea on form submit...
            textarea.closest('form').submit(function () {
                textarea.val(editor.getSession().getValue());
            })

        });
    });
</script>
<?php echo $file; ?>
  
  
  