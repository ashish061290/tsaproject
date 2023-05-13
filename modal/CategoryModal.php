<?php 
      class CategoryModal extends BaseModal{
       public function CategoryInsert($data,$id=0,$columnname="",$table){
        $key = $this->GetKeysPair($data,$id);
        $value = $this->GetValuePair($data);
       if($id>0){ 
         $condition = $this->GetUpdateCondition($data); 
         $sql = "UPDATE $table SET $condition WHERE $columnname=$id";
        } else{
          $sql = "INSERT INTO $table ($key) value($value)";
        }
       $result = $this->conn->query($sql);
       if($result){ return true; }
    }
       public function CategoryUpdate($id){
        $sql = "SELECT * FROM `category` WHERE `category_id` = $id";
        $result = $this->conn->query($sql);
        if($result->num_rows >0){
          return $result->fetch_assoc();
        } else{ return false; }
       }
       public function CategoryDelete($id){
           $sql = "UPDATE `category` SET `delete_status`=0 WHERE `prod_cat_id`='".$id."'";
           return $this->conn->query($sql);
       }
       public function GetCategory(){
         $sql = "SELECT * FROM `category` WHERE `delete_status`=1";
         return $this->GetResultLoop($sql);
       }
   } $Cat = new CategoryModal();
  ?>