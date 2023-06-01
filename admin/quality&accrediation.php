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
      <h1> Product Quality
        <small>Quality</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="quality&accrediation.php">QualityList</a></li>
        <li class="active">Quality</li>
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
                if($action=="add"){ ?>
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Quality</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Title<span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. XYZ" name="profile_title" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Quality Descr<span style="color:red;">*</span></label>
                  <textarea name="quality_descr" class="form-control" cols="4" rows="4">

                  </textarea> </div>
              <!-- /.form-group -->
            <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Add Quality">
            </div>
          </div>   
            </form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
  $title = $_POST['profile_title'];
  $descr = $_POST['quality_descr'];
  $created_at = date('Y-m-d h:i:s');
  $data = array("title"=>$title,"descr"=>$descr,"created_at"=>$created_at); 
  $Insert = $Base->SaveEdit($data,null,null,'quality');
  if($Insert==false){ ?>
   <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='quality&accrediation.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Quality Insertion Failed.
              </div>
    <?php } else{ ?>
    <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='quality&accrediation.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Quality Added Successfully.
              </div>
    <?php  } ?>            
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Visit <a href="https://Bit7.com">Bit7</a> for more examples and information about
          the plugin.
        </div></div> <?php } }
  //add form end
     else if($action=="deactivate"){
     $Deactive = $Base->ActiveDeactive($id,$status,'quality','id');
     if($Deactive){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='quality&accrediation.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Quality DeActivated Successfully.
              </div>
    <?php } } 
else if($action=="activate"){
 $active = $Base->ActiveDeactive($id,$status,'quality','id');
 if($active){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='quality&accrediation.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Quality DeActivated Successfully.
              </div>
    <?php
  } 
} 
else if($action=="delete"){
  $delete =  $Base->DeleteData('quality','id',$id);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='quality&accrediation.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Quality Deleted Successfully.
              </div>
    <?php } else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='quality&accrediation.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Deleted!</h4>
               		Quality can not be deleted ,it may have some error.
              </div>
  <?php }
   }
//edit form start
  else if($action=="edit"){
  $row = $Base->SelectData('quality','id',$id); ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update Quality</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Quality Title <span style="color:red;">*</span></label>
                  <input type="text" name="quality_name" value="<?=$row['title']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Quality Descr<span style="color:red;">*</span></label>
                  <textarea name="quality_descr" class="form-control" cols="4" rows="4">
                    <?=$row['descr'] ?>
                  </textarea> </div>
              <!-- /.form-group -->
              <div class="form-group">
             <input type="submit" class="btn btn-success" name="update" value="Update Quality">
            </div>
          </div>   
            </form>
          </div>
           </div>
             </div>
            <!-- /.col -->
<?php
if(isset($_POST['update'])){
  $quality_name = $_POST['quality_name'];
  $quality_descr = $_POST['quality_descr']; 
  $data = array("title"=>$quality_name,"descr"=>$quality_descr); 
  $Update = $Base->SaveEdit($data,$id,'id','quality');
    if($Update == true){?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='quality&accrediation.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Quality Updated Successfully.
              </div>
    <?php } else{?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='quality&accrediation.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Quality Updation Failed, due to some problem.
              </div>
    <?php } } ?>            
            <!-- /.col -->
          </div>

          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
        <?php  } else{ ?>  
          <!-- view all profiles -->        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product Quality</h3>
            </div>
            <a href="quality&accrediation.php?action=add"><button class="btn btn-danger">Add New Quality</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Quality Id</th>
                  <th>Quality Title</th>
                  <th>Quality Descr</th>
                  <th>Quality Status</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php $GetQuality = $Base->SelectDataWithColumn("*",'quality'); 
               foreach($GetQuality as $row){ ?>
                <tr>
                  <td><?=$row['id']?></td>
                  <td><?=$row['title']?></td>
                  <td><?=$row['descr']?></td>
                  <td> <?php 
                    if($row['status']==0){
                        echo "<img src='Img/status_inactive.png' alt='Inactive' title='Inactive'>";
                      }
                    elseif ($row['status']==1){
                        echo "<img src='Img/status_active.png' alt='active' title='active'>";
                      } 
                    ?></td>
                  <td>
                  	<a href="quality&accrediation.php?action=edit&id=<?=$row['id']?>"><button class='btn btn-info'>Edit</button></a>
                    <a href="quality&accrediation.php?action=delete&id=<?=$row['id']?>"><button class='btn btn-danger'>Delete</button></a>
                   <?php if($row['status']==0)
                      {?>
                    <a href="quality&accrediation.php?action=activate&id=<?=$row['id']?>&status=<?=$row['status']?>"><button class='btn btn-info'>Activate</button></a>
                    <?php  }
                    elseif ($row['status']==1) { ?>
                    <a href="quality&accrediation.php?action=deactivate&id=<?=$row['id']?>&status=<?=$row['status']?>"><button class='btn btn-warning'>DeActivate</button></a>
                    <?php  } ?>
                  </td>
                </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <?php
         }
          ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php include('layouts/footer.php');  ?>
  