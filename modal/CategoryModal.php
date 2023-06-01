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
       public function CategoryDelete($category_id){
        //get productrow in category id
        $sql = "SELECT * FROM products WHERE category_id='$category_id'";
        $productrow = $this->GetNumRows($sql);
        if($productrow>0){
          return false;
        } else{ 
          return $this->DeleteData('category','category_id',$category_id);
        } 
       }
       public function CategoryUpdate($id){
        $sql = "SELECT * FROM `category` WHERE `category_id` = $id";
        $result = $this->conn->query($sql);
        if($result->num_rows >0){
          return $result->fetch_assoc();
        } else{ return false; }
       }
       public function GetCategory(){
         $sql = "SELECT * FROM `category` WHERE `delete_status`=1";
         return $this->GetResultLoop($sql);
       }
   } $Cat = new CategoryModal();
  ?>