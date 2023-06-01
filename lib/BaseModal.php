<?php 
   require('Connect.php');
   require('Helper.php');
  
   class BaseModal{
       public $conn;
       public function __construct(){
         $this->conn = Connect::getConnection();
       }
       public function redirect($url){
         header("location:".$url);
         die();
      }
      public function theme($pagename){
         require "$pagename";
      }
      public function SessionDestroy(){
         if(isset($_SESSION)){
              session_destroy();
              return true;
         }
      } 
      public function GetNumRows($sql){
         $result = $this->conn->query($sql);
         return $result->num_rows;
      } 
      public function CountNumRow($table,$status,$column){
        $sql = "SELECT * FROM $table WHERE $column='".$status."'";
        $result = $this->conn->query($sql);
        if($result->num_rows >0){
           return $result->num_rows;
        }else{
           return false;
        }
     }
     public function SelectData($table,$column_name,$columnval){
      $sql = "SELECT * FROM $table WHERE $column_name='".$columnval."'";
      return $this->GetResultSingleRow($sql);
     }
     public function GetResultSingleRow($sql){
      $result = $this->conn->query($sql);
      if($result->num_rows >0){
         return $result->fetch_assoc();
      } else{ return false; }
     }
     public function GetResultLoop($sql){
      $resultset = array();
      $result = $this->conn->query($sql);
      if($result->num_rows > 0){
      while($row = $result->fetch_assoc()) {
       $user = $row;
       array_push($resultset, $user);
       }
       return $resultset;
       } else{ return false; }
     }
     public function GetUpdateCondition($data){
         $result = array();
         foreach($data as $key=>$value){
            array_push($result,$key."='".$value."'");
         }
         return $result2 = implode(",",$result); 
     }
     public function GetKeysPair($data){
      $result = array();
      foreach ($data as $key => $value) {
          array_push($result,"$key"); 
      }
      return $result2 = implode(",", $result); 
     }
     public function GetValuePair($data){
      $result = array();
      foreach ($data as $key => $value) {
          array_push($result,"'$value'"); 
       }
     return $result2 = implode(",", $result);
     }
   public function ActiveDeactive($id,$status,$table,$column){
      if($status==1){
      $sql = "UPDATE $table SET `status`=0 WHERE $column='".$id."'";
      }
      if($status==0){
      $sql = "UPDATE $table SET `status`=1 WHERE $column='".$id."' ";
      }
      return $this->conn->query($sql);
    }
    public function SelectDataWithColumn($SelectedColumns,$table,$WhereCondition=""){
      $condition="";
      if($table=='category' || $table=='products'){
         $condition = "ORDER BY priority DESC";
      }
      if($WhereCondition !=""){
       $sql = "SELECT $SelectedColumns FROM $table WHERE $WhereCondition";
      } else{
      $sql = "SELECT $SelectedColumns FROM $table $condition"; 
      }
      return $this->GetResultLoop($sql);
     } 
     //inser update function 
   public function SaveEdit($data,$id=0,$columnname="",$table,$last_id=""){
     if($id>0){ 
       $condition = $this->GetUpdateCondition($data); 
       $sql = "UPDATE $table SET $condition WHERE $columnname=$id"; 
      } else{
         $key = $this->GetKeysPair($data);
         $value = $this->GetValuePair($data);
        $sql = "INSERT INTO $table ($key) value($value)";
      }
     
     $result = $this->conn->query($sql); 
     if($result){ if($table=='product'){
        return $this->conn->insert_id;
     } if($last_id !=""){
        return $this->conn->insert_id;
     } else{ return true; } }
  }
  //delete function
  public function DeleteData($table,$conditioncolumn,$value){
     $sql = "DELETE FROM $table WHERE $conditioncolumn='".$value."'";
     if($this->conn->query($sql)){
      return true;
     } else{ return false; }
  }
  public function dealorderbydesc($select,$table,$condition){
   $sql = "SELECT $select FROM $table $condition";
   return $this->GetResultSingleRow($sql);
 }
 public function SelectDataJoin($table,$table2,$select,$join,$wherecolumn,$columnval){
   $sql = "SELECT $select FROM $table $join $table2 ON $table2.`pack_id`=$table.`package_id` WHERE $wherecolumn='".$columnval."'";
   return $this->GetResultSingleRow($sql);

 } 
 public function MailSend($data,$form,$subject,$body,$cc){
   require 'PHPMailer\PHPMailer\PHPMailer.php';
   require 'PHPMailer\PHPMailer\Exception.php';
    require 'vendor/autoload.php';
   $mail = new PHPMailer(true);
  try {
    $mail->SMTPDebug = 2;                                      
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com;';                   
    $mail->SMTPAuth   = true;                            
    $mail->Username   = 'ashish.simption@gmail.com';                
    $mail->Password   = 'ashish@98065';                       
    $mail->SMTPSecure = 'tls';                             
    $mail->Port       = 587; 
 
    $mail->setFrom('from@gfg.com', 'Name');          
    $mail->addAddress('receiver1@gfg.com');
    $mail->addAddress('receiver2@gfg.com', 'Name');
      
    $mail->isHTML(true);                                 
    $mail->Subject = 'Subject';
    $mail->Body    = 'HTML message body in <b>bold</b> ';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
 }
}

$Base = new BaseModal();
 ?>