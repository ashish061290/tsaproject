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
      <h1> Edit Request
        <small>Deals</small>
      </h1>
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


} 
}
if($action=="view") {
  //get deal details here
$dealDetails = $Base->SelectData("prebuy_deals",'deal_id',$id);
//get owner details here
$owner = $Base->SelectData("o_seller",'o_seller_id',$dealDetails['dealOwnerId']);
//get Product Details
$product = $Base->SelectData("product",'product_model',$dealDetails['deal_model_number']);
?>
<div class="col-sm-12">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class=""><a href="#activity" data-toggle="tab" aria-expanded="false">Deal Details</a></li>
<li class="active"><a href="#timeline" data-toggle="tab" aria-expanded="true">Product Details</a></li>
<li class=""><a  onclick="window.open('seller.php?action=view&id=<?=$owner['o_seller_id']?>','newwindow','width=800,height=500,left=150,top=100'); 
              return false;" data-toggle="tab" aria-expanded="false">Seller Details</a></li>
</ul>
            <div class="tab-content">
              <div class="tab-pane" id="activity">
                <!-- Post -->
            <table class="table table-striped table-bordered table-responsive">
              <tr>
                <td>Deal ID</td>
                <td><?=$dealDetails['deal_s_id']?></td>                
              </tr>
               <tr>
                <td>Product Model Number</td>
                <td><?=$dealDetails['deal_model_number']?></td>                
              </tr>
               <tr>
                <td>MRP</td>
                <td><?=$dealDetails['deal_mrp']?></td>                
              </tr>
               <tr>
                <td>Discount Price</td>
                <td><?=$dealDetails['deal_discount']?></td>                
              </tr>
               <tr>
                <td>Discount Percentage</td>
                <td><?=$dealDetails['deal_discount_per']?> %</td>                
              </tr>
              <tr>
                <td>Offer Title</td>
                <td><?=$dealDetails['deal_offer_title']?> %</td>                
              </tr>
              <tr>
                <td>Offer DEscription</td>
                <td><?=$dealDetails['deal_offer_desc']?> %</td>                
              </tr>
              <tr>
                <td>Deal EMI</td>
                <td><?=$dealDetails['deal_emi']?></td>                
              </tr>
              <tr>
                <td>Deal Warranty</td>
                <td><?=$dealDetails['deal_warranty']?></td>                
              </tr>
              <tr>
                <td>Deal Exchange</td>
                <td><?=$dealDetails['deal_exchange']?></td>                
              </tr>                                                                                                  
            </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="timeline">
                <!-- The timeline -->
                <div class="col-sm-3">
    <img src="<?=$product['product_img']?>" style="width:200px;">
  </div>
  <div class="col-sm-9">
    <table class="table table-bordered table-striped table-responsive">
      <tr>
        <td>Product Name</td>
        <td><?=$product['product_name']?></td>
      </tr>
      <tr>
        <td>Product Model</td>
        <td><?=$product['product_model']?></td>
      </tr>
      <tr>
        <td>Product Subcategory</td>
        <td><?php 
                    //decoding subcategory from json to PHP
                  $subcat = json_decode($product['product_subcat']);
                  for($u=0;$u<count($subcat);$u++){
                    echo "#".$subcat[0].",";
                  }  
                  ?> 
        </td>
      </tr>
      <tr>
        <td>Product Brand</td>
        <td><?=$product['product_brand']?></td>
      </tr>
      <tr>
        <td>Product Storage</td>
        <td><?=$product['product_storage']?></td>
      </tr>
      <tr>
        <td>Product Size</td>
        <td><?=$product['product_size']?></td>
      </tr>      
      <tr>
        <td>Product OS</td>
        <td><?=$product['product_OS']?></td>
      </tr>
      <tr>
        <td>Short Description</td>
        <td style="word-wrap: break-word; width:50%;"><?=$product['product_sdc']?></td>
      </tr>
      <tr>
        <td>Long Description</td>
        <td style="word-wrap: break-word; width:50%;"><?=$product['product_ldc']?></td>
      </tr>
    </table>
  </div>  
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
</div>
<?php

}

else{
?>          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Prebuy Edit Request</h3>
            </div>
<!--            <a href="category.php?action=add"><button class="btn btn-danger">Add New Category</button></a>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Deal Id</th>
                  <th>Seller Name</th>
                  <th>Seller Shop</th>                  
                  <th>Deal Code</th>                       
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php
$result = $Base->SelectDataWithColumn('*','prebuy_deals','deal_status=2');
foreach($result as $row){
$getName = $Base->SelectData('o_seller','o_seller_id',$row['dealOwnerId']);
?>
                <tr>
                  <td><?=$row['deal_id']?></td>
                  <td><?=$getName['o_seller_name']?></td>
                  <td><?=$getName['o_seller_store']?></td>                  
                  <td><?=$row['deal_s_id']?></td>
                   <td> <a href="editRequest.php?action=view&id=<?=$row['deal_id']?>"><button class='btn btn-info'>View Details</button></a>
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
  <!-- /.content-wrapper -->
  <?php include('layouts/footer.php'); ?>