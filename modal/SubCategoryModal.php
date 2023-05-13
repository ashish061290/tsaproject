<?php 
    class SubCategoryModal extends BaseModal{
       
       //adminfunction
       public function InsertSubcat($data,$id=0){
        if($id==0){
            //insert
        }if($id>0){
            //update
        }
       }
       public function GetSubCategory(){
        $sql ="SELECT * FROM `subcategory` JOIN `category` ON `subcategory`.`cat_id`=`category`.`category_id`";
         return $this->GetResultLoop($sql);
       }
       public function SubCategoryDelete($id){

       }
       public function SubCategoryUpdate($id){

       }
       public function ActiveInactive($status,$id,$table){

       }
       //end
       public function GetSubcatByJoin($min,$max){
        $sql = "SELECT `product`.`product_subcat`,COUNT(`prebuy_deals`.`deal_model_number`),`prebuy_deals`.`deal_model_number` FROM `prebuy_deals` JOIN `product` ON `prebuy_deals`.`deal_model_number`=`product`.`product_model` GROUP BY `prebuy_deals`.`deal_model_number` ORDER BY COUNT(`prebuy_deals`.`deal_model_number`) DESC LIMIT $min,$max";
        return $this->GetResultLoop($sql);
}
        public function GetSubcatBYName($subcatname){
            $sql = "SELECT * FROM `subcategory` WHERE `subcat_name`='$subcatname'";
            $result = $this->conn->query($sql);
            if($result->num_rows >0){
                return $result->fetch_assoc();
            } else{ return false; }
        }
   }
  $subcat = new SubCategoryModal(); 
?>