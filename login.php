<?php
session_start();
require_once 'functions.php';
require_once 'mysql_data.php';
require_once 'load_lang.php';

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta name="Robots" content="none, noarchive" />
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Site Map CMS Login System</title>
	<link href="css/bootstrap.css" rel="stylesheet">
</head>

<body style="">
<div style="margin-left:auto; margin-right:auto; width: 300px; margin-top:100px;">
<form class="form-horizontal" action="zaloguj.php" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
    <div class="col-sm-8">
      <input type="email" name="login" class="form-control" id="inputEmail3" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group">
    <?php echo '<label for="inputPassword3" class="col-sm-4 control-label">'.$_SESSION['lg_passwd'].'</label>'; ?>
    <div class="col-sm-8">
      <?php echo '<input type="password" name="haslo" class="form-control" id="inputPassword3" placeholder="'.$_SESSION['lg_passwd'].'" required>'; ?>
    </div>
  </div>
  <div class="form-group">
<?php
  if(isset($_SESSION['blad'])) {  
    echo $_SESSION['blad'];
    unset($_SESSION['blad']);
  }
?>
    <div class="col-sm-offset-4 col-sm-8">
<!--      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>   -->
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <?php echo '<button type="submit" class="btn btn-default">'.$_SESSION['lg_login'].'</button>';?>
    </div>
  </div>
</form>
</div>
	



</body>
</html>