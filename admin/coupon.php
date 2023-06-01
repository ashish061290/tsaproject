<?php
      include("../config/config.php");
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
      <h1>Product Coupon
        <small>Coupon</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="coupon.php">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php
$action= ""; $id="";$table="coupon";
if(isset($_GET['action'])){
  $action = $_GET['action'];
if(isset($_GET['id'])){ $id = $_GET['id']; } 
}
if($action=="add"){ ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Coupon</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Coupon Name<span style="color:red;">*</span></label>
                  <input type="text" name="coupon_name" placeholder="copon code" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Coupon Discount Type<span style="color:red;">*</span></label>
                 <select name="coupon_type" class="form-control">
                  <option value="">--Select--</option>
                  <option value="1">Percentage</option>
                  <option value="2">Amount</option>
                 </select>
              </div>
              <div class="form-group">
                <label>Coupon Discount<span style="color:red;">*</span></label>
                  <input type="number" placeholder="e.g. XYZ" name="coupon_discount" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Coupon Startdate<span style="color:red;">*</span></label>
                  <input type="date" name="coupon_startdate" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Coupon Expiredate<span style="color:red;">*</span></label>
                  <input type="date" name="coupon_expiredate" class="form-control" required="true">
              </div>
             <div class="form-group">
             <input type="submit" class="btn btn-success" name="submit" value="Add Coupon">
            </div>
          </div>   
                 </form></div></div></div>
            <!-- /.col --><?php
           if(isset($_POST['submit'])){
   $coupon_name=$_POST['coupon_name'];
   $coupon_dis = $_POST['coupon_discount'];
   $coupon_type = $_POST['coupon_type'];
   if($coupon_type==1){
   $coupon = $coupon_dis."%";
   } else{ $coupon = $coupon_dis; }
   $create_date = date('Y-m-d h:i:s');
   $data = array('coupon_name'=>$coupon_name,"coupon_type"=>$coupon_type,"coupon_amount_per"=>$coupon,"created_at"=>$create_date,"coupon_startdate"=>$_POST['coupon_startdate'],"coupon_enddate"=>$_POST['coupon_expiredate']);
   $result = $Base->SaveEdit($data,null,null,$table);
   if($result){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='coupon.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Coupon Added Successfully.
              </div>
    <?php } else{ ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='coupon.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
                Some Problem, Please Try Again.
              </div>
    <?php } } ?>            
            <!-- /.col -->
          </div>

          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       </div> <?php }
      else if($action=="deactivate"){
      $DeActivateQuery = "UPDATE `product_category` SET `prod_cat_status`=0 WHERE `prod_cat_id`='".$id."' ";
      $Deactive =mysqli_query($conn,$DeActivateQuery);
       if($Deactive){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Category DeActivated Successfully.
              </div>
    <?php
  } 
} 
else if($action=="activate"){
$ActivateQuery = "UPDATE `product_category` SET `prod_cat_status`=1 WHERE `prod_cat_id`=$id";
$active = mysqli_query($conn,$ActivateQuery);
 if($active){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Category DeActivated Successfully.
              </div>
    <?php } } else if($action=="delete"){
             $delete = $Base->DeleteData($table,'coupon_id',$id);
             if($delete){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='coupon.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               SubCategory Deleted Successfully.
              </div><?php } else{ ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='coupon.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
                Some Problem, Please Try Again.
              </div>
           <?php } } else{ ?>          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Coupon Deatil</h3>
            </div>
            <a href="coupon.php?action=add"><button class="btn btn-danger">Add Coupon</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Coupon Name</th>
                  <th>Coupon Type</th>
                  <th>Coupon Amount/Per</th>
                  <th>Coupon Startdate</th>
                  <th>Coupon Enddate</th>
                  <th>Datetime</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
             <?php
            $result = $Base->SelectDataWithColumn("*",$table,'status=1');
            foreach($result as $row){
              $type="amount";
              if($row['coupon_type']==1){ $type="percentage"; } ?>
                <tr>   
                  <td><?=$row['coupon_name']?></td>
                  <td><?=$type?></td> 
                  <td><?=$row['coupon_amount_per']?></td> 
                  <td><?=$row['coupon_startdate']?></td> 
                  <td><?=$row['coupon_enddate']?></td> 
                   <td><?=$row['created_at']?></td>     
                  <td>
                    <a href="coupon.php?action=delete&id=<?=$row['coupon_id']?>"><button class='btn btn-danger'>Delete</button></a>
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
  <!-- /.content-wrapper -->
 <?php include("layouts/footer.php") ?>
