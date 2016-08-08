    <?php
    if (isset($_GET['page'])) {
   			$subpage = strip_tags($_GET['page']);
				if(empty($subpage) || !file_exists('system/'.$subpage.'.php'))
					$subpage = 'pulpit';
				require $subpage.'.php'; 
	}
	else require 'site_map.php';

    ?>
