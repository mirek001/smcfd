<div class="emgiee-center-block">


<?php

if (isset($_GET['edit'])) {
      $edit=$_GET['edit'];
      $edit = htmlentities($edit, ENT_QUOTES, "UTF-8");
}
else $edit=0;

require 'sort_all.php';



$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE type='category' AND cat_id=0 ORDER BY position"));   
    while ($row = mysqli_fetch_array($res)) {
      $name = $row['name'];
      $id = $row['id'];
      $type = $row['type'];

      echo "<div class=\"tabela\">";
      echo "<div class=\"left10\">".dropdown_action_header_footer("header")."</div>";
      echo "<div style=\"text-align:left;\" class=\"right90\">".$_SESSION['lg_header']." ".enable_headers("header")."</div>";
      echo "</div><br><br>";
      echo "<div class=\"tabela\">";
      echo "<div class=\"left10\">".dropdown_action_global($id, $name)."</div>";
      echo "<div style=\"text-align:left;\" class=\"right90\"> ".show_or_edit($id, $name, $edit)." (".show_site_type().")</div>";
      echo "<div class=\"left10\"></div>";
      echo "<div class=\"right90\">".show_category($id, $type, $edit)."</div>";
      echo "</div><br><br>";
      echo "<div class=\"tabela\" style=\"padding:5px;\">";
      echo "<div class=\"left10\">".dropdown_action_header_footer("footer")."</div>";
      echo "<div style=\"text-align:left;\" class=\"right90\">".$_SESSION['lg_footer']." ".enable_headers("footer")."<br><br><br><br><br><br><br></div>";
      echo "</div><br><br>";


}


function read_type($id) {
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE cat_id=$id")); 
$row = mysqli_fetch_array($res);
$type = row['type'];
return $type;
}

function show_category($id, $type, $edit) {
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE cat_id=$id ORDER BY position")); 
      if ($type=="category") {
            while ($row = mysqli_fetch_array($res)) {
                  $name = $row['name'];
                  $id = $row['id'];
                  $type = $row['type'];
                  echo "<a id=\"section-$id\"></a>";
                  echo "<div class=\"right90\">";
                  echo "<div class=\"left10\">".dropdown_action($id)."</div>";
                  echo "<div style=\"text-align:left;\" class=\"right90\"> ".show_or_edit($id, $name, $edit)."</div>";
                  echo "<div class=\"left10\"></div>";
                  echo "<div class=\"right90\">".show_category($id, $type, $edit)."</div>";
                  echo "</div>";
            }
      }
      else if ($type=="page") {
            while ($row = mysqli_fetch_array($res)) {
                  $name = $row['name'];
                  $id = $row['id'];
                  $type = $row['type'];
                  echo "<a id=\"section-$id\"></a>";
                  echo "<div class=\"right90\">";
                  echo "<div class=\"left10\">".dropdown_action($id)."</div>";
                  echo "<div style=\"text-align:left;\" class=\"right90\"> ".show_or_edit($id, $name, $edit)."</div>";
                  echo "<div class=\"left10\"></div>";
                  echo "<div class=\"right90\">".show_category($id, $type, $edit)."</div>";
                  echo "</div>";
            }
      }
            else if ($type=="section") {
            while ($row = mysqli_fetch_array($res)) {
                  $name = $row['name'];
                  $id = $row['id'];
                  $type = $row['type'];
                 
                  echo "<a id=\"section-$id\"></a>";
                  echo "<div class=\"right90\">";
                  echo "<div class=\"left10\">".dropdown_action($id)."</div>";
                  echo "<div style=\"text-align:left;\" class=\"right90\"> ".show_or_edit($id, $name, $edit)."</div>";
                  echo "<div class=\"left10\"></div>";
                  echo "<div class=\"right90\">".show_category($id, $type, $edit)."</div>";
                  echo "</div>";
            }
      }

}



