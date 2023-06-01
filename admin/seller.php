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
      <h1>Prebuy Seller
        <small>Seller</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="seller.php">Seller</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php
$action= ""; $id="";$table="o_seller";
if(isset($_GET['action'])){
  $action = $_GET['action'];
if(isset($_GET['id'])){ 

  $id = $_GET['id'];
  $completeData = $Base->SelectData($table,"o_seller_id",$id); 
  $Rows = $seller->SelectRows('seller_branch','sellerb_rid',$completeData['o_seller_rid']);
if($Rows>0){
 $getBranchData = $Base->SelectData('seller_branch','sellerb_rid',$completeData['o_seller_rid']);
 $getBranchRow = $Rows;
  $offset='0';
  $limit ='0';
  if($getBranchRow == '2'){
    $offset='0';
    $limit='1'; }
  if($getBranchRow == '1'){
    $offset='1';
    $limit='1'; } 
   $orderby = "ORDER BY `seller_branch_id` DESC";
   $getBranchData2 = $seller->GetSellerBranch('seller_branch','sellerb_rid',$completeData['o_seller_rid'],$orderby,$offset,$limit); } } }
if($action=="view"){
$brand = json_decode($completeData['o_seller_brand']);
$category = json_decode($completeData['o_seller_category']);
if(isset($getBranchData['sellerb_brand'])){
$brand1 = json_decode($getBranchData['sellerb_brand']); }
if(isset($getBranchData['sellerb_cat'])){
$category1 = json_decode($getBranchData['sellerb_cat']); }
if(isset($getBranchData2['sellerb_brand'])){
$brand2 = json_decode($getBranchData2['sellerb_brand']);
} if(isset($getBranchData2['sellerb_cat'])){
$category2 = json_decode($getBranchData2['sellerb_cat']); }
?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Seller ID : <?=$completeData['o_seller_rid']?></h3>
        <?php
if($completeData['o_seller_status']==1){ echo "<span class='pull-right badge bg-green'>Active</span>";}
else { echo "<span class='pull-right badge bg-red'>Inactive</span>"; }
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
                          $kam = $Brand->GetBrandById($brand[$i]);
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
                          $kat = $Base->SelectData('category','category_id',$category[$i]);
                          echo "<tr><td>".$kat['category_name']."</td></tr>";
                      } ?>
              </table>  
              </div>
            </div>
          </div>
          <div class="row">
            <?php $runRe = $Base->SelectData('seller_schedule','seller_oid',$id); ?>
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
                       $count = count($brand1);
                      for($i=0;$i<$count;$i++){
                            $kam = $Brand->GetBrandById($brand1[$i]);
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
                        $cat = $Base->SelectData('category','category_id',$category1[$i]);
                        echo "<tr><td>".$cat['category_name']."</td></tr>";
                      }
                    ?>
              </table>  
              </div>
            </div>
          </div>
          <div class="row">
            <?php $runRe = $seller->GetSellerBranch('seller_branch_schedule','seller_brid',$completeData['o_seller_rid'],'ORDER BY seller_branch_id',0,1); ?>
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
                        $kam = $Brand->GetBrandById($brand2[$i]);
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
                        $cat = $Base->SelectData('category','category_id',$category1[$i]);
                        echo "<tr><td>".$cat['category_name']."</td></tr>";
                      }
                    ?>
              </table>  
              </div>
            </div>
          </div>
          <div class="row">
          <?php $runRe = $seller->GetSellerBranch('seller_branch_schedule','seller_brid',$completeData['o_seller_rid'],'ORDER BY seller_branch_id',0,1); ?>
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
   </div><?php }
