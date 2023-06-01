<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/ProductModal.php";
      include('layouts/head.php');
 ?>
<script type="text/javascript">
   function loadSubCat(val){
    //alert('hi');
     if (val.length == 0) { 
        document.getElementById("subct").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("subct").innerHTML = this.responseText;
                
            }
        };
        xmlhttp.open("GET", "ajax.php?subcat=" + val, true);
        xmlhttp.send();
    }
   }
 </script>
<body class="hold-transition skin-blue sidebar-mini" style="z-index: 0;">
<div class="wrapper">
<?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
<?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Products
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="product.php">Products</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php
$action= ""; $id=""; $table="products";
$table2="product_img";$msg="";
  if(isset($_GET['action'])){
  $action = $_GET['action'];
  if(isset($_GET['id'])){ $id = $_GET['id']; } 
  }if($action=="add"){ ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Product</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!--show message-->
          <div class="row">
            <!-- end message box-->
        <form method="POST" enctype="multipart/form-data">
        
            <div class="col-md-12">
              <div class="form-group">
                <label>Product Name<span style="color:red;">*</span></label>
                  <input type="text" placeholder="Product Name" name="product_name" class="form-control" required="true">
              </div>
             
              <div class="form-group">
                <label>Product Category<span style="color:red;">*</span></label>
                  <select class="form-control" name="category_id" value="<?=$productcatrow['category_name']?>" onchange="loadSubCat(this.value)">
                    <option value="">Select Category</option>
                    <?php $SelectedColumns="*"; $WhereCondition="status='1'";
                          $result2 = $Base->SelectDataWithColumn($SelectedColumns,'category',$WhereCondition);
                          foreach($result2 as $row2){
                            echo "<option value=".$row2['category_id'].">".$row2['category_name']."</option>"; } ?>
                  </select>
              </div>
              <div class="form-group">
                <label>Product Image(600px*700px)<span style="color:red;">*</span></label>
                  <input type="file" name="product_image" class="form-control" >
              </div>
              <div class="form-group">
                <label>Product Priority<span style="color:red;">*</span></label>
                 <input type="number" name="priority" class="form-control" />
              </div>
              <div class="form-group">
                <label>Product Long Description<span style="color:red;">*</span></label>
                  <textarea type="text" placeholder="e.g. XYZ" name="product_lg_dcs" id="product_descr" class="form-control" required="true" style="height:150px;"></textarea>
              </div>          
<hr>
<input type="submit" class="btn btn-success" name="submit" value="Add Product">
</form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
  $image_tmp_name = $_FILES['product_image']['tmp_name'];
  $image_name = $_FILES['product_image']['name'];
  $path = "../storage/uploads/Products/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
  $title = str_replace(" ","-",$_POST['product_name']);
  $data = array("product_name"=>$_POST['product_name'],"title"=>$title,"category_id"=>$_POST['category_id'],"priority"=>$_POST['priority'],"product_ldc"=>$_POST['product_lg_dcs'],"product_img"=>$ImageData['file_path'],"img_name"=>$ImageData['file_name']);
  if($ImageData['file_name']){
  $last_id = $Base->SaveEdit($data,null,null,$table);
  } else{ $msg="error"; } } 
  } else if($action=="delete"){
  $column = 'product_id';
  $deleteproduct = $Base->DeleteData($table,$column,$id);
  if($deleteproduct){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='product.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Brand Deleted Successfully.
              </div>

    <?php } else{?>
      <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='product.php'">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Deleted!</h4>
                  Some Error Please Try again...
              </div>
  <?php } }  else if($action=="edit"){
  $condition = "product_id='".$id."'";
  $productrow = $Base->SelectData($table,'product_id',$id);
  $cat = $Base->SelectData('category','category_id',$productrow['category_id']);
  $WhereCondition="status='1'";
  $cat_list = $Base->SelectDataWithColumn("*",'category',$WhereCondition);
  if(!empty($productrow)){ ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update Product</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <div class="row">
            <form method="POST" enctype="multipart/form-data">
            
            <div class="col-md-12">
             
              <div class="form-group">
                <label>Product Name<span style="color:red;">*</span></label>
                  <input type="text" value="<?=$productrow['product_name']?>" name="product_name" class="form-control" required="true">
              </div>
              
              <div class="form-group">
                <label>Product Category<span style="color:red;">*</span></label>
                  <select class="form-control" name="category_id">
                    <option value="">Select Category</option>
                    <?php 
                          foreach($cat_list as $row2){
                            echo "<option value=".$row2['category_id'].">".$row2['category_name']."</option>"; } ?>
                  </select>
              </div>
              <div class="form-group">
                <label>Product Priority<span style="color:red;">*</span></label>
                 <input type="number" name="priority" value="<?=$productrow['priority']?>" class="form-control" />
              </div>
              
              <div class="form-group">
                 <label style="float:right"><img src="<?=$productrow['product_img']?>" width="80" height="80" /></label>
                <label>Product Image<span style="color:red;">*</span></label>
                  <input type="file" name="product_image" class="form-control" accept="image/*" >
              </div>
                
           </div>
              <div class="form-group">
                <label>Product Description<span style="color:red;">*</span></label>
                  <textarea type="text" name="product_lg_dcs" id="product_descr" class="form-control" style="height:150px;"><?=$productrow['product_ldc']?></textarea>
              </div>         
         
      <?php }  ?>
 
  
<hr>
<input type="submit" class="btn btn-success" name="submit" value="Update">
</form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
  $product_name = $_POST['product_name'];
  $product_model = $_POST['product_model'];
  $category_id = $_POST['category_id'];
  $product_subcat = array();           //converting subcategory into json format to store multiple subcat
  $product_lg_dcs = $_POST['product_lg_dcs'];
  if($_FILES['product_image']['name'] !=""){
  $image_tmp_name = $_FILES['product_image']['tmp_name'];
  $image_name = $_FILES['product_image']['name'];
  $path = "../storage/uploads/Products/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
  $imagepath = $ImageData['file_path'];
  $imagename = $ImageData['file_name'];
  } else{
    $imagepath = $productrow['product_img'];
    $imagename = $productrow['img_name'];
  }
  $title = str_replace(" ","-",$_POST['product_name']);
  $data = array("product_name"=>$_POST['product_name'],"title"=>$title,"category_id"=>$_POST['category_id'],"priority"=>$_POST['priority'],"product_ldc"=>$_POST['product_lg_dcs'],"product_img"=>$imagepath,"img_name"=>$imagename);
    $res = $Base->SaveEdit($data,$id,'product_id',$table);
    if($res){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='product.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Product Update Successfully.
              </div>
  <?php }  else{ ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='product.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Product Upload Failed, due to some problem.
              </div>
<?php } } ?>            
           <?php } else if($action==''){ ?>          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product</h3>
            </div>
            <a href="product.php?action=add"><button class="btn btn-danger">Add New Product</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Product Id</th>
                  <th>Product Name</th>
                  <th>Product Category</th>
                  <th>Image</th>
                  <th>Description</th> 
                  <th>Status</th>                                    
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php
$i=0;
$result = $Base->SelectDataWithColumn("*",$table,$WhereCondition="");
// $fetch_seller = "SELECT * FROM   `product` ORDER BY `product_id` DESC";
foreach($result as $row){
  $cat = $Base->SelectData('category','category_id',$row['category_id']);
$i++;
?>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$row['product_name']?></td>
                  <td><?=$cat['category_name']?></td>
                  <td><img src="<?=$row['product_img'] ?>" width="100" height="100"/></td>
                  <td><?=$row['product_ldc']?></td>
                  <td><?php 
                    if($row['status']==0)
                      {
                        echo "<p style='color:red;'>Pending</p>";
                      }
                    elseif ($row['status']==1) {
                        echo "<p style='color:green;'>Live on Website</p>";
                      }
                    ?></td>
                  <td>
                    
                    <a href="product.php?action=edit&id=<?=$row['product_id']?>"><button class='btn btn-info'>Edit</button></a>
                    <a href="product.php?action=delete&id=<?=$row['product_id']?>"><button class='btn btn-danger'>Delete</button></a>
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
  <script src="<?php echo ADMINASSETS ?>ckeditor/ckeditor.js" ></script>
  <script type="text/javascript">
	
		// Initialize CKEditor
		//CKEDITOR.inline( 'short_desc');

		CKEDITOR.replace('product_descr',{
			    //width: "500px",
        	height: "200px"
   
		}); 
	
    	
	</script>
<?php include('layouts/footer.php'); ?>
