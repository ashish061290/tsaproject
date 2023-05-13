<?php include('../config/config.php');
      include "../lib/BaseModal.php";
      include "../modal/CmsModal.php";
      include('layouts/head.php');
      ?>
<body class="hold-transition skin-blue sidebar-mini" style="z-index: 0;">
<div class="wrapper">
<?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
<?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Slider Image
        <small>Slider</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php
$action= ""; $id="";
if(isset($_GET['action'])){
  $action = $_GET['action'];
if(isset($_GET['id'])){ $id = $_GET['id']; } 
}
if($action=="add"){ ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Slider Image</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Slider Image<span style="color:red;">*</span></label>
                  <input type="file" name="slider_img" class="form-control" accept="image/*" required="true">
              </div>
              <div class="form-group">
                <label>Slider Alt Tag<span style="color:red;">*</span></label>
                  <input type="text" name="slider_alt" class="form-control" required="true">
              </div>
           
              <!-- /.form-group -->
            <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Add Image">
            </div>
          </div>   
                 </form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
  $image_tmp_name = $_FILES['slider_img']['tmp_name'];
  $image_name = $_FILES['slider_img']['name'];
  $path = "../storage/uploads/slider/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
  if($ImageData['file_name']){
    $data = array('slider_path'=>$ImageData['file_path'],"status"=>1,"slider_alt"=>$_POST['slider_alt']);
    $result = $Base->SaveEdit($data,null,null,'homeslider');
    if($result){?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='cms.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Slider Added Successfully.
              </div>
         <?php } } else{?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='cms.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Slider Failed, due to some problem.
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
  } else if($action=="delete"){
  $delete = $Base->DeleteData('homeslider','slider_id',$id);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='cms.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Slider Deleted Successfully.
              </div>
      <?php } else{?>
      <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='cms.php'">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Deleted!</h4>
                  Slider not deleted, try again.
              </div>
        <?php } } else{ ?>          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Slider Image</h3>
            </div>
            <a href="cms.php?action=add"><button class="btn btn-danger">Add New Slider Image</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Slider Id</th>
                  <th>Slider Image</th> 
                  <th>Slider AltTag</th>                   
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php $result = $Base->SelectDataWithColumn("*",'homeslider');
      foreach($result as $row){ ?>
                <tr>
                  <td><?=$row['slider_id']?></td>
                  <td><img src="<?=$row['slider_path'];?>" style="width:80px;"></td>
                  <td><?=$row['slider_alt'];?></td>                        
                  <td>
                    <a href="cms.php?action=delete&id=<?=$row['slider_id']?>"><button class='btn btn-danger'>Delete</button></a>
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
 <?php include('layouts/footer.php'); ?>
