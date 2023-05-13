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
      <h1> Enquiry
        <small>Enquiry</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="enquiry.php">EnquiryList</a></li>
        <li class="active">Enquiry</li>
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
     $Deactive = $Base->ActiveDeactive($id,$status,'enquiry','id');
     if($Deactive){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='enquiry.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Enquiry DeActivated Successfully.
              </div>
    <?php } } 
else if($action=="activate"){
 $active = $Base->ActiveDeactive($id,$status,'enquiry','id');
 if($active){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='enquiry.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Enquiry DeActivated Successfully.
              </div>
    <?php
  } 
} 
else if($action=="delete"){
  $delete =  $Base->DeleteData('enquiry','id',$id);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='enquiry.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Enquiry Deleted Successfully.
              </div>
    <?php } else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='enquiry.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Deleted!</h4>
               		Enquiry can not be deleted ,it may have some error.
              </div>
  <?php }
   } else{ ?>  
          <!-- view all profiles -->        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Enquiry</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name </th>
                  <th>Mobile </th>
                  <th>Email </th>
                  <th>Service</th>
                  <th>Message</th>       
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php $GetEnquiry = $Base->SelectDataWithColumn("*",'enquiry'); 
               foreach($GetEnquiry as $row){ ?>
                <tr>
                  
                  <td><?=$row['name']?></td>
                  <td><?=$row['mobile']?></td>
                  <td><?=$row['email']?></td>
                  <td><?=$row['service']?></td>
                  <td><?=$row['message']?></td>
                  <td>
                  	 <a href="enquiry.php?action=delete&id=<?=$row['id']?>"><button class='btn btn-danger'>Delete</button></a>
                   <?php if($row['status']==0)
                      {?>
                    <a href="enquiry.php?action=activate&id=<?=$row['id']?>&status=<?=$row['status']?>"><button class='btn btn-info'>Activate</button></a>
                    <?php  }
                    elseif ($row['status']==1) { ?>
                    <a href="enquiry.php?action=deactivate&id=<?=$row['id']?>&status=<?=$row['status']?>"><button class='btn btn-warning'>DeActivate</button></a>
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
          <?php } ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php include('layouts/footer.php');  ?>
  