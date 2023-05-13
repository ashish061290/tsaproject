<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/CategoryModal.php";
      include('layouts/head.php'); ?>
<body class="hold-transition skin-blue sidebar-mini" style="z-index: 0;">
<div class="wrapper">
  <?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
  <?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Profile
        <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="profiles.php">Profile</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php $action= ""; $id="";$status="";
                if(isset($_GET['action'])){
	              $action = $_GET['action'];
                if(isset($_GET['id'])){	$id = $_GET['id']; }
                if(isset($_GET['status'])){	$status = $_GET['status']; }
                }
  //add form end
     else if($action=="deactivate"){
     $Deactive = $Base->ActiveDeactive($id,$status,'admin','id');
     if($Deactive){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='profiles.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Profile DeActivated Successfully.
              </div>
    <?php } } 
else if($action=="activate"){
 $active = $Base->ActiveDeactive($id,$status,'admin','id');
 if($active){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='profiles.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Profile DeActivated Successfully.
              </div>
    <?php
  } 
} 
else if($action=="delete"){
  $delete =  $Base->DeleteData('admin','id',$id);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='profiles.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Profile Deleted Successfully.
              </div>
    <?php } else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='profiles.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Deleted!</h4>
               		Profile can not be deleted ,it may have some error.
              </div>
  <?php } }
  //edit form start
    if($action=="edit"){
    $row = $Base->SelectData('admin','admin_id',$id); ?>
  <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Update Profile</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <form method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
                  
                <div class="form-group">
                  <label>Name <span style="color:red;">*</span></label>
                    <input type="text" name="name" value="<?=$row['name']?>" class="form-control" required="true">
                </div>
                <div class="form-group">
                  <label>Logo<span style="color:red;">*</span></label>
                  <img src="<?=$row['logo']?>" width="80" height="80" />
                    <input type="file" name="company_logo" class="form-control" required="true">
                </div>
                
                <div class="form-group">
                  <label>Mobile<span style="color:red;">*</span></label>
                    <input type="text" name="mobile" value="<?=$row['mobile']?>" class="form-control" required="true">
                </div>
                
                <div class="form-group">
                  <label>Username <span style="color:red;">*</span></label>
                    <input type="text" name="username" value="<?=$row['username']?>" class="form-control" required="true">
                </div>
                
                <div class="form-group">
                  <label>password <span style="color:red;">*</span></label>
                    <input type="password" name="password" placeholder="xxxx" class="form-control" required="true">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
               <input type="submit" class="btn btn-success" name="update" value="Update Profile">
              </div>
            </div>   
              </form>
            </div>
             </div>
               </div>
              <!-- /.col -->
  <?php
  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $created_at = date('Y-m-d h:i:s');
    if($_FILES['company_logo']['name'] !=""){
    $image_tmp_name = $_FILES['company_logo']['tmp_name'];
   $image_name = $_FILES['company_logo']['name'];
  //$pathcover = "../storage/uploads/Category/Cover";
  $path = "../storage/uploads/Logo/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
  $logo = $ImageData['file_path'];
    } else{
      $logo = $row['logo'];
    }  
    $data = array("name"=>$name,"mobile"=>$mobile,"username"=>$username,"password"=>$password,"created_at"=>$created_at,"logo"=>$logo);  
    $Update = $Base->SaveEdit($data,$id,'admin_id','admin');
      if($Update == true){?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='profiles.php'">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                 Profile Updated Successfully.
                </div>
      <?php } else{?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='profiles.php'">&times;</button>
                  <h4><i class="icon fa fa-check"></i>Failed!</h4>
                 Contactus Updation Failed, due to some problem.
                </div>
      <?php } } ?>            
              <!-- /.col -->
            </div>
  
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
          
          <?php  
   } else{ ?>  
          <!-- view all profiles -->        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Profile</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>CompanyName</th>
                  <th>CompanyLogo</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Mobile</th>       
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php $GetProfile = $Base->SelectDataWithColumn("*",'admin'); 
               foreach($GetProfile as $row){ ?>
                <tr>
                  <td><?=$row['name']?></td> 
                  <td><img src="<?=$row['logo']?>" width="80" height="80" /></td>
                  <td><?=$row['username']?></td>
                  <td><?=$row['password']?></td>
                  <td><?=$row['mobile']?></td>
                  <td><a href="profiles.php?action=edit&id=<?=$row['admin_id']?>"><button class='btn btn-info'>Edit</button></a>
                  </td>
                </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <?php } ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php include('layouts/footer.php');  ?>
  