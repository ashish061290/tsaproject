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
      <h1> Clients
        <small>Client</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="clients.php">ClientList</a></li>
        <li class="active">Client</li>
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
          <h3 class="box-title">Add New Client</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
            <div class="form-group">
                <label>Client Name<span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. Name" name="client_name" class="form-control" required="true">
              </div>
              
              <div class="form-group">
                <label>Title<span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. XYZ" name="client_title" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Client Logo<span style="color:red;">*</span></label>
                  <input type="file" name="client_logo" class="form-control" /> </div>
              <!-- /.form-group -->
            <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Add Client">
            </div>
          </div>   
            </form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
  $title = $_POST['client_title'];
  $name = $_POST['client_name'];

  $created_at = date('Y-m-d h:i:s');
  $image_tmp_name = $_FILES['client_logo']['tmp_name'];
  $image_name = $_FILES['client_logo']['name'];
  //$pathcover = "../storage/uploads/Category/Cover";
  $path = "../storage/uploads/Client/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
  $logo = $ImageData['file_path'];
  $data = array("name"=>$name,"title"=>$title,"created_at"=>$created_at,"logo"=>$logo);
  $Insert = $Base->SaveEdit($data,null,null,'clients');
  if($Insert==false){ ?>
   <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='clients.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Client Insertion Failed.
              </div>
    <?php } else{ ?>
    <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='clients.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Client Added Successfully.
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
     $Deactive = $Base->ActiveDeactive($id,$status,'clients','id');
     if($Deactive){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='clients.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Client DeActivated Successfully.
              </div>
    <?php } } 
else if($action=="activate"){
 $active = $Base->ActiveDeactive($id,$status,'clients','id');
 if($active){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='clients.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Client DeActivated Successfully.
              </div>
    <?php
  } 
} 
else if($action=="delete"){
  $delete =  $Base->DeleteData('clients','id',$id);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='clients.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Client Deleted Successfully.
              </div>
    <?php } else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='clients.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Deleted!</h4>
               		Client can not be deleted ,it may have some error.
              </div>
  <?php }
   }
//edit form start
  else if($action=="edit"){
  $row = $Base->SelectData('clients','id',$id); ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update Client</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
                
              <div class="form-group">
                <label>Client Nmae <span style="color:red;">*</span></label>
                  <input type="text" name="client_name" value="<?=$row['name']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Client Title <span style="color:red;">*</span></label>
                  <input type="text" name="client_title" value="<?=$row['title']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Client Logo<span style="color:red;">*</span></label>
                <img src="<?=$row['logo']?>" width="90" height="90" />
                  <input type="file" name="client_logo" class="form-control" /> </div>
              <!-- /.form-group -->
              <div class="form-group">
             <input type="submit" class="btn btn-success" name="update" value="Update Client">
            </div>
          </div>   
            </form>
          </div>
           </div>
             </div>
            <!-- /.col -->
<?php
if(isset($_POST['update'])){
  $client_name = $_POST['client_name'];
  $title = $_POST['client_title'];
  if($_FILES['client_logo']['name'] !=''){
  $image_tmp_name = $_FILES['client_logo']['tmp_name'];
  $image_name = $_FILES['client_logo']['name'];
  //$pathcover = "../storage/uploads/Category/Cover";
  $path = "../storage/uploads/Client/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
  $logo = $ImageData['file_path'];
  } else{
    $logo = $row['logo'];
  }
  $data = array("title"=>$title,"name"=>$client_name,"logo"=>$logo);
  $Update = $Base->SaveEdit($data,$id,'id','clients');
    if($Update == true){?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='clients.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Client Updated Successfully.
              </div>
    <?php } else{?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='clients.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Client Updation Failed, due to some problem.
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
              <h3 class="box-title"> Client</h3>
            </div>
            <a href="clients.php?action=add"><button class="btn btn-danger">Add New Client</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Client Id</th>
                  <th>Client name</th>
                  <th>Client title</th>
                  <th>Client Logo</th>
                  <th>Client Status</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php $GetClient = $Base->SelectDataWithColumn("*",'clients'); 
               foreach($GetClient as $row){ ?>
                <tr>
                  <td><?=$row['id']?></td>
                  
                  <td><?=$row['name']?></td>
                  <td><?=$row['title']?></td>
                  <td><img src="<?=$row['logo']?>" width="90" height="90" /></td>
                  <td> <?php 
                    if($row['status']==0){
                        echo "<img src='Img/status_inactive.png' alt='Inactive' title='Inactive'>";
                      }
                    elseif ($row['status']==1){
                        echo "<img src='Img/status_active.png' alt='active' title='active'>";
                      } 
                    ?></td>
                  <td>
                  	<a href="clients.php?action=edit&id=<?=$row['id']?>"><button class='btn btn-info'>Edit</button></a>
                    <a href="clients.php?action=delete&id=<?=$row['id']?>"><button class='btn btn-danger'>Delete</button></a>
                   <?php if($row['status']==0)
                      {?>
                    <a href="clients.php?action=activate&id=<?=$row['id']?>&status=<?=$row['status']?>"><button class='btn btn-info'>Activate</button></a>
                    <?php  }
                    elseif ($row['status']==1) { ?>
                    <a href="clients.php?action=deactivate&id=<?=$row['id']?>&status=<?=$row['status']?>"><button class='btn btn-warning'>DeActivate</button></a>
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
  