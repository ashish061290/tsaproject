<?php 
include('../config/config.php');
include('../lib/BaseModal.php');
require('../modal/AdminModal.php');
$msg=0;
if(isset($_SESSION['data'])){
  $Base->redirect('dashboard.php');
}
if(isset($_POST['adminLogin'])){
  $LoginStatus="";
  $email = $_POST['username'];
  $pwd = $_POST['pwd'];
  $data = $login->AdminLogin($email,$pwd);
  $sessdata = array("admin_id"=>$data['admin_id'],"role"=>$data['role']);
  $_SESSION['data'] = $sessdata;
  if($_SESSION['data']){
   $LoginStatus =  $data['role'];
   } else{ $LoginStatus=""; }
  if($LoginStatus==1){
    $Base->redirect('dashboard.php');
  } else{
    $msg=1;
  }
} 
?>
<?php  include('layouts/head.php'); ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
     <a href="#"><b>Admin Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php if($msg>0){ ?>
        <div class="alert alert-danger">Username Pssword Mismatch Try Again</div>
        <?php } ?>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pwd" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="adminLogin" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 3 -->
<script src="<?php echo ADMINASSETS ?>js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo ADMINASSETS ?>js/bootstrap.min.js"></script>
<!-- iCheck -->
</body>
</html>
