<?php if($role==1){ ?>
  <aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../Img/profilepic.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin Panel</p>
          <a href="dashboard.php"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <?php $catcount = $Base->CountNumRow('category','1','status'); ?>
        <li class="">
          <a href="category.php">
            <i class="fa fa-dashboard"></i> <span>Category</span>
            <span class="pull-right badge bg-green"><?=$catcount;?></span>
          </a>
        </li>
        <?php $productcount = $Base->CountNumRow('products','1','status'); ?>
        <li class="">
          <a href="product.php">
            <i class="fa fa-dashboard"></i> <span>Products</span>
            <span class="pull-right badge bg-green"><?=$productcount;?></span>
          </a>
        </li>
        <?php $brandcount = $Base->CountNumRow('infrastructure','1','status'); ?>
        <li class="">
          <a href="infrastructure.php">
            <i class="fa fa-dashboard"></i> <span>Infrastructure</span>
            <span class="pull-right badge bg-green"><?=$brandcount;?></span>
          </a>
        </li>
        <?php $projectcount = $Base->CountNumRow('project','1','status'); ?>
        <li class="">
          <a href="project.php">
            <i class="fa fa-dashboard"></i> <span>Project</span>
            <span class="pull-right badge bg-green"><?=$projectcount;?></span>
          </a>
        </li>
        <li class="">
        <a href="clients.php">
          <i class="fa fa-arrow-circle-right"></i>Clients</a>
        </li>
        <li class="">
        <a href="about-profile.php">
          <i class="fa fa-arrow-circle-right"></i>About Pages</a>
        </li>
        <li class="">
        <a href="contactus.php">
          <i class="fa fa-arrow-circle-right"></i>ContactUs</a>
        </li>
        <?php $enqcount = $Base->CountNumRow('enquiry','1','status'); ?>
        <li class="">
          <a href="enquiry.php">
            <i class="fa fa-dashboard"></i> <span>Report</span>
                   <span class="pull-right badge bg-green"><?=$enqcount;?></span>
          </a>
        </li>
        <li class="">
          <a href="profiles.php">
            <i class="fa fa-dashboard"></i> <span>Admin Profile</span>
                   <span class="pull-right badge bg-green"></span>
          </a>
        </li>
      </ul>
        </li>
		  </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php } ?>