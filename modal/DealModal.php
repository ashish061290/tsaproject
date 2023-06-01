<?php 
    class DealModal extends BaseModal{
   public function GetDealsDetail($limit){
    $sql = "SELECT * FROM `prebuy_deals` WHERE `deal_status`=1 ORDER BY `deal_id` DESC LIMIT $limit";          
     return $data =  $this->GetResultLoop($sql);
   }
   public function GetJoinProductByDealid($id){
     $sql = "SELECT * FROM `product` JOIN `prebuy_deals` ON `product`.`product_model`=`prebuy_deals`.`deal_model_number` WHERE `prebuy_deals`.`deal_id`='$id'";
     return $this->GetResultSingleRow($sql);  
    } 
    public function GetProductImages($pid){
       $sql = "SELECT * FROM `product_img` WHERE `product_id`='$pid'";
       return $this->GetResultSingleRow($sql);
    }
    public function dealorderbydesc($select,$table,$condition){
      $sql = "SELECT $select FROM $table $condition";
      return $this->GetResultSingleRow($sql);
    }                        
  }
     $deal = new DealModal();
?>