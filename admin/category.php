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
      <h1> Product Category
        <small>Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="category.php">CategoryList</a></li>
        <li class="active">Category</li>
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
          <h3 class="box-title">Add New Category</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Category Name<span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. XYZ" name="category_name" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Category Status<span style="color:red;">*</span></label>
                  <select name="category_status" class="form-control" required="true">
                    <option value="1"> Active</option>
                    <option value="0">InActive</option>
                  </select>
              </div>
              <div class="form-group">
                <label>Category icon Image<span style="color:red;">*</span></label>
                  <input type="file" name="category_img" class="form-control" accept="image/*">
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
  $category_name = $_POST['category_name'];
  $catrow =  $Base->CountNumRow('category',$category_name,'category_name');
  $category_status = $_POST['category_status'];
  $image_tmp_name = $_FILES['category_img']['tmp_name'];
  $image_name = $_FILES['category_img']['name'];
  //$pathcover = "../storage/uploads/Category/Cover";
  if($catrow>0){ ?>
   <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Failed!</h4>
                Duplicate Category Not Allowed.
              </div>
              <?php } else{
  $path = "../storage/uploads/Category/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
  $data = array("category_name"=>$category_name,"status"=>$category_status,"category_img"=>$ImageData['file_path'],"img_name"=>$ImageData['file_name']); 
  if($ImageData==false){ ?>
   <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Category Image Oonly jpg,png,jpeg Allow.
              </div>
    <?php } else{
    $Insert = $Base->SaveEdit($data,null,null,'category');
    if($Insert==true && count($ImageData)>0){ ?>
    <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Category Added Successfully.
              </div>
    <?php } else{ ?>
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Category Added Failed, due to some problem.
              </div>
            <?php }  } } ?>            
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
     $Deactive = $Base->ActiveDeactive($id,$status,'category','category_id');
     if($Deactive){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Category DeActivated Successfully.
              </div>
    <?php
  } 
} else if($action=="activate"){
 $active = $Base->ActiveDeactive($id,$status,'category','category_id');
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
  $delete =  $Cat->CategoryDelete($id);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Category Deleted Successfully.
              </div>
    <?php } else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Not Deleted!</h4>
               		Category can not be deleted ,it may have some Product Added so please delete its Products first.
              </div>
  <?php }
   }
//edit form start
  else if($action=="edit"){
  $row = $Base->SelectData('category','category_id',$id); ?>
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
                  <input type="text" name="category_name" value="<?=$row['category_name']?>" class="form-control" required="true">
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
                <input type="file" name="category_img"  class="form-control" accept="image/*" >
              </div>
             
              <!-- /.form-group -->
              <div class="form-group">
             <input type="submit" class="btn btn-success" name="update" value="Update Category">
            </div>
          </div>   
            </form>
          </div>
           </div>
             </div>
            <!-- /.col -->
<?php
if(isset($_POST['update'])){
  $category_name = $_POST['category_name'];
  $category_status = $_POST['category_status'];
  if($_FILES['category_img']['name'] !=''){ 
  $image_tmp_name = $_FILES['category_img']['tmp_name'];
  $image_name = $_FILES['category_img']['name'];
  $path = "../storage/uploads/Category/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type,$id,$row['img_name']);
  $category_img=$ImageData['file_path']; $img_name=$ImageData['file_name'];
  } else{
    $category_img=$row['category_img']; $img_name=$row['img_name'];
  }
  $data = array("category_name"=>$category_name,"status"=>$category_status,"category_img"=>$category_img,"img_name"=>$img_name); 
  $Update = $Base->SaveEdit($data,$id,'category_id','category');
   
 
    if($Update){?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Category Updated Successfully.
              </div>
    <?php }  else{ ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Category Updation Failed, due to some problem.
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
        
        <?php  } else{ ?>  
          <!-- view all category -->        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product Categories</h3>
            </div>
            <a href="category.php?action=add"><button class="btn btn-danger">Add New Category</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  <th>Category Name</th>
                  <th>Category Image</th>
                  <th>Category Cover Image</th>                  
                  <th>Category Status</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php $GetCategory = $Base->SelectDataWithColumn("*",'category'); 
               foreach($GetCategory as $row){ ?>
                <tr>
                
                  <td><?=$row['category_name']?></td>
                  <td><img src="<?=$row['category_img'];?>" style="width:80px;"></td>
                  <td></td>
                  <td> <?php 
                    if($row['status']==0){
                        echo "<img src='Img/status_inactive.png' alt='Inactive' title='Inactive'>";
                      }
                    elseif ($row['status']==1){
                        echo "<img src='Img/status_active.png' alt='active' title='active'>";
                      } 
                    ?></td>
                  <td>
                  	<a href="category.php?action=edit&id=<?=$row['category_id']?>"><button class='btn btn-info'>Edit</button></a>
                    <a href="category.php?action=delete&id=<?=$row['category_id']?>"><button class='btn btn-danger'>Delete</button></a>
                   <?php if($row['status']==0)
                      {?>
                    <a href="category.php?action=activate&id=<?=$row['category_id']?>&status=<?=$row['status']?>"><button class='btn btn-info'>Activate</button></a>
                    <?php  }
                    elseif ($row['status']==1) { ?>
                    <a href="category.php?action=deactivate&id=<?=$row['category_id']?>&status=<?=$row['status']?>"><button class='btn btn-warning'>DeActivate</button></a>
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
  