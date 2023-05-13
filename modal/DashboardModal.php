<?php
      class DashboardModal extends BaseModal{
       public function AdminLogin($username,$password){
         $sql = "SELECT * FROM `admin` WHERE `username`=$username and `password`=$password and `status`='1'";     
           $conn = Connect::getConnection();
           $result = $conn->query($sql);
           if($result->num_rows > 0){
            $i=0;
            if($row = $result->fetch_assoc()) {
               return $result = $this->AdminSession($row);
            }
        }
        $conn->close();
   }
    
}
$dashboard = new DashboardModal();
?>