<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/UserModal.php";
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
      <h1>Users Detail
        <small>Detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="user.php">UserList</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php
$action= ""; $id="";$table="users";$status="";
if(isset($_GET['action'])){
	$action = $_GET['action'];
if(isset($_GET['id'])){	$id = $_GET['id']; } 
if(isset($_GET['status'])){	$status = $_GET['status']; }
}
if($action=="view"){
  $condition = "user_id='".$id."'";
  $result = $Base->SelectDataWithColumn("*",$table,$condition);  
  foreach($result as $gUser){
?>
<div class="col-sm-12">
<h3 class="box-title" style="padding:0px 10px 0px 10px;">Detail
<strong style="float:right;"><?php if($gUser['user_status'] == '1'){ echo"<img src='Img/status_active.png' alt='active' title='active'>";} else{ echo"<img src='Img/status_inactive.png' alt='Inactive' title='Inactive'>";} ?></strong></h3>  
  <div class="col-sm-12">
    <table class="table table-bordered table-striped table-responsive">
      <tr>
        <td>User Name</td>
        <td><?=$gUser['username']?></td>
      </tr>
      <tr>
        <td>User Mobile</td>
        <td><?=$gUser['usermobile']?></td>
      </tr>
      <tr>
        <td>User Email</td>
        <td><?=$gUser['useremail']    ?> 
        </td>
      </tr>
      <tr>
        <td>User Status</td>
        <td style="word-wrap: break-word; width:50%;"><?php if($gUser['user_status'] == '1'){ echo "Active"; } else{ echo "Inactive"; }?></td>
      </tr>
    </table>
  </div>  
</div>
<?php
}
}
else if($action=="activate"){
  $active = $Base->ActiveDeactive($id,$status,$table);
 if($active){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Category DeActivated Successfully.
              </div>
    <?php
  } 
} 
else if($action=="delete"){
  $deleteQuery = "DELETE FROM `category` WHERE `category_id`='".$id."'";
  $delete = mysqli_query($conn,$deleteQuery);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Category Deleted Successfully.
              </div>

    <?php
  }
  else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Deleted!</h4>
               		Category can not be deleted ,it may have some sub-category so please delete its sub-category first.
              </div>
  <?php }
}
else if($action=="edit"){
  $sql = "SELECT * FROM `category` WHERE `category_id` = $id";
  $res = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($res);
?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update Category</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Category Name <span style="color:red;">*</span></label>
                  <input type="text" name="category_name" value="<?= $row['category_name']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Category Status<span style="color:red;">*</span></label>
                  <select name="category_status" class="form-control" required="true">
                    <option value="1"> Active</option>
                    <option value="0">InActive</option>
                  </select>
              </div>
              <div class="form-group">
                <label>Category Image<span style="color:red;">*</span></label>
                <div class="form-group">
                  <img src="<?=$row['category_img'];?>" style="width:80px;">  
                </div>  
                <input type="file" name="category_img"  class="form-control" accept="image/*" required="true">
              </div>
           
              <!-- /.form-group -->
                            <div class="form-group">
             <input type="submit" class="btn btn-success" name="submit" value="Update Category">
            </div>
          </div>   
                 </form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
  $category_name = mysqli_real_escape_string($conn,$_POST['category_name']);
  $category_status = mysqli_real_escape_string($conn,$_POST['category_status']); 
  $category_tmp_file = $_FILES['category_img']['tmp_name'];
  $category_file = $_FILES['category_img']['name'];
  $path = "../uploads/";

$uploadFile = move_uploaded_file($category_tmp_file,$path.$category_file);
if($uploadFile){

   $updateQuery = "UPDATE `category` SET `category_name`='".$category_name."',`category_img`='http://".$_SERVER['HTTP_HOST'].'/uploads/'.$category_file."',`category_status`='".$category_status."' WHERE `category_id` = $id";
  if(mysqli_query($conn,$updateQuery))
  {?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Category Updated Successfully.
              </div>

  <?php }

}
else{?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Category Updation Failed, due to some problem.
              </div>
<?php }
}

?>            
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
              <h3 class="box-title">Prebuy Users</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>User Name</th>
                  <th>User Mobile</th>                  
                  <th>User Email</th>                  
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
<?php $result = $Base->SelectDataWithColumn("*",$table,$WhereCondition="");
foreach($result as $row){ ?>
                <tr>
                  <td><?=$row['user_id']?></td>
                  <td><?=$row['username']?></td>
                  <td><?=$row['usermobile']?></td>
                  <td><?=$row['useremail']?></td>
                  <td>                    
                    <?php if($row['user_status']==0){
                        echo "<img src='Img/status_inactive.png' alt='Inactive' title='Inactive'>"; }elseif($row['user_status']==1) {
                        echo "<img src='Img/status_active.png' alt='active' title='active'>"; } ?></td>
                     <td><a href="user.php?action=view&id=<?php echo $row['user_id']; ?>" class="btn btn-success">View</a></td></tr> 
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
 <?php include('layouts/footer.php') ?>
