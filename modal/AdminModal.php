<?php
      class AdminModal extends BaseModal{
       public function AdminLogin($username,$password){
           $sql = "SELECT * FROM `admin` WHERE `username`='".$username."' and `password`='".$password."' and role='1' and `status`='1'";  
           $conn = Connect::getConnection();
           $result = $conn->query($sql);
           if($result->num_rows > 0){
            if($row = $result->fetch_assoc()){
              return $result = $row;
            }
        }
        //$conn->close();
   }
   public function VendorLogin($username,$password){
      $sql = "SELECT * FROM `o_seller` WHERE `o_seller_rid`='".$username."' && `o_seller_contact`='".$password."' && `o_seller_status`=1";
       return $this->GetResultSingleRow($sql);
   }
   public function UserLogin($condition,$username,$password){
     $sql = "SELECT * FROM users WHERE username='$username' and userpwd ='$password' and user_status='1'";
     if($condition =='numrow'){
     return $this->GetNumRows($sql);
     } if($condition=='row'){
     return $this->GetResultSingleRow($sql);
     }
   }
   public function CheckLogin(){
       if(isset($_SESSION['data'])){
        return $_SESSION['data'];
       } else{ return false; }
   } 
}
$login = new AdminModal();
?>