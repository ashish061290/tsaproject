<?php require 'config/config.php';
      require 'lib/BaseModal.php';
     if(isset($_POST['name'])){
        $data = array("name"=>$_POST['name'],"email"=>$_POST['email'],"service"=>$_POST['service'],"mobile"=>$_POST['phone'],"message"=>$_POST['message']);
        $success = $Base->SaveEdit($data,null,null,'contact');
       echo $message="<div class='alert-success'>Form Submitted Success..</div>";
    } else {
       echo  $message="<div class='alert-danger'>Captcha Code Invalid...</div>";
    }  ?>