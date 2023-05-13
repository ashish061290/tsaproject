<?php if($role==""){
        echo("<script>location.href = '".ADMIN."';</script>");
      } $user = $Base->SelectData('admin','admin_id',1); ?><header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SATHI</b>TECH</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Deals</b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../admin/img/profilepic.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$user['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../admin/img/profilepic.png" class="img-circle" alt="User Image">

                <p>
                 <?=$user['username']?> - Admin
                  <small>since Nov. 2023</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="enquiry.php">Enquiry</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="product.php">Products</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="javascript:void(0)">Users</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profiles.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <form method="GET" action="">
                    <input type="submit" name="logout" value="Logout" class="btn btn-default btn-flat" />
                  </form> 
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php if(isset($_GET['logout'])){
         $res = $Base->SessionDestroy(); 
         if($res){
          echo("<script>location.href = '".ADMIN."';</script>");
         } 
  } ?>
  