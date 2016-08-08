<?php
session_start();
//require_once 'functions.php';
require_once 'mysql_data.php';
require_once 'load_lang.php';
require_once 'load_settings.php';

?>

<?php
require_once 'functions.php';

  if (!isset($_COOKIE['emgiee']))
  {
    header('Location: login.php');
    //exit();
  }
  else {
  $con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
  
  if ($con->connect_errno!=0)
  {
    echo "Error: ".$con->connect_errno;
  }
  else
  {
    $cookie = $_COOKIE['emgiee'];
    $res = @$con->query("SELECT * FROM users WHERE cookie= $cookie");
      $user = mysqli_fetch_array($res);
          $_SESSION['id']= $user['id'];    
  }
}
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta name="Robots" content="none, noarchive" />
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Site Map CMS</title>
	<link href="css/bootstrap.css" rel="stylesheet">
  	<link href="css/bootstrap-formhelpers.css" rel="stylesheet">
  	<link href="system/css/raw.css" rel="stylesheet" type="text/css">
  	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="css/lightbox.css">



 	<script type="text/javascript" src="js/bootstrap-formhelpers.js"></script>
 	<script type="text/javascript" src="js/jquery.js"></script>
 	<script type="text/javascript" src="js/moment.js"></script>
 	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>


  <script src="js/lightbox.js"></script>

<?php ///////     FROALA EDITOR ///////////////////////////////////// ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/froala_editor.css">
  <link rel="stylesheet" href="css/froala_style.css">
  <link rel="stylesheet" href="css/plugins/code_view.css">
  <link rel="stylesheet" href="css/plugins/colors.css">
  <link rel="stylesheet" href="css/plugins/emoticons.css">
  <link rel="stylesheet" href="css/plugins/image_manager.css">
  <link rel="stylesheet" href="css/plugins/image.css">
  <link rel="stylesheet" href="css/plugins/line_breaker.css">
  <link rel="stylesheet" href="css/plugins/table.css">
  <link rel="stylesheet" href="css/plugins/char_counter.css">
  <link rel="stylesheet" href="css/plugins/video.css">
  <link rel="stylesheet" href="css/plugins/fullscreen.css">
  <link rel="stylesheet" href="css/plugins/file.css">
  <link rel="stylesheet" href="css/plugins/quick_insert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  <style>
      body {
          text-align: center;
      }

      div#editor {
           width: 81%;
           margin: auto;
           text-align: left;
      }

      .ss {
        background-color: red;
      }
  </style>
<?php ///////     FROALA EDITOR  --- KONIEC    ///////////////////////////////////// ?>
</head>

<body>
<?php require_once 'system/navbar.php'; // nawigacja przyczepiona do TOP ?>

<?php 
      if (isset($_SESSION['note'])) {
      echo '<div class="alert alert-success" role="alert">';
      echo '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
      echo '<span class="sr-only">Error:</span>';
      echo " ".$_SESSION['note'];
      echo '</div>';
      unset($_SESSION['note']);
      }

?>


<?php require 'system/subpage.php'; // wczytywanie podstron ?>



<?php ///////     BOOTSTRAP, jQUERY, MONENTJS     ///////////////////////////////////// ?>
 <script type="text/javascript" src="js/bootstrap-formhelpers.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/moment.js"></script>
 <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<?php ///////     BOOTSTRAP, jQUERY, MONENTJS  ---  KONIEC    ///////////////////////////////////// ?>


<?php ///////     FROALA EDITOR      ///////////////////////////////////// ?>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src="js/froala_editor.min.js" ></script>
  <script type="text/javascript" src="js/plugins/align.min.js"></script>
  <script type="text/javascript" src="js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="js/plugins/file.min.js"></script>
  <script type="text/javascript" src="js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="js/plugins/image.min.js"></script>
  <script type="text/javascript" src="js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="js/plugins/link.min.js"></script>
  <script type="text/javascript" src="js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="js/plugins/table.min.js"></script>
  <script type="text/javascript" src="js/plugins/save.min.js"></script>
  <script type="text/javascript" src="js/plugins/url.min.js"></script>
  <script type="text/javascript" src="js/plugins/video.min.js"></script>
  <script src='js/languages/pl.js'></script>

  <script src="js/lightbox.js"></script>

  <script>
    $(function(){
      $('#edit').froalaEditor({
      key: 'yc1VYJZa1c2a1THYBUZY==',
      imageUploadURL: 'upload_image.php',
      imageResizeWithPercent: true,
      <?php echo 'language: \''.$_SESSION['lang']. '\',';?>
      })
    });
  </script>


<?php ///////     FROALA EDITOR  --- KONIEC    ///////////////////////////////////// ?>
</body>
</html>
