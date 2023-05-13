
<?php include("BrandModal.php");
    class SellerModal extends BaseModal{
       public function GetDealsSellerData($dealid){
        $sql = "SELECT * FROM `o_seller` JOIN `prebuy_deals` ON `o_seller`.`o_seller_id`=`prebuy_deals`.`dealOwnerId` and `prebuy_deals`.`deal_id`='$dealid'";          
         return $result = $this->GetResultSingleRow($sql);
       }
        public function GetSubcatBYName($subcatname){
            $sql = "SELECT * FROM `subcategory` WHERE `subcat_name`='$subcatname'";
            return $result = $this->GetResultSingleRow($sql);
        }
        public function InsertOseller($data,$table){
            $key = $this->GetKeysPair($data);
            $value = $this->GetValuePair($data);
            $sql = "INSERT INTO $table ($key) value($value)";
            $result = $this->conn->query($sql);
            return $this->conn->insert_id;
        }
        public function SelectRows($table,$column,$val){
            $sql = $getBranchQ = "SELECT * FROM $table WHERE $column='".$val."'";
            return $this->GetNumRows($sql);
        }
        public function GetSellerBranch($table,$column="",$val="",$orderby="",$offset="",$limit=""){
            if($offset !=null){
            $sql = "SELECT * FROM $table WHERE $column='".$val."' $orderby LIMIT $offset,$limit";
            } else{
            $sql = "SELECT * FROM $table WHERE $column='".$val."' $orderby LIMIT $limit";
            }
            return $this->GetResultSingleRow($sql);
        }
        public function SelectOrderBy($table,$condition){
            $sql = "SELECT * FROM $table $condition";
            return $this->GetResultSingleRow($sql);

        }
   }
  $seller = new SellerModal(); 
?>