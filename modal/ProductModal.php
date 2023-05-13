<?php 
    class ProductModal extends BaseModal{
       public function GetDealsProduct(){
        $sql = "SELECT * FROM `product` JOIN `prebuy_deals` ON `product`.`product_model`=`prebuy_deals`.`deal_model_number` ORDER BY `prebuy_deals`.`deal_discount_per`";
         return $this->GetResultLoop($sql);   
        }
        public function GetProductByModel($modelnumber){
            $sql = "SELECT * FROM `product` WHERE `product_model`='".$modelnumber."'";
            return $result = $this->GetResultSingleRow($sql);
        }
        public function ActiveProductSearchInDealwise($pmodel){
            $sql = "SELECT * FROM `product` JOIN `prebuy_deals` ON `product`.`product_model`=`prebuy_deals`.`deal_model_number` WHERE `product`.`product_model` LIKE '%$pmodel%' AND `prebuy_deals`.`deal_status`='1'";
            return $result = $this->GetResultSingleRow($sql);
        }
   }
  $product = new ProductModal(); 
?>