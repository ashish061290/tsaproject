<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/BrandModal.php";
      include('layouts/head.php'); ?>
<body class="hold-transition skin-blue sidebar-mini" style="z-index: 0;">
<?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
 <?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Project
        <small>Project</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="project.php">Project</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php
$action= ""; $id="";$table="project";
if(isset($_GET['action'])){
	$action = $_GET['action'];
if(isset($_GET['id'])){	$id = $_GET['id']; } 
}
if($action=="add"){ ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Project</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Project Client Name<span style="color:red;">*</span></label>
                  <input type="text" placeholder="Client Name" name="client_name" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Project Name<span style="color:red;">*</span></label>
                  <input type="text" placeholder="Project Name" name="project_name" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Project Url<span style="color:red;">*</span></label>
                  <input type="url" placeholder="Project Url" name="project_url" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Project Description<span style="color:red;">*</span></label>
                 <textarea name="project_desc" class="form-control" cols="4" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label>Project Image<span style="color:red;">*</span></label>
                <input type="file" name="project_img" class="form-control" required="true">
              </div>
           
              <!-- /.form-group -->
            <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Submit">
            </div>
          </div>   
                 </form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
  $image_tmp_name = $_FILES['project_img']['tmp_name'];
  $image_name = $_FILES['project_img']['name'];
  $path = "../storage/uploads/Project/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
  $data = array("project_name"=>$_POST['project_name'],"client_name"=>$_POST['client_name'],"project_url"=>$_POST['project_url'],"project_desc"=>$_POST['project_desc'],"project_img"=>$ImageData['file_path'],"img_name"=>$ImageData['file_name'],"status"=>1);
if($ImageData['file_name']){
   $insert = $Base->SaveEdit($data,null,null,$table);
   if($insert){ ?>
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='project.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                infrastructure Added Successfully.
              </div>

  <?php } } else{ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='project.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
                Infrastructure Upload Failed, due to some problem.
              </div>
<?php } } ?>            
            <!-- /.col -->
          </div>

          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Visit <a href="https://Bit7">Bit7</a> for more examples and information about
          the plugin.
        </div></div> <?php
}

else if($action=="delete"){
  $delete = $Base->DeleteData($table,"id",$id);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='project.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Project Deleted Successfully.
              </div>

    <?php
  }
  else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='project.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Deleted!</h4>
               		Some Error Please Try again...
              </div>
  <?php } }
  else if($action=="edit"){
  $row = $Base->SelectData($table,'id',$id);
  if(!empty($row)){ ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update Project</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Project Name <span style="color:red;">*</span></label>
                  <input type="text" name="project_name" value="<?= $row['project_name']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Client Name <span style="color:red;">*</span></label>
                  <input type="text" name="client_name" value="<?= $row['client_name']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Project Url <span style="color:red;">*</span></label>
                  <input type="text" name="project_url" value="<?= $row['project_url']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Project Description <span style="color:red;">*</span></label>
                  <textarea name="project_desc" class="form-control" cols="4" rows="4"><?= $row['project_name']?></textarea>
              </div>
              <div class="form-group">
                <label>Project img<span style="color:red;">*</span></label>
                <div class="form-group">
                  <img src="<?=$row['project_img'];?>" style="width:80px;">  
                </div>  
                <input type="file" name="project_img"  class="form-control" accept="image/*" >
              </div>
              <!-- /.form-group -->
            <div class="form-group">
             <input type="submit" class="btn btn-success" name="update" value="Update">
            </div>
          </div>   
                 </form></div></div></div>
            <!-- /.col -->
<?php }
if(isset($_POST['update'])){
  $img_path="";$img_name="";
  if(!empty($_FILES['project_img']['name'])){
  $image_tmp_name = $_FILES['project_img']['tmp_name'];
  $image_name = $_FILES['project_img']['name'];
  $path = "../storage/uploads/Project/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
    $img_path = $ImageData['file_path'];
    $img_name = $ImageData['file_name'];
   } else{
    $img_path = $row['project_img'];
    $img_name = $row['img_name'];
   }
  $data = array("project_name"=>$_POST['project_name'],"client_name"=>$_POST['client_name'],"project_url"=>$_POST['project_url'],"project_desc"=>$_POST['project_desc'],"project_img"=>$img_path,"img_name"=>$img_name,"status"=>1);
  if($data){
   $update = $Base->SaveEdit($data,$id,"id",$table);
   if($update){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='project.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Infrastructure Updated Successfully.
              </div>

  <?php } } else{ ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='project.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Infrastructure Updation Failed, due to some problem.
              </div>
<?php } } ?>            
            <!-- /.col -->
          </div>

          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Visit <a href="https://Bit7">Bit7</a> for more examples and information about
          the plugin.
        </div></div>
<?php 
}
else{
?>          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Project</h3>
            </div>
            <a href="project.php?action=add"><button class="btn btn-danger">Add New Project</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Project Name</th>
                  <th>Client Name</th>
                  <th>Project Url</th>
                  <th>Project Image</th>  
                  <th>description</th>                                    
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            <?php
             $condition = "status=1";
             $List = $Base->SelectDataWithColumn("*",$table,$condition);
              //$project.phpList = $project.php->Getproject.phpList();
              foreach($List as $row){ ?>
                <tr>
                  <td><?=$row['id']?></td>
                  <td><?=$row['project_name']?></td>
                  <td><?=$row['client_name']?></td>
                  <td><?=$row['project_url']?></td>
                  <td><img src="<?=$row['project_img'];?>" style="width:80px;"></td>
                  <td><?=$row['project_desc'] ?></td>
                  <td>
                  	<a href="project.php?action=edit&id=<?=$row['id']?>"><button class='btn btn-info'>Edit</button></a>
                    <a href="project.php?action=delete&id=<?=$row['id']?>"><button class='btn btn-danger'>Delete</button></a>
                  </td>
                </tr> <?php } ?>
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
  <?php include("layouts/footer.php"); ?>