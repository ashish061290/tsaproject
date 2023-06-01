<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/SellerModal.php";
      include('layouts/head.php'); ?>
        <script>
        function open(opening){
         var opening = opening;
          document.getElementById('opening').value = opening;
        }
        function close(closeing){
         var closeing = closeing;
         document.getElementById('closeing').value = closeing;
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
      <h1>Seller Enquiry
        <small>Seller Registration</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="seller-enquiry.php">Seller Enquiry</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <?php
    $action= ""; $id="";$table="seller_enquiry";
    if(isset($_GET['action'])){
      $action = $_GET['action'];
    if(isset($_GET['id'])){ $id = $_GET['id']; } 
    }
if($action=="convert"){
$sellerData = $Base->SelectData($table,"seller_enq_id",$id);
$condition = "status=1";
$category = $Base->SelectDataWithColumn("*",'category',$condition);
$caty = json_decode($sellerData['seller_category']);
$condition2 = "ORDER BY o_seller_id DESC";
$sellerO = $Base->dealorderbydesc("o_seller_id","o_seller",$condition2);
$newSellerUID = $sellerO['o_seller_id']+1; 
$sellerUID = "";
$pincode = $sellerData['seller_pincode'];
$sellerUID = rtrim($pincode,substr($pincode,2));
$sellerUID.= @date('y');
$sellerUID.="00";
$sellerUID.=$newSellerUID;
  ?>
  <div class="box box-default">
        <div class="box-header with-border">

        <h3 class="box-title">Seller ID : <?=$sellerUID?></h3>
        </div>
        <div class="box-body" style="z-index:1;">
              <!--Success Message Start, display:none-->
             
              <!--Success Message End-->
<form class="form-group" method="POST">
<div class="col-sm-12" >
<input type="hidden" name="seller_u_id" value="<?=$sellerUID?>" readonly="">  
</div>
<div class="col-sm-6">
  <label>Seller Name</label>
  <input type="text" name="seller_name" class="form-control" value="<?=$sellerData['seller_name']?>">
  <label>Seller Email</label>
  <input type="text" name="seller_email" class="form-control" value="<?=$sellerData['seller_email']?>">
  <label>Seller Contact</label>
  <input type="text" name="seller_contact" class="form-control" value="<?=$sellerData['seller_contact']?>">
  <label>Alternate Number</label>
  <input type="text" name="seller_alt" class="form-control" value="<?=$sellerData['seller_alt_contact']?>">
  <label>Seller Store</label>
  <input type="text" name="seller_store" class="form-control" value="<?=$sellerData['seller_store']?>">
  <label>Categories</label>
<ul type="none">
<?php
 foreach($category as $row){
  if(in_array($row['category_id'], $caty)){
?>
<li>
<input type='checkbox' name='seller_category[]' value='<?=$row['category_id']?>' checked><?=$row['category_name']?>
</li>
<?php 
}
else{
    ?>
<li>
  <input type='checkbox' name='seller_category[]' value='<?=$row['category_id']?>'><?=$row['category_name']?></li>
<?php
  }
 }

?>
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
  <input type="text"  class="form-control" name="seller_area" placeholder="Area" value="<?=$sellerData['seller_city']?>">
  <label>Enter Landmark</label>
  <input class="form-control" name="seller_landmark">
  <label>Enter Pincode</label>
  <input class="form-control" name="seller_pincode" value="<?=$sellerData['seller_pincode']?>">
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
  <td><input type="text" name="monO" id="open" onkeyup="open(this.value)" class="form-control" placeholder="9 AM"></td>
  <td><input type="text" name="monC" id="close" onkeyup="close(this.value)" class="form-control" placeholder="10 PM"></td>
  </tr>
  <tr><td class="bg-green">Tuesday</td>
      <td><input type="text" name="tueO" id="opening" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="tueC" id="closeing" class="form-control" placeholder="10 PM"></td>
  </tr>
  <tr><td class="bg-yellow">Wednesday</td>
      <td><input type="text" name="wedO" id="opening" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="wedC" id="closeing" class="form-control" placeholder="10 PM"></td>
  </tr>
  <tr><td class="bg-green">Thursday</td>
      <td><input type="text" name="thuO" id="opening" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="thuC" id="closeing" class="form-control" placeholder="10 PM"></td>
  </tr>
  <tr><td class="bg-yellow">Friday</td>
      <td><input type="text" name="friO" id="opening" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="friC" id="closeing" class="form-control" placeholder="10 PM"></td>
  </tr>
  <tr><td class="bg-green">Saturday</td>
      <td><input type="text" name="satO" id="opening" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="satC" id="closeing" class="form-control" placeholder="10 PM"></td>
  </tr>
    <tr><td class="bg-yellow">Sunday</td>
      <td><input type="text" name="sunO" class="form-control" placeholder="9 AM"></td>
      <td><input type="text" name="sunC" class="form-control" placeholder="10 PM"></td>
  </tr>
</table>
<button type="submit" name="seller_convert" class="btn btn-block btn-success">Add Seller</button>
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
   $data = array("o_seller_rid"=>$nseller_rid, "o_seller_name"=>$nseller_name, "o_seller_email"=>$nseller_email, "o_seller_contact"=>$nseller_contact, "o_seller_alt"=>$nseller_alt, "o_seller_store"=>$nseller_store, "o_seller_add1"=>$nseller_address1, "o_seller_add2"=>$nseller_address2, "o_seller_city"=>$nseller_area, "o_seller_landmark"=>$nseller_landmark, "o_seller_pincode"=>$nseller_pincode, "o_seller_category"=>$nseller_category, "o_seller_brand"=>$nseller_brand,"o_seller_status"=>1);
   $lastID = $seller->InsertOseller($data,'o_seller');
   $sellerschedule = array("seller_oid"=>$lastID, "seller_rid"=>$nseller_rid, "monO"=>$monO, "monC"=>$monC, "tueO"=>$tueO, "tueC"=>$tueC, "wedO"=>$wedO, "wedC"=>$wedC, "thuO"=>$thuO, "thuC"=>$thuC, "friO"=>$friO, "friC"=>$friC, "satO"=>$satO, "satC"=>$satC, "sunO"=>$sunO, "sunC"=>$sunC);
   $result = $Base->SaveEdit($sellerschedule,null,null,'seller_schedule');
// register a new seller and check whthere this is working or not
if($result){
  $column = 'seller_enq_status';$update = array("seller_enq_status"=>1);
  $update_res = $Base->SaveEdit($update,$id,$column,$table);
  $to = $nseller_email;
  $subject = "Seller Account Activation";
  $message = "<center><h3>Congratulations</h3></center>
<p>
Dear $nseller_name, <br>
Your Account has been activated from our end, you can now access to your portal by using your reatiler Id as username and mobile number as password.
</p><br>
<a href='http://prebuy.brijendrasharma.com/'>Click here to login</a>
username : $nseller_rid,<br>
password : $nseller_contact<br>
<b>Thank you<b><br>
<b>Prebuy Team<b>
<p style='color:red'>Please don not reply to this email, This is system generated mail</p>
<img src='http://prebuy.brijendrasharma.com/images/prebuy_logo.png' style='width:100px;'>";

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
               Seller Converted Successfully. TO add More branches <a href="seller-branch.php?id=<?=$nseller_rid?>">Click Here</a>
              </div><?php } else{ ?>
              <div class="col-sm-12 alert alert-danger alert-dismissible" style="z-index: 1;position:absolute;margin-top:-1000px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller-enquiry.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
               Seller Conversion Error.
              </div><?php } } } ?> </div>
  <?php } else if($action=="sendmail"){
  $column = "seller_enq_id";
  $data = $Base->SelectData($table,$column,$id);
  $name = $data['seller_name']; 
  $to = $data['seller_email'];
  $subject = "Prebuy Welcome Mail";
  $message = "<center><h3>Welcome to Prebuy</h3></center>
<p>
Dear $name, <br>
Thank you for showing your interest in prebuy.in, one of the biggest offer listing platform, our executive will call you in 48 hours.
</p>
<b>Thank you<b><br>
<b>Prebuy Team<b>
<p style='color:red'>Please don not reply to this email, This is system generated mail</p>
<img src='http://Bit7.com/storage/images/prebuy_logo.png' style='width:100px;'>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <yash.mehta.1509@gmail.com>' . "\r\n";
$headers .= 'Cc: ashish.tech1010@gmail.com,yash.mehta.1509@gmail.com' . "\r\n";

$mkc = mail($to,$subject,$message,$headers);
 
 if($mkc){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller-enquiry.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Mail has been Delivered.
              </div>
    <?php
  } 
} 
else if($action=="delete"){
  $delete = $Base->DleteData($table,'seller_enq_id',$id);
  if($delete){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='seller-enquiry.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Enquiry Deleted Successfully.
              </div><?php } } else{ ?>          
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seller Enquiries</h3>
            </div>
<!--            <a href="category.php?action=add"><button class="btn btn-danger">Add New Category</button></a>
             /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Seller Id</th>
                  <th>Seller Name</th>
                  <th>Store Name</th>
                  <th>Contact</th>                                    
                  <th>Category</th>
                  <th>City</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
        <?php
        $Condition="seller_enq_status=0 ORDER BY seller_enq_id DESC";
        $result = $Base->SelectDataWithColumn("*",$table,$Condition);
        $j=0;
        foreach($result as $row){
        $j++;
        $data = json_decode($row['seller_category']);
        ?>
      <tr><td><?=$j?></td>
                  <td><?=$row['seller_name']?></td>
                  <td><?=$row['seller_store']?></td>
                  <td><?=$row['seller_contact']?></td>
                  <td><?php for($i=0;$i<count($data);$i++){
                     $column='category_id';$val=$data[$i];
                     $result = $Base->SelectData('category',$column,$val);
                     echo $result['category_name']."<br>";}?></td>
                  <td><?=$row['seller_city']?></td>
                  <td>
                    <a href="seller-enquiry.php?action=sendmail&id=<?=$row['seller_enq_id']?>"><button class='btn btn-warning'>Send Mail</button></a>
                    <a href="seller-enquiry.php?action=convert&id=<?=$row['seller_enq_id']?>"><button class='btn btn-success' >Convert</button></a>
                    <a href="seller-enquiry.php?action=delete&id=<?=$row['seller_enq_id']?>"><button class='btn btn-danger' >Delete</button></a>
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
  <?php include('layouts/footer.php'); ?>
