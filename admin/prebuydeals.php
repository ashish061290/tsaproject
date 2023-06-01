<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/DealModal.php";
      include('layouts/head.php');
 ?>
<script>
  function suggestion(model){
         if(model.length == 0){ 
        document.getElementById("showResult1").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
                document.getElementById("showResult1").innerHTML = this.responseText; } };
        xmlhttp.open("GET", "ajax.php?model=" + model, true);
        xmlhttp.send();
    }
  }
  function change(data){
    document.getElementById('dealModel').value=data;
    document.getElementById('showResult1').innerHTML=""; }
  function calculate(dealDiscount){
    var a = dealDiscount;
    a = parseInt(a);
    var b = document.getElementById('dealPrice').value;
    b = parseInt(b);
    a = b-a;
    var Percent = (a*100)/b;
    document.getElementById('dealDiscountPer').value=Percent+"%";
  }
</script>   
<script>
   // function change(val)
   // {
    //  var value = val;
     //  if(value>0)
      // {
       // document.getElementById('dealDiscount').value=0;
      // }
   // }
</script>      
<body class="hold-transition skin-blue sidebar-mini" style="z-index: 0;">
<div class="wrapper">
<?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
<?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Prebuy Deals
        <small>Deals</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php
$action= ""; $id=""; $table="prebuy_deals";$table2="o_seller";
if(isset($_GET['action'])){
	$action = $_GET['action'];
if(isset($_GET['id'])){	$id = $_GET['id']; } 
}
if($action=="add"){ 
  $condition="status=1";
  $sellerinfo = $Base->SelectDataWithColumn("*",$table2,$condition);
  $condition2 = "ORDER BY `deal_id` DESC";
  $dealC = $deal->dealorderbydesc("*",$table,$condition2);
  $dealCID = $dealC['deal_id']+1; 
  $dealID="DL";
  $dealID.="23"; //for the year 2018, need to change it next year ;-)
  $dealID.="ID";
  $dealID.=$dealCID;
?>

<div class="col-sm-12">
<h3><tt><?php //echo $sellerInfo['o_seller_store'] ?></tt></h3>
<form method="POST" class="form-group" enctype="multipart/form-data">
<div class="col-sm-6">
<label>Deal Id</label>
<input type="text" name="dealID" class="form-control" value="<?=$dealID;?>" readonly>
<label>Select Seller</label>
<select name="sellerID" class="form-control" required>
  <option value="">--Select Seller--</option>
  <?php foreach($sellerinfo as $seller){ ?>
     <option value="<?=$seller['o_seller_id']?>"><?=$seller['o_seller_store']?></option>  
  <?php } ?>
</select>
<!--<input type="text" name="sellerID" class="form-control" placeholder="Seller ID">-->
<label>Product Model Number</label>
<input type="text" name="dealModel" id="dealModel" class="form-control" onkeyup="suggestion(this.value)">
<div id='showResult1' type="none" class="list-group"></div>
<a class="btn"  onclick="window.open('product.php?action=add','newwindow','width=800,height=500,left=150,top=100'); return false;">Add Product</a><br>
<label>Other Offers </label>
<label>Image</label>
<input type="file" name="dealOfferImage" id="dealOfferImage" class="form-control" accept="image/*">
<label>Title</label>
<input type="text" name="dealOfferTitle" id="dealOfferTitle" class="form-control" placeholder="Title">
<label>Description</label>
<input type="text" name="dealOfferDesc" id="dealOfferDesc" class="form-control" placeholder="Description"> 
<hr>             
</div>
<!--Another Column of 50% screen-->
<div class="col-sm-6" >
<label>MRP</label>
<input type="number" name="dealPrice" id="dealPrice" class="form-control">
<label>Discount Price</label>
<input type="number" name="dealDiscount" id="dealDiscount" class="form-control" onkeyup="calculate(this.value)">
<label>Discount Percent</label>
<input type="text" name="dealDiscountPer" class="form-control" id="dealDiscountPer">
<label>EMI</label>
<input type="text" name="dealEMI" class="form-control" placeholder="available, not available">
<label>Extended Warranty Schemes</label>
<input type="text" name="dealWarranty" class="form-control" placeholder="description">
<label>Exchange</label>
<input type="text" name="dealExchange" class="form-control" placeholder="description">
</div>
<div class="col-sm-12">
<input type="submit" name="dealsubmit" class="btn btn-success">
</div>
</form>
</div>
<?php
if(isset($_POST['dealsubmit'])){
  $column="o_seller_rid";
  $rtgs= $Base->SelectData('o_seller',$column,$_POST['sellerID']);
  $dealID = $_POST['dealID'];    //deal ID auto generated
  $dealOwnerId = $rtgs['o_seller_id'];           // retailer ID
  $dealModel = $_POST['dealModel'];   // model number of product
  $dealPrice = $_POST['dealPrice'];   // regular price
  $dealDiscount = $_POST['dealDiscount']; //dicounted price
  $dealDiscountPer = $_POST['dealDiscountPer']; //discount precentage
  $dealOfferTitle = $_POST['dealOfferTitle'];           //offer title
  $dealOfferDesc  = $_POST['dealOfferDesc'];    //offer description
  $dealEMI = $_POST['dealEMI'];                       //deal EMI
  $dealWarranty = $_POST['dealWarranty'];            // deal warranty
  $dealExchange = $_POST['dealExchange'];           // deal Exchange
  $image_tmp_name = $_FILES['dealOfferImage']['tmp_name']; //offer image
  $image_name = $_FILES['dealOfferImage']['name'];
  $path = "../storage/uploads/OfferImage/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
  $date = date('Y-m-d');
  $exp_date = date('Y-m-d',strtotime('+31 days'));
  $dealsdata = array("deal_s_id"=>$dealID,"dealOwnerId"=>$dealOwnerId,"deal_model_number"=>$dealModel,"deal_mrp"=>$dealPrice, "deal_discount"=>$dealDiscount, "deal_discount_per"=>$dealDiscountPer, "deal_offer_image"=>$ImageData['file_path'], "deal_offer_title"=>$dealOfferTitle, "deal_offer_desc"=>$dealOfferDesc, "deal_emi"=>$dealEMI, "deal_warranty"=>$dealWarranty, "deal_exchange"=>$dealExchange, "deal_status"=>0,"deal_date"=>$date,"exp_date"=>$exp_date);
  $ok = $Base->SaveEdit($dealsdata,null,null,$table);
  if($ok){
$sellerName = $rtgs['o_seller_name']; 
$to = $rtgs['o_seller_email'];
$subject = "Deal Approval Request";
$message = "<center><h3>Congratulations</h3></center>
<p>
Dear $sellerName, <br>
Deal is created from our end, please login and verify the deal to make it live.
</p><br>
<b>Thank you<b><br>
<b>Prebuy Team<b>
<p style='color:red'>Please don not reply to this email, This is system generated mail</p>
<img src='http://Bit7.com/prebuy/images/prebuy_logo.png' style='width:100px;'>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                                      // More headers
//$headers .= 'From: <yash.mehta.1509@gmail.com>' . "\r\n";
$headers .= 'From: <ashish.simption@gmail.com>' . "\r\n";
$headers .= 'Cc: ashish.tech1010@gmail.com,ashish.simption@gmail.com' . "\r\n";
$report = mail($to,$subject,$message,$headers);
?>
 <div class="col-sm-12 alert alert-success alert-dismissible" id="seller-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='prebuydeals.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Deal Added successfully.
              </div>

    <?php
}
else{
  echo "<script>Some problem occured, please try again</script>";
} }  }
else if($action=="deactivate"){ 
 $DeActivateQuery = "UPDATE `category` SET `category_status`=0 WHERE `prod_cat_id`='".$id."' ";
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
$ActivateQuery = "UPDATE `category` SET `category_status`=1 WHERE `prod_cat_id`=$id";
$active = mysqli_query($conn,$ActivateQuery);
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
  $id = $_GET['id'];
  $o_seller_id = "SELECT * FROM `prebuy_deals` WHERE `deal_id`='".$id."'";
   $o_seller_data = mysqli_query($conn,$o_seller_id);
   $o_seller_row = mysqli_fetch_assoc($o_seller_data);
   $o_seller_id = $o_seller_row['dealOwnerId'];
   $deal_id = $o_seller_row['deal_s_id']; 
   $deal_img = $o_seller_row['deal_offer_image'];
$sellerInfoQ = "SELECT * FROM `o_seller` WHERE `o_seller_id`='".$o_seller_id."'";
$queryR = mysqli_query($conn,$sellerInfoQ);
$sellerInfo = mysqli_fetch_assoc($queryR);
?>

<div class="col-sm-12">
<h3><tt><?=$sellerInfo['o_seller_store']?></tt></h3>
<form method="POST" class="form-group" enctype="multipart/form-data">
<div class="col-sm-6">
<label>Deal Id</label>
<input type="text" name="dealID" class="form-control" value="<?=$deal_id;?>" readonly>
<label>SELLER Id</label>
<input type="text" name="sellerID" class="form-control" value="<?=$sellerInfo['o_seller_rid'];?>" readonly>
<label>Product Model Number</label>
<input type="text" name="dealModel" id="dealModel" class="form-control" value="<?php echo $o_seller_row['deal_model_number'];?>" onkeyup="suggestion(this.value)" required>
<div id='showResult1' type="none" class="list-group"></div>
<a class="btn"  onclick="window.open('product.php?action=add','newwindow','width=800,height=500,left=150,top=100'); 
              return false;">Add Product</a><br>
     <label style="float:right;"><img src="../offerImage/<?=$deal_img ?>" width="100" height="100"/></label>
<label> Offers </label>
<label>Image</label>
<input type="file" name="dealOfferImage" id="dealOfferImage" class="form-control" accept="image/*">
<label>Title</label>
<input type="text" name="dealOfferTitle" id="dealOfferTitle" class="form-control" value="<?=$o_seller_row['deal_offer_title']?>">
<label>Description</label>
<input type="text" name="dealOfferDesc" id="dealOfferDesc" class="form-control" value="<?=$o_seller_row['deal_offer_desc']?>"> 
<hr>             
</div>
<!--Another Column of 50% screen-->
<div class="col-sm-6" >
<label>MRP</label>
<input type="number" name="dealPrice" id="dealPrice" class="form-control" value="<?=$o_seller_row['deal_mrp']?>">
<label>Discount Price</label>
<input type="number" name="dealDiscount" id="dealDiscount" class="form-control" value="<?php echo $o_seller_row['deal_discount']; ?>" onkeyup="calculate(this.value)">
<label>Discount Percent</label>
<input type="text" name="dealDiscountPer" class="form-control" id="dealDiscountPer" value="<?php echo round($o_seller_row['deal_discount_per']); ?>%" readonly>
<label>EMI</label>
<input type="text" name="dealEMI" class="form-control" placeholder="available, not available" value="<?php echo  $o_seller_row['deal_emi']; ?>">
<label>Extended Warranty Schemes</label>
<input type="text" name="dealWarranty" class="form-control" placeholder="description" value="<?php echo  $o_seller_row['deal_warranty']; ?>">
<label>Exchange</label>
<input type="text" name="dealExchange" class="form-control" placeholder="description" value="<?php echo  $o_seller_row['deal_exchange']; ?>">
</div>
<div class="col-sm-12">
<input type="submit" name="dealsubmit" class="btn btn-success">
</div>
</form>
</div>
<?php
if(isset($_POST['dealsubmit'])){
$rt = "SELECT * FROM `o_seller` WHERE `o_seller_rid`='".$_POST['sellerID']."'";
$rtg = mysqli_query($conn,$rt);
$rtgs = mysqli_fetch_assoc($rtg);
  $dealID = $_POST['dealID'];    //deal ID auto generated
  $dealOwnerId = $rtgs['o_seller_id'];           // retailer ID

  $dealModel = $_POST['dealModel'];   // model number of product
  $dealPrice = $_POST['dealPrice'];   // regular price
  $dealDiscount = $_POST['dealDiscount']; //dicounted price
  $dealDiscountPer = $_POST['dealDiscountPer']; //discount precentage
  
  $dealOfferImage = $_FILES['dealOfferImage']['name'];
   if($dealOfferImage == '')
   {
    $dealOfferImage = $o_seller_row['deal_offer_image'];
   }   //offer image
  $dealOfferImageT = $_FILES['dealOfferImage']['tmp_name'];   //offer image
  $dealOfferTitle = $_POST['dealOfferTitle'];           //offer title
  $dealOfferDesc  = $_POST['dealOfferDesc'];    //offer description

  $dealEMI = $_POST['dealEMI'];                       //deal EMI
  $dealWarranty = $_POST['dealWarranty'];            // deal warranty
  $dealExchange = $_POST['dealExchange'];           // deal Exchange

$target = "../offerImage/";
$upload =  move_uploaded_file($dealOfferImageT, $target.$dealOfferImage);
  $date = date('d-m-Y');
  $sql = "UPDATE `prebuy_deals` SET `deal_model_number`='$dealModel',`deal_mrp`='$dealPrice',`deal_discount`='$dealDiscount',`deal_discount_per`='$dealDiscountPer',`deal_offer_image`='$dealOfferImage',`deal_offer_title`='$dealOfferTitle',`deal_offer_desc`='$dealOfferDesc',`deal_emi`='$dealEMI',`deal_warranty`='$dealWarranty',`deal_exchange`='$dealExchange' WHERE deal_s_id='$dealID'";
  //$sql = "INSERT INTO `prebuy_deals`(`deal_s_id`, `dealOwnerId`, `deal_model_number`, `deal_mrp`, `deal_discount`, `deal_discount_per`, `deal_offer_image`, `deal_offer_title`, `deal_offer_desc`, `deal_emi`, `deal_warranty`, `deal_exchange`, `deal_status`) VALUES ('".$dealID."','".$dealOwnerId."','".$dealModel."','".$dealPrice."','".$dealDiscount."','".$dealDiscountPer."','".$dealOfferImage."','".$dealOfferTitle."','".$dealOfferDesc."','".$dealEMI."','".$dealWarranty."','".$dealExchange."',0,'$date')";
$ok = mysqli_query($conn,$sql);
if($ok){
    $updatedeal = "UPDATE `prebuy_deals` SET `deal_status`='0' WHERE deal_id='$id'";
     $update = mysqli_query($conn,$updatedeal);
$sellerName = $rtgs['o_seller_name']; 
$to = $rtgs['o_seller_email'];
$subject = "Deal Approval Request";
$message = "<center><h3>Congratulations</h3></center>
<p>
Dear $sellerName, <br>
Deal is Updated from Admin end, please login and verify the deal to make it live.
</p><br>
<b>Thank you<b><br>
<b>Prebuy Team<b>
<p style='color:red'>Please don not reply to this email, This is system generated mail</p>
<img src='http://prebuy.brijendrasharma.com/images/prebuy_logo.png' style='width:100px;'>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                                        // More headers
$headers .= 'From: <yash.mehta.1509@gmail.com>' . "\r\n";
$headers .= 'Cc: 143brijendra143@gmail.com,yash.mehta.1509@gmail.com' . "\r\n";

$report = mail($to,$subject,$message,$headers);
?>
 <div class="col-sm-12 alert alert-success alert-dismissible" id="seller-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='prebuydeals.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Deal Added successfully.
              </div>

    <?php
}
else{
  echo "<script>Some problem occured, please try again</script>";
}




} 
}
//view
else if($action=="view"){
  $getdeals = $Base->SelectData($table,'deal_id',$id);
  $o_seller_id = $getdeals['dealOwnerId'];
  $o_seller_row = $Base->SelectData('o_seller','o_seller_id',$o_seller_id);
  $getProduct = $Base->SelectData('product','product_model',$getdeals['deal_model_number']); ?>
<div class="box box-default">
        <div class="box-header with-border">
         <h3 class="box-title">Seller ID : <?=$o_seller_row['o_seller_rid']?></h3>
<?php if($getdeals['deal_status']==1){ echo "<span class='pull-right badge bg-green'>Active</span>";}
else { echo "<span class='pull-right badge bg-red'>Inactive</span>";} ?>
        </div>
        <div class="box-body">
          <div class="col-sm-6">
    <table class="table table-bordered table-striped table-hover">
      <tr>
  <td colspan="2" align="center">
<img src="<?=$getdeals['deal_offer_image']?>" style="width:100px;">
  </td>
</tr>
      <tr><th>Deal MRP</th><td><?=$getdeals['deal_mrp']?></td></tr>
      <tr><th>Deal Discount</th><td><?=$getdeals['deal_discount']?></td></tr>      
      <tr><th>Discount Percent</th><td><?=$getdeals['deal_discount_per']?>%</td></tr>
<tr><th>Offer Title</th><td><?=$getdeals['deal_offer_title']?></td></tr>
<tr><th>Offer Description</th><td><?=$getdeals['deal_offer_desc']?></td></tr>
<tr><th>Deal EMI</th><td><?=$getdeals['deal_emi']?></td></tr>
<tr><th>Deal Warranty</th><td><?=$getdeals['deal_warranty']?></td></tr>
<tr><th>Deal Exchange</th><td><?=$getdeals['deal_exchange']?></td></tr>                  
    </table>
          </div>
          <div class="col-sm-6">
            <table class="table table-striped table-bordered">
             <tr>        
  <td colspan="2" align="center">
<img src="<?=$getProduct['product_img']?>" style="width:100px;">
  </td>
             </tr>
              <tr>
                <td>Product Name</td><td><?=$getProduct['product_name']?></td>
              </tr>
              <tr>
                <td>Product Model</td><td><?=$getProduct['product_model']?></td>
              </tr>
              <tr>
                <td>Product Brand</td><td><?=$getProduct['product_brand']?></td>
              </tr>
              <tr>
                <td>Product Size</td><td><?=$getProduct['product_size']?></td>
              </tr>
              <tr>
                <td>Product OS</td><td><?=$getProduct['product_OS']?></td>
              </tr>
              <tr>
                <td>Product Storage</td><td><?=$getProduct['product_storage']?></td>
              </tr>
              <tr>
                <td style="word-wrap: break-word;width: 50%;">Product Short Description</td><td><?=$getProduct['product_sdc']?></td>
              </tr>
              <tr>
                <td style="word-wrap: break-word;width: 50%;">Product Long Description</td><td><?=$getProduct['product_ldc']?></td>
              </tr>                                                                                                  
            </table>
          </div>
        </div>

</div>        
  <?php
}
//view end
else if($action==''){
?>          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">PREBUY DEALS</h3>
            </div>
            <a href="prebuydeals.php?action=add"><button class="btn btn-danger">Add New Deal</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Deal Id</th>
                  <th>Product Name</th>
                  <th>Discount</th>
                  <th>Store</th>                  
                  <th>Deal Status</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php
              $i=0;
              $result  = $Base->SelectDataWithColumn("*",$table,$WhereCondition="");
              foreach($result as $row){
              $i=$i+1;
              $getPro = $Base->SelectData("product",'product_model',$row['deal_model_number']);
              $store = $Base->SelectData('o_seller','o_seller_id',$row['dealOwnerId']);
              ?>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$row['deal_s_id']?></td>
                  <td><?=$getPro['product_name']?></td>
                  <td><?=round($row['deal_discount_per'])?>% </td>
                  <td><?=$store['o_seller_store']?></td>
                  <td><?php 
                    if($row['deal_status']==0)
                      {
                        echo "<p style='color:red;'>Pending Approval</p>";
                      }
                    elseif ($row['deal_status']==1) {
                        echo "<p style='color:green;'>Live on Website</p>";
                      }
                    elseif ($row['deal_status']==2) {
                        echo "<p style='color:orange;'>Edit Requested</p>";
                      } 
                    ?></td>
                  <td>
                    <a href="prebuydeals.php?action=view&id=<?=$row['deal_id']?>"><button class='btn btn-success'>View</button></a>
                     <?php if($row['deal_status']==2)
                     { ?>
                  	<a href="prebuydeals.php?action=edit&id=<?=$row['deal_id']?>"><button class='btn btn-info'>Edit</button></a>
                    <?php } ?>
                    <a href="prebuydeals.php?action=delete&id=<?=$row['deal_id']?>"><button class='btn btn-danger'>Delete</button></a>
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
  <?php include('layouts/footer.php');  ?>