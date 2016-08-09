<?php
$lang_cancel=$_SESSION['lg_cancel'];
$lang_users=$_SESSION['lg_users'];
$lang_change_passwd=$_SESSION['lg_change_passwd'];
$lang_old_passwd=$_SESSION['lg_old_password'];
$lang_new_password=$_SESSION['lg_new_password'];
$lang_update=$_SESSION['lg_update'];
$lang_new_user=$_SESSION['lg_new_user'];
$lang_save=$_SESSION['lg_save'];
$lang_confirm_delete_user=$_SESSION['lg_confirm_delete_user'];

echo<<<END
<div class="container" style="width:500px">
  <h2>$lang_users</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
END;
show_users();
echo<<<END
    </tbody>
  </table>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newuser">$lang_new_user</button>
</div>
<!-- Modal -->
<div class="modal fade" id="newuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">$lang_new_user</h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal" action="system/core/add_new_user.php" method="POST">
  <div class="form-group">
    <label for="" class="col-sm-4 control-label"></label>
  </div>
  <div class="form-group">
   <label for="email" class="col-sm-4 control-label">Email:</label>
    <div class="col-sm-8">
		<input type="text" class="form-control" name="email" id="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="new_passwd" class="col-sm-4 control-label">$lang_new_password:</label>
    <div class="col-sm-8">
     <input type="password" class="form-control" name="new_passwd" id="new_passwd" placeholder="$lang_new_password">
    </div>
  </div>
  <div class="form-group">
		<label for="passwd_confirm" class="col-sm-4 control-label">$lang_new_password:</label>
    <div class="col-sm-8">
		<input type="password" class="form-control" name="passwd_confirm" id="passwd_confirm" placeholder="$lang_new_password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-primary">$lang_save</button>
    </div>
  </div>
</form>
      </div>

    </div>
  </div>
</div>
END;
show_modals();


////////////////////////////////////////////////////
?>
<script>
  var password = document.getElementById("new_passwd")
  , confirm_password = document.getElementById("passwd_confirm");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

<?php ///funkcje
function show_users() {
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM users "));


while ($row = mysqli_fetch_array($res)) {
	$name=$row['user'];
	$admin=$row['admin'];
	$user_id=$row['id'];

echo "<tr><td>$name</td><td><button type=\"button\" class=\"btn btn-primary btn-xs\" data-toggle=\"modal\" data-target=\"#password-$user_id\">Change Password</button> <button type=\"button\" class=\"btn btn-danger btn-xs\" data-toggle=\"modal\" data-target=\"#remove-$user_id\">Remove user</button></td><tr>";


}
}
function show_modals() {
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM users "));
$lang_cancel=$_SESSION['lg_cancel'];
$lang_users=$_SESSION['lg_users'];
$lang_change_passwd=$_SESSION['lg_change_passwd'];
$lang_old_passwd=$_SESSION['lg_old_password'];
$lang_new_password=$_SESSION['lg_new_password'];
$lang_update=$_SESSION['lg_update'];
$lang_new_user=$_SESSION['lg_new_user'];
$lang_save=$_SESSION['lg_save'];
$lang_confirm_delete_user=$_SESSION['lg_confirm_delete_user'];
$lang_confirm=$_SESSION['lg_confirm'];

while ($row = mysqli_fetch_array($res)) {
	$name=$row['user'];
	$admin=$row['admin'];
	$user_id=$row['id'];

//Change password
echo<<<END
<!-- Modal -->
<div class="modal fade" id="password-$user_id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">$lang_change_passwd</h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal" action="system/core/change_passwd.php" method="POST">
  <div class="form-group">
    <label for="" class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
		<h4>$name</h4>
    </div>
  </div>
  <div class="form-group">
   <label for="old_passwd" class="col-sm-4 control-label">$lang_old_passwd:</label>
    <div class="col-sm-8">
		<input type="password" class="form-control" name="old_passwd" id="old_passwd" placeholder="$lang_old_passwd">
    </div>
  </div>
  <div class="form-group">
    <label for="new_passwd" class="col-sm-4 control-label">$lang_new_password:</label>
    <div class="col-sm-8">
     <input type="password" class="form-control" name="new_passwd" id="new_passwd" placeholder="$lang_new_password">
    </div>
  </div>
  <div class="form-group">
		<label for="passwd_confirm" class="col-sm-4 control-label">$lang_new_password:</label>
    <div class="col-sm-8">
		<input type="password" class="form-control" name="passwd_confirm" id="passwd_confirm" placeholder="$lang_new_password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-primary">$lang_update</button>
    </div>
  </div>
</form>
      </div>

    </div>
  </div>
</div>
END;

//Remove user
echo<<<END
<!-- Modal -->
<div class="modal fade" id="remove-$user_id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">$lang_confirm_delete_user</h4>
      </div>
      <div class="modal-body">
        $name
      </div>
      <input type="hidden" name="id" value="$user_id">
      <div class="modal-footer">
			<a class="btn btn-danger" href="./system/core/remove_user.php?id=$user_id" role="button">$lang_confirm</a>
      </div>
    </div>
  </div>
</div>
END;

}}
?>