function show_or_edit($id, $name, $edit){
  $lang_edit=$_SESSION['lg_edit'];

      if ($id==$edit){
      echo "<div style=\"float:left;\">";
      echo '<form action="system/core/site_map_edit_name.php">';
      echo '<input type="text" name="name"  placeholder="'.$name.'" value="'.$name.'" >';
      echo '<input type="hidden" name="id" value="'.$id.'">';
      echo '<button type="submit">'.$_SESSION['lg_save'].'</button>';
      echo "</div>";
      }
      else return $name;
}


function dropdown_action($id) {
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE id=$id")); 
$row = mysqli_fetch_array($res);
      $name = $row['name'];
      $id = $row['id'];
      $type = $row['type'];
      $section_type = $row['section_type'];
      $section_color= $row['section_color'];
            if($type=="category"){
                  return dropdown_action_category($id, $name);
            }
            else if($type=="page"){
                  return dropdown_action_page($id, $name);
            }
            else if($type=="section"){
                  return dropdown_action_section($id, $name, $section_type);
            }

}

function dropdown_action_section($id, $name, $section_type){

if ($section_type == "html") {
      $section_type="glyphicon glyphicon-text-size";
      $edit_link="system.php?page=edit&id=$id";
}
if ($section_type == "gallery") {
      $section_type="glyphicon glyphicon-camera";
      $edit_link="system.php?page=gallery&id=$id";
}
if ($section_type == "code") {
      $section_type="glyphicon glyphicon-console";
      $edit_link="system.php?page=code&id=$id";
}

$lang_edit=$_SESSION['lg_edit'];
$lang_rename=$_SESSION['lg_rename'];
$lang_move_up=$_SESSION['lg_move_up'];
$lang_move_down=$_SESSION['lg_move_down'];
$lang_delete=$_SESSION['lg_delete'];
$lang_confirm=$_SESSION['lg_confirm'];
$remove_section=$_SESSION['lg_remove_section'];


return<<<END
<div class="dropdown">
  <button id="dLabel-$id" type="button" data-toggle="dropdown" class="btn btn-default" aria-haspopup="true" aria-expanded="false"><span class="$section_type" aria-hidden="true">
  </button>
  <ul class="dropdown-menu" aria-labelledby="dLabel-$id">
        <li><a href="$edit_link">$lang_edit</a></li>
        <li><a href="system.php?edit=$id#section-$id">$lang_rename</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="system/core/move_up_down.php?id=$id&action=move_up">$lang_move_up</a></li>
        <li><a href="system/core/move_up_down.php?id=$id&action=move_down">$lang_move_down</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#" data-toggle="modal" data-target="#remove-$id">$lang_delete</a></li>
  </ul>
</div>

<!-- Modal REMOVE -->
<div class="modal fade" id="remove-$id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">$lang_confirm</h4>
      </div>
      <div class="modal-body">
        $remove_section: "$name"?
      </div>
      <div class="modal-footer">
        <a role="button" href="system/core/remove.php?id=$id" class="btn btn-danger">$lang_delete</a>
      </div>
    </div>
  </div>
</div>
END;

}

