<?php
      class BrandModal extends BaseModal{
       public function GetBrandList(){
         $sql = "SELECT * FROM `brands` WHERE `delete_status`=1";
         return $this->GetResultLoop($sql);
         }
         public function GetBrandById($id){
            $sql = "SELECT * FROM `brands` WHERE `brand_id`=$id";
            return $this->GetResultSingleRow($sql);
            }
   }
   $Brand = new BrandModal();
?>