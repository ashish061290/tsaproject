<?php
include("../config/config.php");
include "../lib/BaseModal.php";
include "../modal/SellerModal.php";
include('layouts/head.php');
function sendmail($sellerid){
echo $sql = "SELECT * FROM `o_seller` WHERE `o_seller_id`='".$sellerid."'";
$result = mysqli_query($conn,$sql);
$getData = mysqli_fetch_assoc($result);
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

return $report;
}
?>