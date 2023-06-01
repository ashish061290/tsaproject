<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/PackageModal.php";
      include('layouts/head.php'); ?>
<body class="hold-transition skin-blue sidebar-mini" style="z-index: 0;">
<div class="wrapper">
<?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
 <?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Packages
        <small>Our Packages</small>
        <?php if(isset($_GET['action'])){ ?>
          <a href="packages.php" style="color:#fff;"><small class="btn btn-sm btn-primary pull-right text-center">Back</small></a>
        <?php } ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php
$action= ""; $id=""; $table="packages";
if(isset($_GET['action'])){
	$action = $_GET['action'];
if(isset($_GET['id'])){	$id = $_GET['id']; } 
}
if($action=="add"){ ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Package</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Packages Name <span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. XYZ" name="pack_name" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Packages Price <span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. XYZ" name="pack_price" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Number Of Deals<span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. XYZ" name="num_deals" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Package Specification<span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. XYZ" name="pack_speci" class="form-control" required="true">
              </div>                                          
            <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Add Packages">
            </div>
          </div>   
                 </form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
 $data = array("pack_name"=>$_POST['pack_name'],"pack_price"=>$_POST['pack_price'],"pack_deal"=>$_POST['num_deals'],"pack_speci"=>$_POST['pack_speci'],"status"=>1);  
 $insert = $Base->SaveEdit($data,null,null,$table);
 if($insert){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='packages.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Package Added Successfully.
              </div>
        <?php } ?>            
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
}
else if($action=="delete"){
  $delete = $Base->DeleteData($table,"pack_id",$id);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='packages.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Package Deleted Successfully.
              </div>

    <?php
  }
  else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='packages.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Deleted!</h4>
               		Some Error Please Try again...
              </div>
  <?php }
}
else if($action=="edit"){
  $SelectedColumns="*"; $WhereCondition="pack_id='".$id."'";
  $result = $Base->SelectDataWithColumn($SelectedColumns,$table,$WhereCondition);
 foreach($result as $row){?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update Brand</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Packages Name <span style="color:red;">*</span></label>
                  <input type="text" name="pack_name" value="<?= $row['pack_name']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Packages Price <span style="color:red;">*</span></label>
                  <input type="text" name="pack_price" value="<?= $row['pack_price']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Packages Deal<span style="color:red;">*</span></label>
                  <input type="text" name="pack_deal" value="<?= $row['pack_deal']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Packages Speci<span style="color:red;">*</span></label>
                  <input type="text" name="pack_speci" value="<?= $row['pack_speci']?>" class="form-control" required="true">
              </div>              
              </div>
           
              <!-- /.form-group -->
                            <div class="form-group">
             <input type="submit" class="btn btn-success" name="update" value="Update Brand">
            </div>
          </div>   
                 </form></div></div></div>
            <!-- /.col -->
      <?php } if(isset($_POST['update'])){
       $data = array("pack_name" =>$_POST['pack_name'],
                      "pack_price" =>$_POST['pack_price'],
                      "pack_deal" =>$_POST['pack_deal'],
                      "pack_speci" =>$_POST['pack_speci']);
                      $columnname = "pack_id";
       $update = $Base->SaveEdit($data,$id,$columnname,$table);
       if($update){ ?>
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='packages.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Packages Updated Successfully.
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
<?php } else{ ?>          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pakcages</h3>
            </div>
            <a href="packages.php?action=add"><button class="btn btn-danger">Add New Package</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Package Id</th>
                  <th>Package Name</th>
                  <th>Package Deal</th>
                  <th>Package Price</th>
                  <th>Package Specification</th>                                    
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             <?php
                $SelectedColumns="*"; $WhereCondition="";
                $result = $Base->SelectDataWithColumn($SelectedColumns,$table,$WhereCondition);
                foreach($result as $row){ ?>
                <tr>
                  <td><?=$row['pack_id']?></td>
                  <td><?=$row['pack_name']?></td>
                  <td><?=$row['pack_deal']?></td>
                  <td><?=$row['pack_price']?></td>
                  <td><?=$row['pack_speci']?></td>
                  <td>
                  	<a href="packages.php?action=edit&id=<?=$row['pack_id']?>"><button class='btn btn-info'>Edit</button></a>
                    <a href="packages.php?action=delete&id=<?=$row['pack_id']?>"><button class='btn btn-danger'>Delete</button></a>
                   
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