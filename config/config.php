<?php ob_start();
  session_start();
   if(isset($_SESSION['data'])){
        $LoginUser = $_SESSION['data'];
        $role = $LoginUser['role'];
        $admin_id = $LoginUser['admin_id'];
       } else{ $LoginUser="";$role=""; } 
  date_default_timezone_set('Asia/Calcutta');
  $datetime = Date('Y-m-d h:i:s');
  define('APPURL',"http://localhost/bit7/");
  define('ADMINASSETS',"http://localhost/bit7/assets/");
  define('STORAGE',"http://localhost/bit7/storage/");
  define('MODEL',"http://localhost/bit7/model/");
  define('CONTROLLER',"http://localhost/bit7/controller/");
  define('VIEW',"http://localhost/bit7/view/");
  define('ADMIN',"http://localhost/bit7/admin/");
  define('ERROR_404','http://localhost/bit7/');
  define('DB_HOST','localhost');
  define('DB_NAME','bit7');
  define('DB_PASSWORD','');
  define('DB_USER','root');
  define('MAIL','ashish.simption@gmail.com');
  define('MAIL_PASSS','ashish@98065');    
?>