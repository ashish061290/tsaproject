<?php class RetailerModal extends BaseModal{
       public function AdminLogin($username,$password){
           $sql = "SELECT * FROM `admin` WHERE `username`='".$username."' and `password`='".$password."' and (`role`='2' or role='1' or role='3') and `status`='1'";  
           $conn = Connect::getConnection();
           $result = $conn->query($sql);
           if($result->num_rows > 0){
            if($row = $result->fetch_assoc()) {
              return $result = $this->AdminSession($row);
            }
        }
        //$conn->close();
   } 
}
$retailer = new RetailerModal();