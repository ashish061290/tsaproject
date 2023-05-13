<?php include("../config/config.php");
      include('layouts/head.php');
      include "../lib/BaseModal.php";
      include "../modal/SubCategoryModal.php"; ?>
<body class="hold-transition skin-blue sidebar-mini" style="z-index: 0;">
<div class="wrapper">
<?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
<?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Product Sub Category
        <small>Sub Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="subcategory.php">Subcategory</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php
$action= ""; $id=""; $table="subcategory";$status="";
if(isset($_GET['action'])){
	$action = $_GET['action'];
if(isset($_GET['id'])){	$id = $_GET['id']; }
if(isset($_GET['status'])){	$status = $_GET['status']; } 
}
if($action=="add"){ ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Sub Category</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Choose Category<span style="color:red;">*</span></label>
                   <select name="cat" class="form-control" required="true">
                      <option value="">Select</option>
                      <?php
                          $SelectedColumns="*"; $WhereCondition="status='1'";
                          $result = $Base->SelectDataWithColumn($SelectedColumns,'category',$WhereCondition);
                          foreach($result as $row){ 
                           echo "<option value=".$row['category_id'].">".$row['category_name']."</option>"; } ?>
                  </select>
              </div>
              <div class="form-group">
                <label>Sub Category Name <span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. XYZ" name="sub_category_name" class="form-control" required="true">
              </div>
           <div class="form-group">
                <label>Sub Category Image<span style="color:red;">*</span></label>
                  <input type="file" accpet="images/*" name="sub_category_img" class="form-control" required="true">
              </div>
              <!-- /.form-group -->
                            <div class="form-group">
             <input type="submit" class="btn btn-success" name="submit" value="Add Subcategory">
            </div>
          </div>   
                 </form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
  $image_tmp_name = $_FILES['sub_category_img']['tmp_name'];
  $image_name = $_FILES['sub_category_img']['name'];
  $path = "../storage/uploads/Subcat/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
  $insertdata = array("cat_id"=>$_POST['cat'],"subcat_name"=>$_POST['sub_category_name'],"status"=>1,"img_name"=>$ImageData['file_name'],"subcat_img"=>$ImageData['file_path']);
  $insert = $Base->SaveEdit($insertdata,null,null,$table);
  if($insert){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='subcategory.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                SubCategory Added Successfully.
              </div>
    <?php } else{ ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='subcategory.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
                Some Problem, Please Try Again.
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
else if($action=="deactivate"){
  $Deactive = $Base->ActiveDeactive($id,$status,$table);
  if($Deactive){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Category DeActivated Successfully.
              </div>
    <?php }  } 
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
   $result = $Base->DeleteData($table,'subcat_id',$id);
  if($result){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='subcategory.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               SubCategory Deleted Successfully.
              </div>

    <?php
  }
  else{
 ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='subcategory.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
                Some Problem, Please Try Again.
              </div>
    <?php
}
}
else if($action=="edit")
{ $SelectedColumns="*";
  $WhereCondition="subcat_id='".$id."'";
  $result = $Base->SelectDataWithColumn($SelectedColumns,$table,$WhereCondition);
  foreach($result as $row){ ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update Sub Category</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Choose Category<span style="color:red;">*</span></label>
                   <select name="cat" class="form-control" required="true">
                      <option value="">Select</option>
                      <?php
                            $SelectedColumns="*"; $WhereCondition="status='1'";
                            $result2 = $Base->SelectDataWithColumn($SelectedColumns,'category',$WhereCondition);
                            foreach($result2 as $row2){
                              $selected="";
                              if($row2['category_id']==$row['cat_id']){
                                $selected="selected";
                              } 
                             echo "<option value=".$row2['category_id']." $selected>".$row2['category_name']."</option>"; } 
                             ?>
                  </select>

              </div>
              <div class="form-group">
                <label>Sub Category Name <span style="color:red;">*</span></label>
                  <input type="text" value="<?=$row['subcat_name']?>" name="sub_category_name" class="form-control" required="true">
              </div>
              
              <div class="form-group">
                <label>Sub Category Image<span style="color:red;">*</span></label>
                <div class="from-group">
                  <img src="http://<?=$row['subcat_img'];?>" style="width:100px;">
                </div>  
                <input type="file" name="sub_category_img" class="form-control" accept="image/*" required="true">
              </div>
           
              <!-- /.form-group -->
              <div class="form-group">
             <input type="submit" class="btn btn-success" name="update" value="Update Sub Category">
            </div>
          </div>   
                 </form></div></div></div>
            <!-- /.col -->
<?php } if(isset($_POST['update'])){
       
                     $image_tmp_name = $_FILES['sub_category_img']['tmp_name'];
                     $image_name = $_FILES['sub_category_img']['name'];
                     $path = "../storage/uploads/Subcat/";
                     $image_type = array("png","jpg","jpeg");
                     $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
                     $data=array("cat_id"=>$_POST['cat'],
                     "subcat_name" => $_POST['subcat_name'],"");
                     $updatedata = array("cat_id"=>$_POST['cat'],"subcat_name"=>$_POST['sub_category_name'],"status"=>1,"img_name"=>$ImageData['file_name'],"subcat_img"=>$ImageData['file_path']);
                     
    if($ImageData['file_name']){
    $columnname = "subcat_id";
    $update = $Base->SaveEdit($updatedata,$id,$columnname,$table);
    if($update){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='subcategory.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                SubCategory Updated Successfully.
              </div>
  <?php } } else{  ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='subcategory.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
                Some Problem, Please Try Again.
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
              <h3 class="box-title">Sub Product Categories</h3>
            </div>
            <a href="subcategory.php?action=add"><button class="btn btn-danger">Add New Sub Category</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sub Category Id</th>
                  <th>Category name</th>
                  <th>Sub Category Name</th>
                  <th>IMG</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
      <?php $result = $subcat->GetSubCategory();
      foreach($result as $row){ ?>
                <tr>
                  <td><?=$row['subcat_id']?></td>
                  <td><?=$row['category_name']?></td>
                  <td><?=$row['subcat_name']?></td>   
                  <td><img src="<?=$row['subcat_img']?>" style="width:50px;"></td>               
                  <td>
                  <a href="subcategory.php?action=edit&id=<?=$row['subcat_id']?>"><button class='btn btn-info'>Edit</button></a>
                    <a href="subcategory.php?action=delete&id=<?=$row['subcat_id']?>"><button class='btn btn-danger'>Delete</button></a>
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