<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/SellerModal.php";
      include('layouts/head.php');
 ?>

<script>
  function suggestion(model){
         if (model.length == 0) { 
        document.getElementById("showResult").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showResult").innerHTML = this.responseText;
                
            }
        };
        xmlhttp.open("GET", "ajax.php?model=" + model, true);
        xmlhttp.send();
    }
  }
  function change(data){
    document.getElementById('dealModel').value=data;
    document.getElementById('showResult').innerHTML="";
  }
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
<body class="hold-transition skin-blue sidebar-mini" style="z-index: 0;">
<div class="wrapper">
<?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
<?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Prebuy Seller
        <small>Seller</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="dealsetup.php">Deal Setup</a></li>
        <li class="active">Data tables</li>
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
                        $kam = $Base->SelectData("brands",'brand_id',$brand1[$i]);
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
else if($action=="dealsetup"){
$sellerInfo = $Base->SelectData("o_seller",'o_seller_id',$id);
$dealC = $seller->SelectOrderBy("prebuy_deals",'ORDER BY DEAL_ID DESC');
$dealCID = $dealC['deal_id']+1; 

$dealID="DL";
$dealID.="18"; //for the year 2018, need to change it next year ;-)
$dealID.="ID";
$dealID.=$dealCID;
?>

<div class="col-sm-12">
<h3><tt><?=$sellerInfo['o_seller_store']?></tt></h3>
<form method="POST" class="form-group" enctype="multipart/form-data">
<div class="col-sm-6">
<label>Deal Id</label>
<input type="text" name="dealID" class="form-control" value="<?=$dealID;?>" readonly>
<label>Product Model Number</label>
<input type="text" name="dealModel" id="dealModel" class="form-control" onkeyup="suggestion(this.value)">
<div id='showResult' type="none" class="list-group"></div>
<a class="btn"  onclick="window.open('product.php?action=add','newwindow','width=800,height=500,left=150,top=100'); 
              return false;">Add Product</a><br>
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
  
  $dealID = $_POST['dealID'];    //deal ID auto generated
  $dealOwnerId = $id;           // retailer ID

  $dealModel = $_POST['dealModel'];   // model number of product
  $dealPrice = $_POST['dealPrice'];   // regular price
  $dealDiscount = $_POST['dealDiscount']; //dicounted price
  $dealDiscountPer = $_POST['dealDiscountPer']; //discount precentage
  
  $dealOfferImage = $_FILES['dealOfferImage']['name'];   //offer image
  $dealOfferImageT = $_FILES['dealOfferImage']['tmp_name'];   //offer image
  $dealOfferTitle = $_POST['dealOfferTitle'];           //offer title
  $dealOfferDesc  = $_POST['dealOfferDesc'];    //offer description

  $dealEMI = $_POST['dealEMI'];                       //deal EMI
  $dealWarranty = $_POST['dealWarranty'];            // deal warranty
  $dealExchange = $_POST['dealExchange'];           // deal Exchange

  $image_tmp_name = $_FILES['dealOfferImage']['tmp_name'];
  $image_name = $_FILES['dealOfferImage']['name'];
  $path = "../storage/uploads/OfferImage/";
  $image_type = array("png","jpg","jpeg");
  $ImageData = Helper::ImageUpload($image_tmp_name,$image_name,$path,$image_type);
date_default_timezone_set('Asia/Calcutta'); 
$date = date('Y-m-d');
$exp_date = date('Y-m-d', strtotime("+31 days"));
if($ImageData){
  $data = array("deal_s_id"=>$dealID, "dealOwnerId"=>$dealOwnerId, "deal_model_number"=>$dealModel, "deal_mrp"=>$dealPrice, "deal_discount"=>$dealDiscount, "deal_discount_per"=>$dealDiscountPer, "deal_offer_image"=>$ImageData['file_path'], "deal_offer_title"=>$dealOfferTitle, "deal_offer_desc"=>$dealOfferDesc, "deal_emi"=>$dealEMI, "deal_warranty"=>$dealWarranty, "deal_exchange"=>$dealExchange, "deal_status"=>0,"deal_date"=>$date,"exp_date"=>$exp_date);
  $ok = $Base->SaveEdit($data,null,null,'prebuy_deals');
if($ok){
  $update = $Base->SaveEdit(array("o_seller_deal_setup_status"=>1),$id,'o_seller_id','o_seller'); 
$getData = $Base->SelectData("o_seller",'o_seller_id',$id);
$sellerName = $getData['o_seller_name']; 
$to = $getData['o_seller_email'];
$subject = "Deal Approval Request";
$message = "<center><h3>Congratulations</h3></center>
<p>
Dear $sellerName, <br>
Deal is created from our end, please login and verify the deal to make it live.
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
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='dealsetup.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Deal Added successfully.
              </div>

    <?php }
else{
  echo "<script>Some problem occured, please try again</script>";
}

}
else{
  echo "<script>alert('Image uploading problem, try again')</script>";
}

}
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
$result = $Base->SelectDataWithColumn("*",'o_seller','o_seller_payment_status=1 && o_seller_deal_setup_status=0');
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
                    <a href="dealsetup.php?action=view&id=<?=$row['o_seller_id']?>"><button class='btn btn-info'>View</button></a>
                    <a href="dealsetup.php?action=dealsetup&id=<?=$row['o_seller_id']?>"><button class='btn btn-warning'>Add Deals</button></a>
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
  <?php include('layouts/footer.php'); ?>