function dropdown_action_page($id, $name){
$lang_rename=$_SESSION['lg_rename'];
$lang_move_up=$_SESSION['lg_move_up'];
$lang_move_down=$_SESSION['lg_move_down'];
$lang_delete=$_SESSION['lg_delete'];
$lang_add_section_html=$_SESSION['lg_add_section_html'];
$lang_add_section_gallery=$_SESSION['lg_add_section_gallery'];
$lang_add_section=$_SESSION['lg_add_section'];
$confirm=$_SESSION['lg_confirm'];
$remove_page=$_SESSION['lg_remove_page'];
$lang_hide=$_SESSION['lg_hide'];
$lang_show_url=$_SESSION['lg_show_url'];
$lang_page_url=$_SESSION['lg_page_url'];
$hide_unhide=unhide_page($id);
$lang_add_section_code=$_SESSION['lg_add_section_code'];
$website_address=$_SESSION['website_address'];

return<<<END
<div class="dropdown">
  <button id="dLabel-$id" type="button" data-toggle="dropdown" class="btn btn-default" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt" aria-hidden="true">
  </button>
<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
            <li class="dropdown-submenu">
            <a tabindex="-1" href="#">$lang_add_section</a>
                  <ul class="dropdown-menu">
                  <li><a href="system/core/add_new.php?action=new_section_html&id=$id">$lang_add_section_html</a></li>
                  <li><a href="system/core/add_new.php?action=new_section_gallery&id=$id">$lang_add_section_gallery</a></li>
                  <li><a href="system/core/add_new.php?action=new_section_code&id=$id">$lang_add_section_code</a></li>
                  </ul>
            </li>
      <li><a href="system.php?edit=$id#section-$id">$lang_rename</a></li>
      <li><a href="#" data-toggle="modal" data-target="#url-$id">$lang_show_url</a></li>
      <li role="separator" class="divider"></li>
      <li><a href="system/core/move_up_down.php?id=$id&action=move_up">$lang_move_up</a></li>
      <li><a href="system/core/move_up_down.php?id=$id&action=move_down">$lang_move_down</a></li>
      <li role="separator" class="divider"></li>
      <li>$hide_unhide</li>
      <li><a href="#" data-toggle="modal" data-target="#remove-$id">$lang_delete</a></li>
</ul>
</div>
<!-- Modal REMOVE -->
<div class="modal fade" id="remove-$id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">$confirm</h4>
      </div>
      <div class="modal-body">
        $remove_page: "$name"?
      </div>
      <div class="modal-footer">
        <a role="button" href="system/core/remove.php?id=$id" class="btn btn-danger">$lang_delete</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal REMOVE END-->
<!-- Modal URL -->
<div class="modal fade" id="url-$id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">$lang_page_url:</h4>
      </div>
      <div class="modal-body">
        $website_address/index.php?id=$id
      </div>
    </div>
  </div>
</div>
<!-- Modal URL END-->
END;

}


function dropdown_action_global($id, $name){
$lang_rename=$_SESSION['lg_rename'];
$lang_move_up=$_SESSION['lg_move_up'];
$lang_move_down=$_SESSION['lg_move_down'];
$lang_delete=$_SESSION['lg_delete'];
$add_page=$_SESSION['lg_add_page'];
$add_subcategory=$_SESSION['lg_add_subcategory'];
$site_type=$_SESSION['lg_site_type'];
$confirm=$_SESSION['lg_confirm'];
$remove_category=$_SESSION['lg_remove_category'];

return<<<END
<div class="dropdown">
  <button id="dLabel-$id" type="button" data-toggle="dropdown" class="btn btn-default" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-globe" aria-hidden="true">
  </button>
  <ul class="dropdown-menu" aria-labelledby="dLabel-$id">
            <li><a href="system/core/add_new.php?action=new_category&id=$id">$add_subcategory</a></li>
        <li><a href="system/core/add_new.php?action=new_page&id=$id">$add_page</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="system.php?edit=$id#section-$id">$lang_rename</a></li>
        <li class="divider"></li>
            <li class="dropdown-submenu">
            <a href="#">$site_type</a>
            <ul class="dropdown-menu">
            <li><a href="system/core/change_site_type.php?type=1">HTML 5 - Classic Site (Top Nav)</a></li>
            <li><a href="system/core/change_site_type.php?type=2">HTML 5 - One Page Site</a></li>
            </ul>
            </li>
        <li role="separator" class="divider"></li>
        <li><a href="system/core/move_up_down.php?id=$id&action=move_up">$lang_move_up</a></li>
        <li><a href="system/core/move_up_down.php?id=$id&action=move_down">$lang_move_down</a></li>
  </ul>
</div>

END;
}


