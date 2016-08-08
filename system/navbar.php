<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" href="system.php">SiteMapCMS System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['lg_cms_settings']?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="system.php?page=site_map"><?php echo $_SESSION['lg_site_map']?></a></li>
            <li><a href="system.php?page=general_settings"><?php echo $_SESSION['lg_general_settings']?></a></li>
            <li class="divider"></li>
            <li class="dropdown-submenu">
                  <a href="#"><?php echo $_SESSION['lg_advenced_settings']?></a>
                  <ul class="dropdown-menu">
                  <li><a href="system.php?page=menu_css">CSS Menu</a></li>
                  </ul>
            </li>
            <li class="dropdown-submenu">
                  <a href="#"><?php echo $_SESSION['lg_plugins']?></a>
                  <ul class="dropdown-menu">
                  <li><a href="system.php?page=cookie_terms_edit">Cookie</a></li>
                  <li><a href="system.php?page=google_analytics_edit">Google Analytics</a></li>
                  <li><a href="system.php?page=facebook">Facebook</a></li>
                  </ul>
            </li>
            <li class="dropdown-submenu">
              <a href="#"><?php echo $_SESSION['lg_change_lang']?></a>
              <ul class="dropdown-menu">
              <li><a href="system/core/change_lang.php?lang=en">English</a></li>
              <li><a href="system/core/change_lang.php?lang=pl">Polski</a></li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>



      <ul class="nav navbar-nav navbar-right">
        <?php include 'license_button.php';?>
        <?php include 'update_button.php';?>
        <li><a href="index.php" target="_blank"><?php echo $_SESSION['lg_preview']?></a></li>
        <li><a href="logout.php"><?php echo $_SESSION['lg_logout']?></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>