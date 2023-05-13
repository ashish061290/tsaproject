<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/SellerModal.php";
      include('layouts/head.php');
if(isset($_GET['id'])){
  $seller_rid = $_GET['id'];
  $sellerDetail = $Base->SelectData('o_seller','o_seller_rid',$seller_rid);
} ?>
<body class="hold-transition skin-blue sidebar-mini" style="z-index: 0;">
<div class="wrapper">
<?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
<?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Prebuy Seller : <?=$sellerDetail['o_seller_name']?>
        <small><?=$sellerDetail['o_seller_store']?></small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Branch 1</h3>
              <span class="btn btn-primary pull-right"><a href="seller-enquiry.php" style="color:#fff">Back</a></span>
            
            </div>
            <div class="box-body">
           <?php $sellerData = $Base->SelectData('o_seller','o_seller_rid',$seller_rid);
            $allcat = $Base->SelectDataWithColumn('*','category',null,null);
         
              ?>
      <div class="box box-default">
        <div class="box-header with-border">
        </div>
        <div class="box-body" style="z-index:1;">
              <!--Success Message Start, display:none-->
             
              <!--Success Message End-->
<form class="form-group" method="POST">
<div class="col-sm-12" >
<input type="hidden" name="seller_u_id" value="<?=$seller_rid?>" readonly="">  
</div>
<div class="col-sm-6">
  <label>Seller Name</label>
  <input type="text" name="seller_name" class="form-control" value="">
  <label>Seller Email</label>
  <input type="text" name="seller_email" class="form-control" value="">
  <label>Seller Contact</label>
  <input type="text" name="seller_contact" class="form-control" value="">
  <label>Alternate Number</label>
  <input type="text" name="seller_alt" class="form-control" value="">
  <label>Seller Store</label>
  <input type="text" name="seller_store" class="form-control" value="">
  <label>Categories</label>
<ul type="none">
 <?php foreach($allcat as $row){ ?>
<li>
   <input type='checkbox' name='seller_category[]' value='<?=$row['category_id']?>'><?=$row['category_name']?></li>
 <?php } ?>
<li class="list-group-item list-group-item-info">Other Category : <?php if(isset($sellerData['other-cat'])) echo $sellerData['other-cat'];?></li>
<li><button class="btn bg-navy btn-flat margin"  onclick="window.open('category.php?action=add','newwindow','width=800,height=500,left=150,top=100'); 
              return false;">Add Quick Category</button></li>
<li><tt style=' text-transform: uppercase;'>Note : If you add a quick category then you need to refresh this page to make that appear.</tt></li>              
</ul>
</div>
<div class="col-sm-6">
  <label>Address Line 1</label>
  <input type="text"  class="form-control" name="seller_address1" placeholder="Enter Address line 1">
    <label>Address Line 2</label>
  <input type="text"  class="form-control" name="seller_address2" placeholder="Enter Address line 2">
  <label>City</label>
  <input type="text"  class="form-control" name="seller_area" placeholder="Area" value="">
  <label>Enter Landmark</label>
  <input class="form-control" name="seller_landmark">
  <label>Enter Pincode</label>
  <input class="form-control" name="seller_pincode" value="">
   <label>Brands</label>
    <ul type="none">
           <?php $getdata = $Brand->GetBrandList();
                  foreach($getdata as $newO){ ?>
    <li><input class="check-box" name="seller_brands[]" multiple="" type="checkbox" value="<?=$newO['brand_id']?>">
      <?=$newO['brand_name']?></li>
                <?php } ?>
            <li><button class="btn bg-navy btn-flat margin"  onclick="window.open('brands.php?action=add','newwindow','width=800,height=500,left=150,top=100'); 
              return false;">Add Quick Brands</button></li>
          </ul>
</div>
<table class="table table-bordered table-striped table-hover">
  <tr style="background-color:#3c8dbc;color:#ffffff;">
    <th> Days</th>
    <th> Opening Time</th>
    <th> Closing Time</th>
  </tr>
  <tr><td class="bg-yellow">Monday</td>
      <td><input type="text" name="monO" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="monC" class="form-control" placeholder="10 PM"></td>
  </tr>
  <tr><td class="bg-green">Tuesday</td>
      <td><input type="text" name="tueO" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="tueC" class="form-control" placeholder="10 PM"></td>
  </tr>
  <tr><td class="bg-yellow">Wednesday</td>
      <td><input type="text" name="wedO" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="wedC" class="form-control" placeholder="10 PM"></td>
  </tr>
  <tr><td class="bg-green">Thursday</td>
      <td><input type="text" name="thuO" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="thuC" class="form-control" placeholder="10 PM"></td>
  </tr>
  <tr><td class="bg-yellow">Friday</td>
      <td><input type="text" name="friO" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="friC" class="form-control" placeholder="10 PM"></td>
  </tr>
  <tr><td class="bg-green">Saturday</td>
      <td><input type="text" name="satO" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="satC" class="form-control" placeholder="10 PM"></td>
  </tr>
    <tr><td class="bg-yellow">Sunday</td>
      <td><input type="text" name="sunO" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="sunC" class="form-control" placeholder="10 PM"></td>
  </tr>
</table>
<button type="submit" name="seller_branch1" class="btn btn-success">Add Branch</button>
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
  }
$nseller_category =  json_encode($nseller_category);
$nseller_brand = array();
  for($i=0;$i<count($_POST['seller_brands']);$i++){
    $nseller_brand[] =  $_POST['seller_brands'][$i];
  }
$nseller_brand =  json_encode($nseller_brand);
$branchdata = array("sellerb_rid"=>$nseller_rid, "sellerb_name"=>$nseller_name, "sellerb_email"=>$nseller_email, "sellerb_contact"=>$nseller_contact, "sellerb_alt"=>$nseller_alt, "sellerb_store"=>$nseller_store, "sellerb_add1"=>$nseller_address1, "sellerb_add2"=>$nseller_address2, "sellerb_city"=>$nseller_area, "sellerb_landmark"=>$nseller_landmark, "sellerb_pincode"=>$nseller_pincode, "sellerb_cat"=>$nseller_category, "sellerb_brand"=>$nseller_brand, "sellerb_status"=>1);
   $lastID = $seller->InsertOseller($branchdata,'o_seller');
   $sellerschedule = array("seller_oid"=>$lastID, "seller_rid"=>$nseller_rid, "monO"=>$monO, "monC"=>$monC, "tueO"=>$tueO, "tueC"=>$tueC, "wedO"=>$wedO, "wedC"=>$wedC, "thuO"=>$thuO, "thuC"=>$thuC, "friO"=>$friO, "friC"=>$friC, "satO"=>$satO, "satC"=>$satC, "sunO"=>$sunO, "sunC"=>$sunC);
   $result = $Base->SaveEdit($sellerschedule,null,null,'seller_schedule');// register a new seller and check whthere this is working or not
  if($result){ ?>
   <div class="col-sm-12 alert alert-success alert-dismissible" id="seller-success" style="z-index: 1;position:absolute;margin-top:-1000px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Seller Converted Successfully. TO add More branches <a href="seller-branch.php?id=<?=$nseller_rid?>">Click Here</a>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('layouts/footer.php'); ?>