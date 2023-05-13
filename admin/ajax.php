<?php
include "../config/config.php";
include "../lib/BaseModal.php";
if(isset($_GET['package'])){
    $WhereCondition="pack_id='".$_GET['package']."'";
    $result = $Base->SelectDataWithColumn("*",'packages',$WhereCondition);
    echo $result[0]['pack_price'];
}
if(isset($_GET['subcat'])){
    $WhereCondition="cat_id='".$_GET['subcat']."'";
    $result = $Base->SelectDataWithColumn("*",'subcategory',$WhereCondition);
    foreach($result as $newO){
     ?>
<li style="padding:5px; float:left;">
<input class="check-box" name="product_subcat[]" multiple="" type="checkbox" value="<?=$newO['subcat_name']?>">
      <?=$newO['subcat_name']?></li>
<?php } } 
/*if(isset($_GET['subcat'])){
    $WhereCondition="cat_id='".$_GET['subcat']."'";
    $result = $Base->SelectDataWithColumn("*",'subcategory',$WhereCondition);
    ?>
    <option value="">--Select--</option>
    <?php
    foreach($result as $newO){ ?>
<option value="<?php echo $newO['subcat_name'] ?>"><?=$newO['subcat_name'] ?></option>
<?php } } */
if(isset($_GET['model'])){
    $WhereCondition="product_model LIKE '%".$_GET['model']."%'";
    $result = $Base->SelectDataWithColumn("*",'product',$WhereCondition);
 
    foreach($result as $newO){
?>     
<li onclick='change(this.innerHTML)' class="list-group-item"><?=$newO['product_model']?></li>
<?php } } ?>