//end
//seller edit detail
else
if($action=="edit"){
   $id = $_GET['id'];
   $o_seller_rid = $completeData['o_seller_rid'];
   $sellerUID = $o_seller_rid;
   $getBranchData = $seller->GetSellerBranch('seller_branch','sellerb_rid',$completeData['o_seller_rid'],null,null,1);
$brand = json_decode($completeData['o_seller_brand']);
$category = json_decode($completeData['o_seller_category']);
$brand1 = json_decode($getBranchData['sellerb_brand']);
$category1 = json_decode($getBranchData['sellerb_cat']);
$brand2 = json_decode($getBranchData2['sellerb_brand']);
$category2 = json_decode($getBranchData2['sellerb_cat']);
$sellerData = $Base->SelectData('o_seller','o_seller_id',$id);
$caty = json_decode($sellerData['o_seller_category']);
$branddata = json_decode($sellerData['o_seller_brand']); ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Seller ID : <?=$completeData['o_seller_rid']?></h3>
        <?php
        $o_seller_rid = $completeData['o_seller_rid'];
if($completeData['o_seller_status']==1){ echo "<span class='pull-right badge bg-green'>Active</span>";}
else { echo "<span class='pull-right badge bg-red'>Inactive</span>";}
        ?>
        </div>
        <div class="box-body">
          <form class="form-group" method="POST">
<div class="col-sm-12" >
<input type="hidden" name="seller_u_id" value="<?=$sellerUID?>" readonly="">  
</div>
<div class="col-sm-6">
  <label>Seller Name</label>
  <input type="text" name="seller_name" class="form-control" value="<?=$completeData['o_seller_name']?>">
  <label>Seller Store</label>
  <input type="text" name="seller_store" class="form-control" value="<?=$completeData['o_seller_store']?>">
  <label>Seller Email</label>
  <input type="text" name="seller_email" class="form-control" value="<?=$completeData['o_seller_email']?>">
  <label>Seller Contact</label>
  <input type="text" name="seller_contact" class="form-control" value="<?=$completeData['o_seller_contact']?>">
  <label>Seller Alternate Number</label>
  <input type="text" name="seller_alt" class="form-control" value="<?=$completeData['o_seller_alt']?>">
  <label>Seller Address</label>
  <input type="text" name="seller_store" class="form-control" value="<?=$completeData['o_seller_add1']." ".$completeData['o_seller_add2']?>">
  <label>Seller City</label>
  <input type="text" name="seller_store" class="form-control" value="<?=$completeData['o_seller_city']?>">
  <label>Categories</label>
<ul type="none">
<?php $category = $Base->SelectDataWithColumn("*",'category'); 
      foreach($category as $row){
      if(in_array($row['category_id'], $caty)){ ?>
<li>
<input type='checkbox' name='seller_category[]' value='<?=$row['category_id']?>' checked><?=$row['category_name']?>
</li>
<?php } else{ ?>
<li>
  <input type='checkbox' name='seller_category[]' value='<?=$row['category_id']?>'><?=$row['category_name']?></li>
<?php } } ?>
<li class="list-group-item list-group-item-info">Other Category : <?php if(isset($sellerData['other-cat'])) echo $sellerData['other-cat'];?></li>
<li><button class="btn bg-navy btn-flat margin"  onclick="window.open('category.php?action=add','newwindow','width=800,height=500,left=150,top=100'); 
              return false;">Add Quick Category</button></li>
<li><tt style=' text-transform: uppercase;'>Note : If you add a quick category then you need to refresh this page to make that appear.</tt></li>              
</ul>
</div>
<div class="col-sm-6">
  <label>Address Line 1</label>
  <input type="text"  class="form-control" name="seller_address1" value="<?=$sellerData['o_seller_add1']?>">
    <label>Address Line 2</label>
  <input type="text"  class="form-control" name="seller_address2" value="<?=$sellerData['o_seller_add2']?>">
  <label>City</label>
  <input type="text"  class="form-control" name="seller_area" placeholder="Area" value="<?=$sellerData['o_seller_city']?>">
  <label>Enter Landmark</label>
  <input class="form-control" name="seller_landmark" value="<?=$sellerData['o_seller_landmark']?>">
  <label>Enter Pincode</label>
  <input class="form-control" name="seller_pincode" value="<?=$sellerData['o_seller_pincode']?>">
   <label>Brands</label>
<ul type="none">
   <?php  $result = $Brand->GetBrandList();
   foreach($result as $row){
   if(in_array($row['brand_id'], $branddata)){ ?>
<li>
<input type='checkbox' name='seller_brands[]' value='<?=$row['brand_id']?>' checked><?=$row['brand_name']?>
</li>
<?php } else{ ?>
<li>
  <input type='checkbox' name='seller_brands[]' value='<?=$row['brand_id']?>'><?=$row['brand_name']?></li>
<?php } } ?>
            <li><button class="btn bg-navy btn-flat margin"  onclick="window.open('brands.php?action=add','newwindow','width=800,height=500,left=150,top=100'); 
              return false;">Add Quick Brands</button></li>
          </ul>
</div>
 <div class="row">
            <?php $runRe = $Base->SelectData('seller_schedule','seller_oid',$id);?>
            <div class="col-sm-12">
              <table class="table table-bordered table-hover">
                <tr style="background-color:#3c8dbc;color:#ffffff;">
                  <th>Days</th>
                  <th>Opening</th>                  
                  <th>Closing</th>                
                </tr>
                <tr>
                  <td class="bg-yellow">Monday</td>
                  <td><input type="text" name="monO" id="open1" class="form-control" value="<?=$runRe['monO']?>"></td>
                  <td><input type="text" name="monC" id="close1" class="form-control" value="<?=$runRe['monC']?>"></td>                              
                </tr>
                <tr>
                  <td class="bg-green">Tuesday</td>
                   <td><input type="text" name="tueO" id="opening" class="form-control" value="<?=$runRe['tueO']?>"></td>
                   <td><input type="text" name="tueC" id="closeing" class="form-control" value="<?=$runRe['tueC']?>"></td>                                       
                </tr>
                 <tr>
                  <td class="bg-yellow">Wednesday</td>
                  <td><input type="text" name="wedO"  id="opening" class="form-control" value="<?=$runRe['wedO']?>"></td>
                   <td><input type="text" name="wedC" id="closeing" class="form-control" value="<?=$runRe['wedC']?>"></td>                                 
                </tr>
                <tr>
                  <td class="bg-green"> Thursday</td>
                   <td><input type="text" name="thuO" id="opening" class="form-control" value="<?=$runRe['thuO']?>"></td>
                   <td><input type="text" name="thuC" id="closeing" class="form-control" value="<?=$runRe['thuC']?>"></td>            
                </tr>
                <tr>
                  <td class="bg-yellow">Friday</td>
                   <td><input type="text" name="friO" id="opening" class="form-control" value="<?=$runRe['friO']?>"></td>
                   <td><input type="text" name="friC" id="closeing" class="form-control" value="<?=$runRe['friC']?>"></td>
                 </tr>
                <tr>
                  <td class="bg-green">Saturday</td>
                   <td><input type="text" name="satO" id="opening" class="form-control" value="<?=$runRe['satO']?>"></td>
                   <td><input type="text" name="satC" id="closeing" class="form-control" value="<?=$runRe['satC']?>"></td>       
                 </tr>
                <tr>
                  <td class="bg-yellow">Sunday</td>
                   <td><input type="text" name="sunO" id="open" class="form-control" value="<?=$runRe['sunO']?>"></td>
                   <td><input type="text" name="sunC" id="close" class="form-control" value="<?=$runRe['sunC']?>"></td>       
                </tr>
              </table>
            </div>
          </div>
        </div>
<button type="submit" name="seller_convert" class="btn btn-block btn-success">Update Seller</button>
</div>
</form>
<?php
if(isset($_POST['seller_convert'])){
$nseller_rid = $_POST['seller_u_id'];
$nseller_name = $_POST['seller_name'];
$nseller_email = $_POST['seller_email'];
$nseller_contact = $_POST['seller_contact'];
$nseller_alt = $_POST['seller_alt'];
$nseller_store = $_POST['seller_store'];
$nseller_address1 = $_POST['seller_address1'];
$nseller_address2 = $_POST['seller_address2'];
$nseller_area = $_POST['seller_area'];
$nseller_landmark = $_POST['seller_landmark'];
$nseller_pincode = $_POST['seller_pincode'];

if(isset($_POST['monO'])){ $monO = $_POST['monO']; } else { $monO = ""; }
if(isset($_POST['monC'])){ $monC = $_POST['monC']; } else { $monC = ""; }
if(isset($_POST['tueO'])){ $tueO = $_POST['tueO']; } else { $tueO = ""; }
if(isset($_POST['tueC'])){ $tueC = $_POST['tueC']; } else { $tueC = ""; }
if(isset($_POST['wedO'])){ $wedO = $_POST['wedO']; } else { $wedO = ""; }
if(isset($_POST['wedC'])){ $wedC = $_POST['wedC']; } else { $wedC = ""; }
if(isset($_POST['thuO'])){ $thuO = $_POST['thuO']; } else { $thuO = ""; }
if(isset($_POST['thuC'])){ $thuC = $_POST['thuC']; } else { $thuC = ""; }
if(isset($_POST['friO'])){ $friO = $_POST['friO']; } else { $friO = ""; }
if(isset($_POST['friC'])){ $friC = $_POST['friC']; } else { $friC = ""; }
if(isset($_POST['satO'])){ $satO = $_POST['satO']; } else { $satO = ""; }
if(isset($_POST['satC'])){ $satC = $_POST['satC']; } else { $satC = ""; }
if(isset($_POST['sunO'])){ $sunO = $_POST['sunO']; } else { $sunO = ""; }
if(isset($_POST['sunC'])){ $sunC = $_POST['sunC']; } else { $sunC = ""; }
$nseller_category = array();
  for($i=0;$i<count($_POST['seller_category']);$i++){
    $nseller_category[] =  $_POST['seller_category'][$i];
  }
$nseller_category =  json_encode($nseller_category);
$nseller_brand = array();
  for($i=0;$i<count($_POST['seller_brands']);$i++){
    $nseller_brand[] =  $_POST['seller_brands'][$i];
  }
$nseller_brand =  json_encode($nseller_brand);
  $udata = array("o_seller_name"=>$nseller_name,"o_seller_email"=>$nseller_email,"o_seller_contact"=>$nseller_contact,"o_seller_alt"=>$nseller_alt,"o_seller_store"=>$nseller_store,"o_seller_add1" =>$nseller_address1,"o_seller_add2"=>$nseller_address2,"o_seller_city"=>$nseller_area,"o_seller_landmark" =>$nseller_landmark,"o_seller_pincode"=>$nseller_pincode,"o_seller_category"=>$nseller_category,"o_seller_brand"=>$nseller_brand,"o_seller_status"=>1);
  $result = $Base->SaveEdit($udata,$id,'o_seller_id','o_seller');
  $sdata = array("monO"=>$monO,"monC"=>$monC,"tueO"=>$tueO,"tueC"=>$tueC,"wedO"=>$wedO,"wedC"=>$wedC,"thuO"=>$thuO,"thuC"=>$thuC,"friO"=>$friO,"friC"=>$friC,"satO"=>$satO,"satC"=>$satC,"sunO"=>$sunO,"sunC"=>$sunC);
  $result2 = $Base->SaveEdit($sdada,$id,'seller_oid','seller_schedule');
// register a new seller and check whthere this is working or not
  if($result2 == false){
  array_push($sdata,['seller_oid'=>$id,"seller_rid"=>$o_seller_rid]);
  $result2 = $Base->SaveEdit($sada,null,null,$seller_schedule); 
  }
if($result && $result2){
  $to = $nseller_email;
$subject = "Seller Account Updation";
$message = "<center><h3>Congratulations</h3></center>
<p>
Dear $nseller_name, <br>
Your Account has been Updated from Admin end, you can now access to your portal by using your reatiler Id as username and mobile number as password.
</p><br>
<a href='http://prebuy.brijendrasharma.com/'>Click here to login</a>
username : $nseller_rid,<br>
password : $nseller_contact<br>
<b>Thank you<b><br>
<b>Prebuy Team<b>
<p style='color:red'>Please don not reply to this email, This is system generated mail</p>
<img src='http://Bit7.com/images/prebuy_logo.png' style='width:100px;'>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                                        // More headers
$headers .= 'From: <yash.mehta.1509@gmail.com>' . "\r\n";
$headers .= 'Cc: ashish.tech1010@gmail.com,yash.mehta.1509@gmail.com' . "\r\n";

$mkc = mail($to,$subject,$message,$headers);
if($result){ ?>
 <div class="col-sm-12 alert alert-success alert-dismissible" id="seller-success" style="z-index: 1;position:absolute;margin-top:-1000px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Seller Updated Successfully.
              </div><?php }else{ ?>
              <div class="col-sm-12 alert alert-danger alert-dismissible" style="z-index: 1;position:absolute;margin-top:-1000px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller-enquiry.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
               Seller Conversion Error.
              </div>
    <?php } } } ?>
<!--Other Branch 1 Data -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header bg-light-blue">
  <h3 class="box-title"> Branch 1</h3>
       </div>
            <div class="box-body">
  <?php $sellerData = $Base->SelectData('o_seller','o_seller_rid',$id);  ?>
  <div class="box box-default">
        <div class="box-header with-border">
        </div>
        <div class="box-body" style="z-index:1;">
              <!--Success Message Start, display:none-->
              <!--Success Message End-->
<form class="form-group" method="POST">
<div class="col-sm-12" >
<input type="hidden" name="seller_u_id" value="<?=$getBranchData['sellerb_rid']?>" readonly="">
<input type="hidden" name="seller_branch_id" value="<?php $seller_branch_id = $getBranchData['seller_branch_id']; ?>" readonly="">  
</div>
<div class="col-sm-6">
  <label>Seller Name</label>
  <input type="text" name="seller_name" class="form-control" value="<?=$getBranchData['sellerb_name']?>">
  <label>Seller Email</label>
  <input type="text" name="seller_email" class="form-control" value="<?=$getBranchData['sellerb_email']?>">
  <label>Seller Contact</label>
  <input type="text" name="seller_contact" class="form-control" value="<?=$getBranchData['sellerb_contact']?>">
  <label>Alternate Number</label>
  <input type="text" name="seller_alt" class="form-control" value="<?=$getBranchData['sellerb_alt']?>">
  <label>Seller Store</label>
  <input type="text" name="seller_store" class="form-control" value="<?=$getBranchData['sellerb_store']?>">
  <label>Categories</label>
<ul type="none">
<?php $category = $Base->SelectDataWithColumn("*",'category'); 
      foreach($category as $row){
      if(in_array($row['category_id'], $category1)){ ?>
<li>
<input type='checkbox' name='seller_category[]' value='<?=$row['category_id']?>' checked><?=$row['category_name']?>
</li>
<?php  } else{ ?>
<li>
  <input type='checkbox' name='seller_category[]' value='<?=$row['category_id']?>'><?=$row['category_name']?></li>
<?php } } ?>
<li class="list-group-item list-group-item-info">Other Category : <?php if(isset($sellerData['other-cat'])) echo $sellerData['other-cat'];?></li>
<li><button class="btn bg-navy btn-flat margin"  onclick="window.open('category.php?action=add','newwindow','width=800,height=500,left=150,top=100'); 
              return false;">Add Quick Category</button></li>
<li><tt style=' text-transform: uppercase;'>Note : If you add a quick category then you need to refresh this page to make that appear.</tt></li>              
</ul>
</div>
<div class="col-sm-6">
  <label>Address Line 1</label>
  <input type="text"  class="form-control" name="seller_address1" value="<?=$getBranchData['sellerb_add1']?>">
    <label>Address Line 2</label>
  <input type="text"  class="form-control" name="seller_address2" value="<?=$getBranchData['sellerb_add2']?>">
  <label>City</label>
  <input type="text"  class="form-control" name="seller_area" placeholder="Area" value="<?=$getBranchData['sellerb_city']?>">
  <label>Enter Landmark</label>
  <input class="form-control" name="seller_landmark" value="<?=$getBranchData['sellerb_landmark']?>">
  <label>Enter Pincode</label>
  <input class="form-control" name="seller_pincode" value="<?=$getBranchData['sellerb_pincode']?>">
   <label>Brands</label>
<ul type="none">
            <?php
            $brand = $Brand->GetBrandList();
            foreach($brand as $row){
              if(in_array($row['brand_id'], $brand1)){ ?>
<li>
<input type='checkbox' name='seller_brands[]' value='<?=$row['brand_id']?>' checked><?=$row['brand_name']?>
</li>
<?php } else{ ?>
<li>
  <input type='checkbox' name='seller_brands[]' value='<?=$row['brand_id']?>'><?=$row['brand_name']?></li>
<?php } } ?>
            <li><button class="btn bg-navy btn-flat margin"  onclick="window.open('brands.php?action=add','newwindow','width=800,height=500,left=150,top=100'); 
              return false;">Add Quick Brands</button></li>
          </ul>
</div>
<table class="table table-bordered table-striped table-hover">
  <tr style="background-color:#3c8dbc;color:#ffffff;">
    <th> Days</th>
    <th> Opening Time</th>
    <th> Closing Time</th>
      <?php
       $bid = $getBranchData['seller_branch_id'];
        $getbranch1 = $seller->GetSellerBranch('seller_branch_schedule','seller_branch_id',$bid,'ORDER BY seller_b_s_id DESC',null,1); ?>
  </tr>
  <tr><td class="bg-yellow">Monday</td>
  <td>
  <input type="text" name="monO" class="form-control" value="<?=$getbranch1['monO'];?>" id="open1" onkeypress="open(this.value)">
   </td>
  <td>
  <input type="text" name="monC" class="form-control" value="<?=$getbranch1['monC'];?>" id="close1" onkeypress="close(this.value)">
      </td>
  </tr>
  <tr><td class="bg-green">Tuesday</td>
      <td><input type="text" name="tueO" class="form-control" value="<?=$getbranch1['tueO'];?>" id="open"></td>
      <td><input type="text" name="tueC" class="form-control" value="<?=$getbranch1['tueC'];?>" id="close"></td>
  </tr>
  <tr><td class="bg-yellow">Wednesday</td>
      <td><input type="text" name="wedO" class="form-control" value="<?=$getbranch1['wedO'];?>" id="open"></td>
      <td><input type="text" name="wedC" class="form-control" value="<?=$getbranch1['wedC'];?>" id="close"></td>
  </tr>
  <tr><td class="bg-green">Thursday</td>
      <td><input type="text" name="thuO" class="form-control" value="<?=$getbranch1['thuO'];?>" id="open"></td>
      <td><input type="text" name="thuC" class="form-control" value="<?=$getbranch1['thuC'];?>" id="close"></td>
  </tr>
  <tr><td class="bg-yellow">Friday</td>
      <td><input type="text" name="friO" class="form-control" value="<?=$getbranch1['friO'];?>" id="open"></td>
      <td><input type="text" name="friC" class="form-control" value="<?=$getbranch1['friC'];?>" id="close"></td>
  </tr>
  <tr><td class="bg-green">Saturday</td>
      <td><input type="text" name="satO" class="form-control" value="<?=$getbranch1['satO'];?>" id="open"></td>
      <td><input type="text" name="satC" class="form-control" value="<?=$getbranch1['satC'];?>" id="close"></td>
  </tr>
    <tr><td class="bg-yellow">Sunday</td>
      <td><input type="text" name="sunO" class="form-control" value="<?=$getbranch1['sunO'];?>" id="open"></td>
      <td><input type="text" name="sunC" class="form-control" value="<?=$getbranch1['sunC'];?>" id="close"></td>
  </tr>
</table>
<button type="submit" name="seller_branch1" class="btn btn-success">Update Branch1</button>
</div>
</form>
<?php
if(isset($_POST['seller_branch1'])){

$nseller_rid = $_POST['seller_u_id'];
$nseller_name = $_POST['seller_name'];
$nseller_email = $_POST['seller_email'];
$nseller_contact = $_POST['seller_contact'];
$nseller_alt = $_POST['seller_alt'];
$nseller_store = $_POST['seller_store'];
$nseller_address1 = $_POST['seller_address1'];
$nseller_address2 = $_POST['seller_address2'];
$nseller_area = $_POST['seller_area'];
$nseller_landmark = $_POST['seller_landmark'];
$nseller_pincode = $_POST['seller_pincode'];

if(isset($_POST['monO'])){ $monO = $_POST['monO']; } else { $monO = ""; }
if(isset($_POST['monC'])){ $monC = $_POST['monC']; } else { $monC = ""; }
if(isset($_POST['tueO'])){ $tueO = $_POST['tueO']; } else { $tueO = ""; }
if(isset($_POST['tueC'])){ $tueC = $_POST['tueC']; } else { $tueC = ""; }
if(isset($_POST['wedO'])){ $wedO = $_POST['wedO']; } else { $wedO = ""; }
if(isset($_POST['wedC'])){ $wedC = $_POST['wedC']; } else { $wedC = ""; }
if(isset($_POST['thuO'])){ $thuO = $_POST['thuO']; } else { $thuO = ""; }
if(isset($_POST['thuC'])){ $thuC = $_POST['thuC']; } else { $thuC = ""; }
if(isset($_POST['friO'])){ $friO = $_POST['friO']; } else { $friO = ""; }
if(isset($_POST['friC'])){ $friC = $_POST['friC']; } else { $friC = ""; }
if(isset($_POST['satO'])){ $satO = $_POST['satO']; } else { $satO = ""; }
if(isset($_POST['satC'])){ $satC = $_POST['satC']; } else { $satC = ""; }
if(isset($_POST['sunO'])){ $sunO = $_POST['sunO']; } else { $sunO = ""; }
if(isset($_POST['sunC'])){ $sunC = $_POST['sunC']; } else { $sunC = ""; }
  $nseller_category = array();
  for($i=0;$i<count($_POST['seller_category']);$i++){
    $nseller_category[] =  $_POST['seller_category'][$i];
  } $nseller_category =  json_encode($nseller_category);

  $nseller_brand = array();
  for($i=0;$i<count($_POST['seller_brands']);$i++){
    $nseller_brand[] =  $_POST['seller_brands'][$i];
  }
  $nseller_brand =  json_encode($nseller_brand);
  $data = array("sellerb_name"=>$nseller_name,"sellerb_email"=>$nseller_email,"sellerb_contact"=>$nseller_contact,"sellerb_alt"=>$nseller_alt,"sellerb_store"=>$nseller_store,"sellerb_add1"=>trim($nseller_address1),"sellerb_add2"=>trim($nseller_address2),"sellerb_city"=>$nseller_area,"sellerb_landmark"=>$nseller_landmark,"sellerb_pincode"=>$nseller_pincode,"sellerb_cat"=>$nseller_category,"sellerb_brand"=>$nseller_brand);
   $result1 = $Base->SaveEdit($data,$seller_branch_id,'seller_branch_id','seller_branch');
    if($result1 == false){
      array_push($data,["sellerb_status"=>1]);
      $lastID = $Base->SaveEdit($data,null,null,'seller_branch','last_id');
      if($lastID>0){ $result1=true; }
    }
    $updatschedule = array("monO"=>$monO,"monC"=>$monC,"tueO"=>$tueO,"tueC"=>$tueC,"wedO"=>$wedC,"thuO"=>$thuO,"thuC"=>$thuC,"friO"=>$friO,"satO"=>$satO,"friC"=>$friC,"satC"=>$satC,"sunC"=>$sunC,"sunO"=>$sunO);
    $result2 = $Base->SaveEdit($updatschedule,$seller_branch_id,'seller_branch_id','seller_branch_schedule');
      //nd check whthere this is working or not
  if($result2 == false){
  array_push($updatschedule,['seller_branch_id'=>$lastID,"seller_brid"=>$o_seller_rid]);
   $result2 = $Base->SaveEdit($updatschedule,null,null,'seller_branch_schedule'); }
   if($result1 && $result2){ ?>

 <div class="col-sm-12 alert alert-success alert-dismissible" id="seller-success" style="z-index: 1;position:absolute;margin-top:-1000px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Seller Branch Updated Successfully.
              </div>
            <?php } else{ ?>
              <div class="col-sm-12 alert alert-danger alert-dismissible" style="z-index: 1;position:absolute;margin-top:-1000px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller-enquiry.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
               Seller Conversion Error.
              </div>
           <?php } } ?>
          </div>
             </div>
              </div>
      </div>
    </section>
        <!--Other Branch 1-->
        <!--Other Branch 2 Data -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header bg-light-blue">
      <h3 class="box-title"> Branch 2</h3>
      </div> <div class="box-body">
     <?php $sellerData = $Base->SelectData("o_seller",'o_seller_rid',$id); ?>
  <div class="box box-default">
        <div class="box-header with-border">
        </div>
        <div class="box-body" style="z-index:1;">
              <!--Success Message Start, display:none-->
              <!--Success Message End-->
<form class="form-group" method="POST">
<div class="col-sm-12" >
<input type="hidden" name="seller_u_id" value="<?=$id?>" readonly=""> 
</div>
<div class="col-sm-6">
  <label>Seller Name</label>
  <input type="text" name="seller_name" class="form-control" value="<?=$getBranchData2['sellerb_name']?>">
  <label>Seller Email</label>
  <input type="text" name="seller_email" class="form-control" value="<?=$getBranchData2['sellerb_email']?>">
  <label>Seller Contact</label>
  <input type="text" name="seller_contact" class="form-control" value="<?=$getBranchData2['sellerb_contact']?>">
  <label>Alternate Number</label>
  <input type="text" name="seller_alt" class="form-control" value="<?=$getBranchData2['sellerb_alt']?>">
  <label>Seller Store</label>
  <input type="text" name="seller_store" class="form-control" value="<?=$getBranchData2['sellerb_store']?>">
  <label>Categories</label>
<ul type="none">
<?php
      $result = $Base->SelectDataWithColumn("*",'category');
      foreach($result as $row){
  if(in_array($row['category_id'], $category2)){
?>
<li>
<input type='checkbox' name='seller_category[]' value='<?=$row['category_id']?>' checked><?=$row['category_name']?>
</li>
<?php 
} else{
    ?>
<li>
  <input type='checkbox' name='seller_category[]' value='<?=$row['category_id']?>'><?=$row['category_name']?></li>
<?php } }?>
<li class="list-group-item list-group-item-info">Other Category : <?php if(isset($sellerData['other-cat'])) echo $sellerData['other-cat'];?></li>
<li><button class="btn bg-navy btn-flat margin"  onclick="window.open('category.php?action=add','newwindow','width=800,height=500,left=150,top=100'); 
              return false;">Add Quick Category</button></li>
<li><tt style=' text-transform: uppercase;'>Note : If you add a quick category then you need to refresh this page to make that appear.</tt></li>              
</ul>
</div>
<div class="col-sm-6">
  <label>Address Line 1</label>
  <input type="text"  class="form-control" name="seller_address1" value="<?=$getBranchData2['sellerb_add1']?>">
    <label>Address Line 2</label>
  <input type="text"  class="form-control" name="seller_address2"  value="<?=$getBranchData2['sellerb_add2']?>">
  <label>City</label>
<input type="text"  class="form-control" name="seller_area" placeholder="Area"  value="<?=$getBranchData2['sellerb_city']?>">
  <label>Enter Landmark</label>
  <input class="form-control" name="seller_landmark"  value="<?=$getBranchData2['sellerb_landmark']?>">
  <label>Enter Pincode</label>
  <input class="form-control" name="seller_pincode" value="<?=$getBranchData2['sellerb_pincode']?>">
   <label>Brands</label>
<ul type="none">
                <?php $brand2 = $Brand->GetBrandList();
                      foreach($brand2 as $row){
                      if(in_array($row['brand_id'], $brand2)){ ?>
<li>
<input type='checkbox' name='seller_brands[]' value='<?=$row['brand_id']?>' checked><?=$row['brand_name']?>
</li>
<?php } else{ ?>
<li>
  <input type='checkbox' name='seller_brands[]' value='<?=$row['brand_id']?>'><?=$row['brand_name']?></li>
<?php } } ?>
            <li><button class="btn bg-navy btn-flat margin"  onclick="window.open('brands.php?action=add','newwindow','width=800,height=500,left=150,top=100'); 
              return false;">Add Quick Brands</button></li>
          </ul>
</div>
<table class="table table-bordered table-striped table-hover">
  <tr style="background-color:#3c8dbc;color:#ffffff;">
    <th> Days</th>
    <th> Opening Time</th>
    <th> Closing Time</th>
      <?php $bid = $getBranchData2['seller_branch_id'];
            $getbranch2 = $seller->GetSellerBranch('seller_branch_schedule','seller_branch_id',$bid,'ORDER BY seller_b_s_id DESC',null,1); ?>
  </tr>
  <tr><td class="bg-yellow">Monday</td>
      <td><input type="text" name="monO" class="form-control" value="<?=$getbranch2['monO'];?>"></td>
      <td><input type="text" name="monC" class="form-control" value="<?=$getbranch2['monC'];?>"></td>
  </tr>
  <tr><td class="bg-green">Tuesday</td>
      <td><input type="text" name="tueO" class="form-control" value="<?=$getbranch2['tueO'];?>"></td>
      <td><input type="text" name="tueC" class="form-control" value="<?=$getbranch2['tueC'];?>"></td>
  </tr>
  <tr><td class="bg-yellow">Wednesday</td>
      <td><input type="text" name="wedO" class="form-control" value="<?=$getbranch2['wedO'];?>"></td>
      <td><input type="text" name="wedC" class="form-control" value="<?=$getbranch2['wedC'];?>"></td>
  </tr>
  <tr><td class="bg-green">Thursday</td>
      <td><input type="text" name="thuO" class="form-control" value="<?=$getbranch2['thuO'];?>"></td>
      <td><input type="text" name="thuC" class="form-control" value="<?=$getbranch2['thuC'];?>"></td>
  </tr>
  <tr><td class="bg-yellow">Friday</td>
      <td><input type="text" name="friO" class="form-control" value="<?=$getbranch2['friO'];?>"></td>
      <td><input type="text" name="friC" class="form-control" value="<?=$getbranch2['friC'];?>"></td>
  </tr>
  <tr><td class="bg-green">Saturday</td>
      <td><input type="text" name="satO" class="form-control" value="<?=$getbranch2['satO'];?>"></td>
      <td><input type="text" name="satC" class="form-control" value="<?=$getbranch2['satC'];?>"></td>
  </tr>
    <tr><td class="bg-yellow">Sunday</td>
      <td><input type="text" name="sunO" class="form-control" value="<?=$getbranch2['sunO'];?>"></td>
      <td><input type="text" name="sunC" class="form-control" value="<?=$getbranch2['sunC'];?>"></td>
  </tr>
</table>
<button type="submit" name="seller_branch2" class="btn btn-success">Update Branch2</button>
</div>
</form>
<?php
if(isset($_POST['seller_branch2'])){
$nseller_rid = $_POST['seller_u_id'];
$nseller_name = $_POST['seller_name'];
$nseller_email = $_POST['seller_email'];
$nseller_contact = $_POST['seller_contact'];
$nseller_alt = $_POST['seller_alt'];
$nseller_store = $_POST['seller_store'];
$nseller_address1 = $_POST['seller_address1'];
$nseller_address2 = $_POST['seller_address2'];
$nseller_area = $_POST['seller_area'];
$nseller_landmark = $_POST['seller_landmark'];
$nseller_pincode = $_POST['seller_pincode'];

if(isset($_POST['monO'])){ $monO = $_POST['monO']; } else { $monO = ""; }
if(isset($_POST['monC'])){ $monC = $_POST['monC']; } else { $monC = ""; }
if(isset($_POST['tueO'])){ $tueO = $_POST['tueO']; } else { $tueO = ""; }
if(isset($_POST['tueC'])){ $tueC = $_POST['tueC']; } else { $tueC = ""; }
if(isset($_POST['wedO'])){ $wedO = $_POST['wedO']; } else { $wedO = ""; }
if(isset($_POST['wedC'])){ $wedC = $_POST['wedC']; } else { $wedC = ""; }
if(isset($_POST['thuO'])){ $thuO = $_POST['thuO']; } else { $thuO = ""; }
if(isset($_POST['thuC'])){ $thuC = $_POST['thuC']; } else { $thuC = ""; }
if(isset($_POST['friO'])){ $friO = $_POST['friO']; } else { $friO = ""; }
if(isset($_POST['friC'])){ $friC = $_POST['friC']; } else { $friC = ""; }
if(isset($_POST['satO'])){ $satO = $_POST['satO']; } else { $satO = ""; }
if(isset($_POST['satC'])){ $satC = $_POST['satC']; } else { $satC = ""; }
if(isset($_POST['sunO'])){ $sunO = $_POST['sunO']; } else { $sunO = ""; }
if(isset($_POST['sunC'])){ $sunC = $_POST['sunC']; } else { $sunC = ""; }
$nseller_category = array();
  for($i=0;$i<count($_POST['seller_category']);$i++){
    $nseller_category[] =  $_POST['seller_category'][$i];
  }
$nseller_category =  json_encode($nseller_category);
$nseller_brand = array();
  for($i=0;$i<count($_POST['seller_brands']);$i++){
    $nseller_brand[] =  $_POST['seller_brands'][$i];
  }
$nseller_brand =  json_encode($nseller_brand);
$data = array("sellerb_name"=>$nseller_name,"sellerb_email"=>$nseller_email,"sellerb_contact"=>$nseller_contact,"sellerb_alt"=>$nseller_alt,"sellerb_store"=>$nseller_store,"sellerb_add1"=>$nseller_address1,"sellerb_add2"=>$nseller_address2,"sellerb_city"=>$nseller_area,"sellerb_landmark"=>$nseller_landmark,"sellerb_pincode"=>$nseller_pincode,"sellerb_cat"=>$nseller_category,"sellerb_brand"=>$nseller_brand);
   $result12 = $Base->SaveEdit($data,$seller_branch_id,'seller_branch_id','seller_branch');
  if($result12 == 'false'){
    array_push($data,["sellerb_status"=>1]);
    $lastID = $Base->SaveEdit($data,null,null,'seller_branch','last_id');
    if($lastID>0){ $result12=true; }
  }
   $updatschedule = array("monO"=>$monO,"monC"=>$monC,"tueO"=>$tueO,"tueC"=>$tueC,"wedO"=>$wedC,"thuO"=>$thuO,"thuC"=>$thuC,"friO"=>$friO,"satO"=>$satO,"friC"=>$friC,"satC"=>$satC,"sunC"=>$sunC,"sunO"=>$sunO);
   $result22 = $Base->SaveEdit($updatschedule,$seller_branch_id,'seller_branch_id','seller_branch_schedule');
    //nd check whthere this is working or not
    if($result22 == false){
      array_push($updatschedule,['seller_branch_id'=>$lastID,"seller_brid"=>$o_seller_rid]);
       $result22 = $Base->SaveEdit($updatschedule,null,null,'seller_branch_schedule'); }
       if($result12 && $result22){ ?>
        <div class="col-sm-12 alert alert-success alert-dismissible" id="seller-success" style="z-index: 1;position:absolute;margin-top:-1000px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Seller Branch Updated Successfully.
              </div>
            <?php } else{ ?>
              <div class="col-sm-12 alert alert-danger alert-dismissible" style="z-index: 1;position:absolute;margin-top:-1000px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller-enquiry.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
               Seller Conversion Error.
              </div>
    <?php } } ?>
      </div>
         </div>
          </div>
      </div>
    </section>
        <!--Other Branch 2-->
</div>        
  <?php } else if($action=="deactivate"){
       $Deactive = $Base->SaveEdit(array("o_seller_status"=>0),$id,'o_seller_id','o_seller');
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
  $active = $Base->SaveEdit(array("o_seller_status"=>1),$id,'o_seller_id','o_seller');
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
    <?php  } }  else if($action=="delete"){
  $delete = $Base->DeleteData('o_seller','o_seller_id',$id);
  if($delete){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Seller Deleted Successfully.
              </div>
    <?php } else{?>
      <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='category.php'">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Deleted!</h4>
                  Category can not be deleted ,it may have some sub-category so please delete its sub-category first.
              </div>
          <?php } } else{ ?>          
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Prebuy Sellers</h3>
            </div>
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
                $result = $Base->SelectDataWithColumn("*",$table);
                $i=1;
                foreach($result as $row){
                ?>
                <tr>
                  <td><?=$i?><?php $i=$i+1; ?></td>
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
                    <a href="seller.php?action=view&id=<?=$row['o_seller_id']?>"><button class='btn btn-info'>View</button></a>
                     <a href="seller.php?action=edit&id=<?=$row['o_seller_id']?>"><button class='btn btn-success'>Edit</button></a>
                    <a href="seller.php?action=delete&id=<?=$row['o_seller_id']?>"><button class='btn btn-danger'>Delete</button></a>
                   <?php if($row['o_seller_status']==0)
                      {?>
                    <a href="seller.php?action=activate&id=<?=$row['o_seller_id']?>"><button class='btn btn-info'>Activate</button></a>
                    <?php  }
                    elseif ($row['o_seller_status']==1) { ?>
                    <a href="seller.php?action=deactivate&id=<?=$row['o_seller_id']?>"><button class='btn btn-warning'>DeActivate</button></a>
                    <?php  } 
                    ?>
                  </td>
                </tr><?php } ?>
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
<?php include("layouts/footer.php"); ?>
