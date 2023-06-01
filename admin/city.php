<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/CityModal.php";
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
      <h1> Prebuy City Detail
        <small>City Detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="city.php">City</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php
$action= ""; $id=""; $table="city_details";
if(isset($_GET['action'])){
	$action = $_GET['action'];
if(isset($_GET['id'])){	$id = $_GET['id']; } 
}
if($action=="add"){ ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Category</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>City Name <span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. XYZ" name="city_name" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Pincode<span style="color:red;">*</span></label>
                  <input type="number" placeholder="e.g. 4664446" name="city_pincode" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Area<span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. XYZ" name="city_area" class="form-control" required="true">
              </div>

           
              <!-- /.form-group -->
            <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Add Category">
            </div>
          </div>   
                 </form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
  $city_name = $_POST['city_name'];
  $city_area = $_POST['city_area']; 
  $city_pincode = $_POST['city_pincode'];   
  $data = array("pincode"=>$city_pincode,"area"=>$city_area,"city"=>$city_name);
  $result = $Base->SaveEdit($data,$table);
  if($result){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='city.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               City Added Successfully.
              </div><?php } } ?>            
            <!-- /.col -->
          </div>

          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Visit <a href="https://Bit7">Bit7</a> for more examples and information about
          the plugin.
        </div></div> <?php } 
   else if($action=="delete"){
    $delete = $Base->DeleteData($table,'city_detail_id',$id);
    if($delete){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='city.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               City Deleted Successfully.
              </div>

    <?php } else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='city.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Deleted!</h4>
               		City can not be deleted. Please try again...
              </div>
  <?php } } else if($action=="edit"){
            $row = $Base->SelectData($table,'city_detail_id',$id); ?>
    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update City</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>City Name <span style="color:red;">*</span></label>
                  <input type="text" name="city_u_name" value="<?= $row['city']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>City Area<span style="color:red;">*</span></label>
                  <input type="text" name="city_u_area" value="<?= $row['area']?>" class="form-control" required="true">                 
              </div>
              <div class="form-group">
                <label>Category Pincode<span style="color:red;">*</span></label>
                <div class="form-group">
                  <input type="text" name="city_u_pincode" value="<?= $row['pincode']?>" class="form-control" required="true">
                </div>  
              </div>
           
              <!-- /.form-group -->
                            <div class="form-group">
             <input type="submit" class="btn btn-success" name="update" value="Update City">
            </div>
          </div>   
                 </form></div></div></div>
            <!-- /.col -->
        <?php
        if(isset($_POST['update'])){
        $city_name = $_POST['city_u_name'];
        $city_area = $_POST['city_u_area'];
        $city_code = $_POST['city_u_pincode'];  
          $data = array("pincode"=>$city_code,"area"=>$city_area,"city"=>$city_name);
          $result = $Base->SaveEdit($data,$id,'city_detail_id',$table);
          if($result){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='city.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               City Updated Successfully.
              </div><?php } } ?>            
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Visit <a href="https://Bit7">Bit7</a> for more examples and information about
          the plugin.
        </div></div> <?php } else{ ?>          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">City Details</h3>
            </div>
            <a href="city.php?action=add"><button class="btn btn-danger">Add New CIty</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Id</th>
                  <th>City Name</th>
                  <th>City PINCODE</th>                  
                  <th>City Area</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php $result = $Base->SelectDataWithColumn("*",$table); 
                   foreach($result as $row){ ?>
                <tr>
                  <td><?=$row['city_detail_id']?></td>
                  <td><?=$row['city']?></td>
                  <td><?=$row['pincode']?></td>
                  <td><?=$row['area']?></td>
                  <td>
                  	<a href="city.php?action=edit&id=<?=$row['city_detail_id']?>"><button class='btn btn-info'>Edit</button></a>
                    <a href="city.php?action=delete&id=<?=$row['city_detail_id']?>"><button class='btn btn-danger'>Delete</button></a>
                  </td>
                </tr><?php } ?>
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
 <?php include('layouts/footer.php'); ?>