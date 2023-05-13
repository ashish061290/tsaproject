<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/AllotmentModal.php";
      include('layouts/head.php');
 $id="";
if(isset($_GET['id'])){ 
  $id = $_GET['id']; 
 $sData = $Base->SelectData('o_seller','o_seller_id',$id);
 $result = $Base->SelectDataWithColumn("*",'packages');

} 
?>
 <script type="text/javascript">
   function loadAmount(val){
    //alert('hi');
     if (val.length == 0) { 
        document.getElementById("payment-amount").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("payment-amount").value = this.responseText;
                
            }
        };
        xmlhttp.open("GET", "ajax.php?package=" + val, true);
        xmlhttp.send();
    }
   }
   function loaddeals(){
    alert('HI');
   }
 </script>       
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini" style="z-index: 0;">
<div class="wrapper">
 <?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
 <?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
Seat Allotment, <?=$sData['o_seller_name']?>

      </h1>
    </section>
<hr>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box-body" style="z-index:0;position:relative;">
<form class="form-group" method="POST">
<label>Seller ID</label>
<input type="text" class="form-control" name="seller_rid" value="<?=$sData['o_seller_rid']?>" readonly>
  <label>SELECT Package</label>
<select name="deal_pack" class="form-control" onchange="loadAmount(this.value)" required="">
<option value="">SELECT A PACKAGE</option>
<?php

foreach($result as $runQg){
  ?>
<option value="<?=$runQg['pack_id']?>"><?=$runQg['pack_name']?></option>
  <?php } ?>
</select>
  <label>Payment Amount</label>
  <input type="number" name="payment-amount" id="payment-amount" class="form-control">
  <label>Payment Mode</label>
  <input type="text" name="payment-mode" class="form-control">
  <label>Payment Date</label>
  <input type="date" name="payment-date" class="form-control">
  <input type="submit" name="submit" class="btn btn-success">
</form>
<?php
if(isset($_POST['submit'])){
  $sellerRid = $_POST['seller_rid'];
  $pack  = $_POST['deal_pack'];
  $payment_amt = $_POST['payment-amount'];
  $pay_mode  = $_POST['payment-mode'];
  $date  = $_POST['payment-date'];
$deals = $Base->SelectData('packages','pack_id',$pack);
$ndeals = $deals['pack_deal'];
  $data = array("seller_rid"=>$sellerRid,"package_id"=>$pack,"payment_amount"=>$payment_amt, "payment_mode"=>$pay_mode, "payment_date"=>$date, "number_of_deals"=>$ndeals);
$yur = $Base->SaveEdit($data,null,null,'seller_package_detail');
$oUpdate = $Base->SaveEdit(array('o_seller_payment_status'=>1),$sellerRid,'o_seller_rid','seller_package_detail');
if($yur){
?>
<div class="alert alert-success alert-dismissible" style="z-index: 1;position:relative;margin-top:-200px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.close()">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Slot Alloted Successfully.
</div>
<?php } } ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 <?php include("layouts/footer.php"); ?>