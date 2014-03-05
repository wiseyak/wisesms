<?php
require_once("declare.php");
?>
<!-- ================================================== NAVBAR ================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=BASE_URL?>"><?=SITE_NAME?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?=BASE_URL?>">Home</a></li>
            <li><a href="userprofile.php">User Management</a></li>
            <li><a href="creategroup.php">Group Management</a></li>
            <!--li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li-->
          </ul>
        <ul class="nav navbar-nav navbar-right custom-width-rightnavbar">        
            <li><a href="#"><?php echo "Welcome, " . $_COOKIE["wise_user"]; ?></a></li>
            <li class='active'><a href='logout.php'>Logout</a></li>          
        </ul>
        
        </div>
  </div>
</div>
<!-- ================================================== NAVBAR ================================================== -->