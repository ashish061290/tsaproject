<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/SellerModal.php";
      include('layouts/head.php'); ?>
  
<body class="hold-transition skin-blue sidebar-mini" style="z-index: 0;">
<div class="wrapper">

<?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
<?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Prebuy Seller
        <small>Seller</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="slotallotment.php">Seller</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php
  $action= ""; $id="";
  if(isset($_GET['action'])){
  $action = $_GET['action'];
   if(isset($_GET['id'])){ 
  $id = $_GET['id']; 
  $completeData = $Base->SelectData('o_seller','o_seller_id',$id);
  $getBranchData = $seller->GetSellerBranch('seller_branch','sellerb_rid',$completeData['o_seller_rid'],null,null,1);
 $getBranchData2 = $seller->GetSellerBranch('seller_branch','sellerb_rid',$completeData['o_seller_rid'],'ORDER BY `seller_branch_id` DESC',0,1);
  } 
 }
if($action=="view"){
$brand = json_decode($completeData['o_seller_brand']);
$category = json_decode($completeData['o_seller_category']);
$brand1 = json_decode($getBranchData['sellerb_brand']);
$category1 = json_decode($getBranchData['sellerb_cat']);
$brand2 = json_decode($getBranchData2['sellerb_brand']);
$category2 = json_decode($getBranchData2['sellerb_cat']);
?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Seller ID : <?=$completeData['o_seller_rid']?></h3>
        <?php
if($completeData['o_seller_status']==1){ echo "<span class='pull-right badge bg-green'>Active</span>";}
else { echo "<span class='pull-right badge bg-red'>Inactive</span>";}
        ?>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-sm-6">
              <table class="table table-bordered table-striped table-hover">
                <tr style="background-color:#3c8dbc;color:#ffffff;"><th colspan="2">Seller Details</th></tr>
                <tr>
                  <td><b>Seller Name</b></td>
                  <td><?=$completeData['o_seller_name']?></td>
                </tr>
                <tr>
                  <td><b>Store Name</b></td>
                  <td><?=$completeData['o_seller_store']?></td>
                </tr>
                <tr>
                  <td><b>Store Email</b></td>
                  <td><?=$completeData['o_seller_email']?></td>
                </tr>
                <tr>
                  <td><b>Seller Contact</b></td>
                  <td><?=$completeData['o_seller_contact']?></td>
                </tr>
                <tr>
                  <td><b>Alternate Contact</b></td>
                  <td><?=$completeData['o_seller_alt']?></td>
                </tr>
                <tr>
                  <td><b>Seller Address</b></td>
                  <td><?=$completeData['o_seller_add1']." ".$completeData['o_seller_add2']?></td>
                </tr>
                <tr>
                  <td><b>Seller City</b></td>
                  <td><?=$completeData['o_seller_city']?></td>
                </tr>
              </table>
            </div>
            <div class="col-sm-6">
              <div class="col-sm-6">
              <table class="table table-bordered table-striped table-responsive">
                <tr style="background-color:#3c8dbc;color:#ffffff;"><th>Brands</th></tr>
                    <?php
                      for($i=0;$i<count($brand);$i++){
                          $kam = $Base->SelectData("brands",'brand_id',$brand[$i]);
                          echo "<tr><td>".$kam['brand_name']."</td></tr>";
                      }
                    ?>
              </table>  
              </div>
              <div class="col-sm-6">
                <table class="table table-bordered table-striped table-responsive">
                <tr style="background-color:#3c8dbc;color:#ffffff;"><th>Categories</th></tr>
                    <?php
                      for($i=0;$i<count($category);$i++){
                          $kam = $Base->SelectData("category",'category_id',$category[$i]);
                          echo "<tr><td>".$kam['category_name']."</td></tr>";
                      }
                    ?>
              </table>  
              </div>
            </div>
          </div>
          <div class="row">
            <?php
              
              $runRe = $Base->SelectData("seller_schedule",'seller_oid',$id);
            ?>
            <div class="col-sm-12">
              <table class="table table-bordered table-hover">
                <tr style="background-color:#3c8dbc;color:#ffffff;">
                  <th>Days</th>
                  <th>Opening</th>                  
                  <th>Closing</th>                
                </tr>
                <tr>
                  <td class="bg-yellow">Monday</td>
                  <td><?=$runRe['monO']?></td>
                  <td><?=$runRe['monC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-green">Tuesday</td>
                  <td><?=$runRe['tueO']?></td>
                  <td><?=$runRe['tueC']?></td>                                    
                </tr>
                 <tr>
                  <td class="bg-yellow">Wednesday</td>
                  <td><?=$runRe['wedO']?></td>
                  <td><?=$runRe['wedC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-green"> Thursday</td>
                  <td><?=$runRe['thuO']?></td>
                  <td><?=$runRe['thuC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-yellow">Friday</td>
                  <td><?=$runRe['friO']?></td>
                  <td><?=$runRe['friC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-green">Saturday</td>
                  <td><?=$runRe['satO']?></td>
                  <td><?=$runRe['satC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-yellow">Sunday</td>
                  <td><?=$runRe['sunO']?></td>
                  <td><?=$runRe['sunC']?></td>                                    
                </tr>
              </table>
            </div>
          </div>
        </div>
<!--Other Branch 1 Data -->
<div class="box-header bg-light-blue">
  <h3 class="box-title"> Branch 1</h3>
</div>
<div class="box-body">

          <div class="row">
            <div class="col-sm-6">
              <table class="table table-bordered table-striped table-hover">
                <tr style="background-color:#3c8dbc;color:#ffffff;"><th colspan="2">Seller Details</th></tr>
                <tr>
                  <td><b>Seller Name</b></td>
                  <td><?=$getBranchData['sellerb_name']?></td>
                </tr>
                <tr>
                  <td><b>Store Name</b></td>
                  <td><?=$getBranchData['sellerb_store']?></td>
                </tr>
                <tr>
                  <td><b>Store Email</b></td>
                  <td><?=$getBranchData['sellerb_email']?></td>
                </tr>
                <tr>
                  <td><b>Seller Contact</b></td>
                  <td><?=$getBranchData['sellerb_contact']?></td>
                </tr>
                <tr>
                  <td><b>Alternate Contact</b></td>
                  <td><?=$getBranchData['sellerb_alt']?></td>
                </tr>
                <tr>
                  <td><b>Seller Address</b></td>
                  <td><?=$getBranchData['sellerb_add1']." ".$getBranchData['sellerb_add2']?></td>
                </tr>
                <tr>
                  <td><b>Seller City</b></td>
                  <td><?=$getBranchData['sellerb_city']?></td>
                </tr>
              </table>
            </div>
            <div class="col-sm-6">
              <div class="col-sm-6">
              <table class="table table-bordered table-striped table-responsive">
                <tr style="background-color:#3c8dbc;color:#ffffff;"><th>Brands</th></tr>
                    <?php
                      for($i=0;$i<count($brand1);$i++){
                          $kam = $Base->SelectData("brands",'brand_id',$brand[$i]);
                          echo "<tr><td>".$kam['brand_name']."</td></tr>";
                      }
                    ?>
              </table>  
              </div>
              <div class="col-sm-6">
                <table class="table table-bordered table-striped table-responsive">
                <tr style="background-color:#3c8dbc;color:#ffffff;"><th>Categories</th></tr>
                    <?php
                      for($i=0;$i<count($category1);$i++){
                          $kam = $Base->SelectData("category",'category_id',$category1[$i]);
                          echo "<tr><td>".$kam['category_name']."</td></tr>";
                      }
                    ?>
              </table>  
              </div>
            </div>
          </div>
          <div class="row">
            <?php
              
              $runRe = $seller->GetSellerBranch('seller_branch_schedule','seller_brid',$completeData['o_seller_rid'],'ORDER BY seller_branch_id',0,1); 
            ?>
            <div class="col-sm-12">
              <table class="table table-bordered table-hover">
                <tr style="background-color:#3c8dbc;color:#ffffff;">
                  <th>Days</th>
                  <th>Opening</th>                  
                  <th>Closing</th>                
                </tr>
                <tr>
                  <td class="bg-yellow">Monday</td>
                  <td><?=$runRe['monO']?></td>
                  <td><?=$runRe['monC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-green">Tuesday</td>
                  <td><?=$runRe['tueO']?></td>
                  <td><?=$runRe['tueC']?></td>                                    
                </tr>
                 <tr>
                  <td class="bg-yellow">Wednesday</td>
                  <td><?=$runRe['wedO']?></td>
                  <td><?=$runRe['wedC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-green"> Thursday</td>
                  <td><?=$runRe['thuO']?></td>
                  <td><?=$runRe['thuC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-yellow">Friday</td>
                  <td><?=$runRe['friO']?></td>
                  <td><?=$runRe['friC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-green">Saturday</td>
                  <td><?=$runRe['satO']?></td>
                  <td><?=$runRe['satC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-yellow">Sunday</td>
                  <td><?=$runRe['sunO']?></td>
                  <td><?=$runRe['sunC']?></td>                                    
                </tr>
              </table>
            </div>
          </div>
        </div>
        <!--Other Branch 1-->
        <!--Other Branch 2 Data -->
<div class="box-header bg-light-blue">
  <h3 class="box-title"> Branch 2</h3>
</div>
<div class="box-body">

          <div class="row">
            <div class="col-sm-6">
              <table class="table table-bordered table-striped table-hover">
                <tr style="background-color:#3c8dbc;color:#ffffff;"><th colspan="2">Seller Details</th></tr>
                <tr>
                  <td><b>Seller Name</b></td>
                  <td><?=$getBranchData2['sellerb_name']?></td>
                </tr>
                <tr>
                  <td><b>Store Name</b></td>
                  <td><?=$getBranchData2['sellerb_store']?></td>
                </tr>
                <tr>
                  <td><b>Store Email</b></td>
                  <td><?=$getBranchData2['sellerb_email']?></td>
                </tr>
                <tr>
                  <td><b>Seller Contact</b></td>
                  <td><?=$getBranchData2['sellerb_contact']?></td>
                </tr>
                <tr>
                  <td><b>Alternate Contact</b></td>
                  <td><?=$getBranchData2['sellerb_alt']?></td>
                </tr>
                <tr>
                  <td><b>Seller Address</b></td>
                  <td><?=$getBranchData2['sellerb_add1']." ".$getBranchData2['sellerb_add2']?></td>
                </tr>
                <tr>
                  <td><b>Seller City</b></td>
                  <td><?=$getBranchData2['sellerb_city']?></td>
                </tr>
              </table>
            </div>
            <div class="col-sm-6">
              <div class="col-sm-6">
              <table class="table table-bordered table-striped table-responsive">
                <tr style="background-color:#3c8dbc;color:#ffffff;"><th>Brands</th></tr>
                    <?php
                      for($i=0;$i<count($brand2);$i++){
                         
                          $kam = $Base->SelectData("brands",'brand_id',$brand2[$i]);
                          echo "<tr><td>".$kam['brand_name']."</td></tr>";
                      }
                    ?>
              </table>  
              </div>
              <div class="col-sm-6">
                <table class="table table-bordered table-striped table-responsive">
                <tr style="background-color:#3c8dbc;color:#ffffff;"><th>Categories</th></tr>
                    <?php
                      for($i=0;$i<count($category2);$i++){
                          $kam = $Base->SelectData("category",'category_id',$category2[$i]);
                          echo "<tr><td>".$kam['category_name']."</td></tr>";
                      }
                    ?>
              </table>  
              </div>
            </div>
          </div>
          <div class="row">
            <?php
              
              $runRe = $seller->GetSellerBranch('seller_branch_schedule','seller_brid',$completeData['o_seller_rid'],'ORDER BY seller_branch_id',0,1);   
            ?>
            <div class="col-sm-12">
              <table class="table table-bordered table-hover">
                <tr style="background-color:#3c8dbc;color:#ffffff;">
                  <th>Days</th>
                  <th>Opening</th>                  
                  <th>Closing</th>                
                </tr>
                <tr>
                  <td class="bg-yellow">Monday</td>
                  <td><?=$runRe['monO']?></td>
                  <td><?=$runRe['monC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-green">Tuesday</td>
                  <td><?=$runRe['tueO']?></td>
                  <td><?=$runRe['tueC']?></td>                                    
                </tr>
                 <tr>
                  <td class="bg-yellow">Wednesday</td>
                  <td><?=$runRe['wedO']?></td>
                  <td><?=$runRe['wedC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-green"> Thursday</td>
                  <td><?=$runRe['thuO']?></td>
                  <td><?=$runRe['thuC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-yellow">Friday</td>
                  <td><?=$runRe['friO']?></td>
                  <td><?=$runRe['friC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-green">Saturday</td>
                  <td><?=$runRe['satO']?></td>
                  <td><?=$runRe['satC']?></td>                                    
                </tr>
                <tr>
                  <td class="bg-yellow">Sunday</td>
                  <td><?=$runRe['sunO']?></td>
                  <td><?=$runRe['sunC']?></td>                                    
                </tr>
              </table>
            </div>
          </div>
        </div>
        <!--Other Branch 2-->

</div>        
  <?php
}
else if($action=="deactivate"){
     $Deactive= $Base->SaveEdit(array("o_seller_status"=>0),$id,'o_seller_id','o_seller');
 if($Deactive){
 $name = $completeData['o_seller_name']; 
$to = $completeData['o_seller_email'];
$subject = "Account Deactivated";
$message = "<center><h3>Account Deactivated</h3></center>
<p>
Dear $name <br>
Your Account has been Deactivated Due to some confidential reason. Contact Seller Support for more details.
</p>
<b>Thank you<b><br>
<b>Prebuy Team<b>
<p style='color:red'>Please don not reply to this email, This is system generated mail</p>
<img src='http://prebuy.brijendrasharma.com/images/prebuy_logo.png' style='width:100px;'>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <yash.mehta.1509@gmail.com>' . "\r\n";
$headers .= 'Cc: 143brijendra143@gmail.com,yash.mehta.1509@gmail.com' . "\r\n";

$mkc = mail($to,$subject,$message,$headers);  
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Seller DeActivated Successfully.
              </div>
    <?php
  } 
} 
else if($action=="activate"){
 $active= $Base->SaveEdit(array("o_seller_status"=>1),$id,'o_seller_id','o_seller');
 if($active){
$name = $completeData['o_seller_name'];
$to = $completeData['o_seller_email'];
$subject = "Account Activated";
$message = "<center><h3>Account Activated</h3></center>
<p>
Dear $name, <br>
Your Account has been activates on your request. Login into your account with your existing username and password.
</p>
<b>Thank you<b><br>
<b>Prebuy Team<b>
<p style='color:red'>Please don not reply to this email, This is system generated mail</p>
<img src='http://prebuy.brijendrasharma.com/images/prebuy_logo.png' style='width:100px;'>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <yash.mehta.1509@gmail.com>' . "\r\n";
$headers .= 'Cc: 143brijendra143@gmail.com,yash.mehta.1509@gmail.com' . "\r\n";

$mkc = mail($to,$subject,$message,$headers);    
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Seller Activated Successfully.
              </div>
    <?php
  } 

} 
else if($action=="delete"){
  $delete = $Base->DeleteData('o_seller','o_seller_id',$id);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Seller Deleted Successfully.
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
  $row = $Base->SelectData('category','category_id',$id);
 
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
  $category_name =$_POST['category_name'];
  $category_status =$_POST['category_status']; 
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
              <h3 class="box-title">Prebuy Sellers</h3>
            </div>
<!--            <a href="category.php?action=add"><button class="btn btn-danger">Add New Category</button></a>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Seller Id</th>
                  <th>Seller Name</th>
                  <th>Store Name</th>                  
                  <th>Seller Status</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php
   $result = $Base->SelectDataWithColumn("*","o_seller","o_seller_payment_status=0");
   foreach($result as $row){
?>
                <tr>
                  <td><?=$row['o_seller_rid']?></td>
                  <td><?=$row['o_seller_name']?></td>
                  <td><?=$row['o_seller_store']?></td>
                  <td>                    <?php 
                    if($row['o_seller_status']==0)
                      {
                        echo "<img src='Img/status_inactive.png' alt='Inactive' title='Inactive'>";
                      }
                    elseif ($row['o_seller_status']==1) {
                        echo "<img src='Img/status_active.png' alt='active' title='active'>";
                      } 
                    ?></td>
                  <td>
                    <a href="slotallotment.php?action=view&id=<?=$row['o_seller_id']?>"><button class='btn btn-info'>View</button></a>
                    <button class="btn btn-warning"  onclick="window.open('allot.php?id=<?=$row['o_seller_id']?>','newwindow','width=800,height=500,left=150,top=100'); 
              return false;">Allot a SLot</button>
                  </td>
                </tr>
<?php
}
?>
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
