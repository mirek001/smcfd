<?php

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE cat_id=1  ORDER BY position")); 
mysqli_close($con);
echo '<header style="width:100%; float:left; class="sticky">';
echo '<input type="checkbox" id="btn-menu">';
echo '<label for="btn-menu" >MENU: <span class="glyphicon glyphicon-menu-hamburger"></span></label>';
echo '<nav class="menu">';        
echo '<ul>';
    while ($row = mysqli_fetch_array($res)) {
        if ($row['type']=="category"){
            $name=$row['name'];
            $id=$row['id'];
            echo "<li class=\"submenu\"><a href=\"#section-$id\">$name</a>";
            show_menu($id);
            echo "</li>\n";
        }
            else if ($row['type']=="page"){
            $name=$row['name'];
            $id=$row['id'];
            echo "<li><a href=\"#section-$id\">$name</a></li>\n";
        }
        else return "";
    }
echo '</ul>';
echo '</nav>';
echo '</header>';


function show_menu($id){
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE cat_id=$id  ORDER BY position")); 
mysqli_close($con);
    echo "<ul>\n";
    while ($row = mysqli_fetch_array($res)) {
        if ($row['type']=="category"){
            $name=$row['name'];
            $id=$row['id'];
            echo "<li class=\"submenu\"><a href=\"#section-$id\">$name</a>";
            show_menu($id);
            echo "</li>\n";
        }
        else if ($row['type']=="page"){
            $name=$row['name'];
            $id=$row['id'];
            echo "<li><a href=\"#section-$id\">$name</a></li>\n";
        }


    }
    echo "</ul>\n";
}

?>