function dropdown_action_category($id, $name){
$lang_rename=$_SESSION['lg_rename'];
$lang_move_up=$_SESSION['lg_move_up'];
$lang_move_down=$_SESSION['lg_move_down'];
$lang_delete=$_SESSION['lg_delete'];
$add_page=$_SESSION['lg_add_page'];
$add_subcategory=$_SESSION['lg_add_subcategory'];
$site_type=$_SESSION['lg_site_type'];
$confirm=$_SESSION['lg_confirm'];
$remove_category=$_SESSION['lg_remove_category'];


return<<<END
<div class="dropdown">
  <button id="dLabel-$id" type="button" data-toggle="dropdown" class="btn btn-default" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-folder-open" aria-hidden="true">
  </button>
  <ul class="dropdown-menu" aria-labelledby="dLabel-$id">
        <li><a href="system/core/add_new.php?action=new_category&id=$id">$add_subcategory</a></li>
        <li><a href="system/core/add_new.php?action=new_page&id=$id">$add_page</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="system.php?edit=$id#section-$id">$lang_rename</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="system/core/move_up_down.php?id=$id&action=move_up">$lang_move_up</a></li>
        <li><a href="system/core/move_up_down.php?id=$id&action=move_down">$lang_move_down</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#" data-toggle="modal" data-target="#remove-$id">$lang_delete</a></li>
  </ul>
</div>

<!-- Modal REMOVE -->
<div class="modal fade" id="remove-$id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">$confirm</h4>
      </div>
      <div class="modal-body">
        $remove_category: "$name"?
      </div>
      <div class="modal-footer">
        <a role="button" href="system/core/remove.php?id=$id" class="btn btn-danger">$lang_delete</a>
      </div>
    </div>
  </div>
</div>
END;

}


function dropdown_action_header_footer($name){   //<<< rozwijane menu headera
$lang_edit=$_SESSION['lg_edit'];
$lang_disable=$_SESSION['lg_disable'];

return<<<END
<div class="dropdown">
  <button id="dLabel-$name" type="button" data-toggle="dropdown" class="btn btn-default" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-globe" aria-hidden="true">
  </button>
  <ul class="dropdown-menu" aria-labelledby="dLabel-$name">
        <li><a href="system.php?page=edit_headers&name=$name">$lang_edit</a></li>
        <li><a href="system/core/enable_disable_header.php?disabled=1&type=$name">$lang_disable</a></li>
  </ul>
</div>
END;
}


function enable_headers($name){   // <<<<<<<<<<<<<<<<jeżeli header albo footer wyłączony pojawia się zielony przycisk włącz
$lang_enable=$_SESSION['lg_enable'];
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE type='$name'"));
$row = mysqli_fetch_array($res);
$disabled = $row['disabled'];

if ($disabled==1) {
      return "<a class=\"btn btn-success btn-xs\" href=\"system/core/enable_disable_header.php?disabled=0&type=$name\" role=\"button\">$lang_enable</a>";
}
else return '';
}

function unhide_page($id){   // <<<<<<<<<<<<<<<<jeżeli header albo footer wyłączony pojawia się zielony przycisk włącz
$lang_enable=$_SESSION['lg_show'];
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE id='$id'"));
$row = mysqli_fetch_array($res);
$hidden = $row['hidden'];

if ($hidden==1) {
      return '<a href="system/core/hide_unhide_page.php?hidden=0&id='.$id.'">'.$_SESSION['lg_show'].'</a>';;
}
else return '<a href="system/core/hide_unhide_page.php?hidden=1&id='.$id.'">'.$_SESSION['lg_hide'].'</a>';
}


function show_site_type(){
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM settings WHERE name='site_type'"));
$row = mysqli_fetch_array($res);
$type = $row['int_value'];

if ($type=="1") return "<span style=\" color:#449D44;\" >HTML 5 - Classic Site (Top Nav)</span>";
if ($type=="2") return "<span style=\" color:#449D44;\" >HTML 5 - One Page Site</span>";
}

?>
</div>