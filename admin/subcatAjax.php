<?php
include "../config/config.php";
include "../lib/connect.php";
if(isset($_GET['catId'])){

echo $query = "SELECT * FROM `product_subcategory` WHERE `prod_cat_id`='".$_GET['catId']."'";
	$rt = mysqli_query($conn,$query);
	while($res= mysqli_fetch_assoc($rt)){
?>
<option value='<?=$res['prod_subcat_id']?>'><?=$res['prod_subcat_name']?></option>
<?php
	}
}

?>