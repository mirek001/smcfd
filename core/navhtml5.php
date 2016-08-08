<?php

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE cat_id=1 AND hidden='0' AND disabled='0' ORDER BY position")); 

if ($CONFIG['developer_mode']!=1){
echo '<nav class="menu">'."\n";
}        
echo "\t<ul>\n";
    while ($row = mysqli_fetch_array($res)) {
        if ($row['type']=="category"){
            $name=$row['name'];
            $id=$row['id'];
            echo "\t\t\t<li class=\"submenu\"><a href=\"#\">$name</a>";
            show_menu($id);
            echo "\t\t\t</li>\n";
        }
            else if ($row['type']=="page"){
            $name=$row['name'];
            $id=$row['id'];
            echo "\t\t\t<li><a href=\"index.php?id=$id\">$name</a></li>\n";
        }
        else return "";

    }
echo "\t\t</ul>\n";
if ($CONFIG['developer_mode']!=1){
echo '</nav>';
}   

function show_menu($id){
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE cat_id=$id AND hidden='0' AND disabled='0'  ORDER BY position")); 

    echo "\n\t\t\t<ul>\n";
    while ($row = mysqli_fetch_array($res)) {
        if ($row['type']=="category"){
            $name=$row['name'];
            $id=$row['id'];
            echo "\t\t\t<li class=\"submenu\"><a href=\"#\">$name</a>";
            show_menu($id);
            echo "</li>\n";
        }
        else if ($row['type']=="page"){
            $name=$row['name'];
            $id=$row['id'];
            echo "\t\t\t\t<li><a href=\"index.php?id=$id\">$name</a></li>\n";
        }
        else return "";
    }
    echo "\t\t\t</ul>\n";
}

?>