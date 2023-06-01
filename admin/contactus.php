<?php include("../config/config.php");
      include "../lib/BaseModal.php";
      include "../modal/CategoryModal.php";
      include('layouts/head.php'); ?>
<body class="hold-transition skin-blue sidebar-mini" style="z-index: 0;">
<div class="wrapper">
  <?php include('layouts/header.php'); ?><!-- Left side column. contains the logo and sidebar -->
  <?php include("layouts/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Contactuss
        <small>Contactus</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="contactus.php">ContactusList</a></li>
        <li class="active">Contactus</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php $action= ""; $id="";$status="";
                if(isset($_GET['action'])){
	              $action = $_GET['action'];
                if(isset($_GET['id'])){	$id = $_GET['id']; }
                if(isset($_GET['status'])){	$status = $_GET['status']; }
                }
                if($action=="add"){ ?>
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Contactus</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
            <div class="form-group">
                <label>Contactus Name<span style="color:red;">*</span></label>
                  <input type="text" placeholder="e.g. Name" name="contact_name" class="form-control" required="true">
              </div>
              
              <div class="form-group">
                <label>Mobile 1<span style="color:red;">*</span></label>
                  <input type="text"  name="mobile1" class="form-control" required="true">
              </div>
              
              <div class="form-group">
                <label>Mobile 2<span style="color:red;">*</span></label>
                  <input type="text" name="mobile2" class="form-control" required="true">
              </div>
              
              <div class="form-group">
                <label>Address<span style="color:red;">*</span></label>
                  <input type="text" name="address" class="form-control" required="true">
              </div>
              
              <div class="form-group">
                <label>Email<span style="color:red;">*</span></label>
                  <input type="text" name="email" class="form-control" required="true">
              </div>
                <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Add Contactus">
            </div>
          </div>   
            </form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
  $name = $_POST['contact_name'];
  $mobile1 = $_POST['mobile1'];
  $mobile2 = $_POST['mobile2'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $data = array("name"=>$name,"mobile1"=>$mobile1,"mobile2"=>$mobile2,"address"=>$address,"email"=>$email);
  $Insert = $Base->SaveEdit($data,null,null,'contactus');
  if($Insert==false){ ?>
   <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='contactus.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Contactus Insertion Failed.
              </div>
    <?php } else{ ?>
    <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='contactus.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Contactus Added Successfully.
              </div>
    <?php  } ?>            
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Visit <a href="https://Bit7.com">Bit7</a> for more examples and information about
          the plugin.
        </div></div> <?php } }
  //add form end
     else if($action=="deactivate"){
     $Deactive = $Base->ActiveDeactive($id,$status,'contactus','id');
     if($Deactive){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='contactus.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Contactus DeActivated Successfully.
              </div>
    <?php } } 
else if($action=="activate"){
 $active = $Base->ActiveDeactive($id,$status,'contactus','id');
 if($active){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='contactus.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Contactus DeActivated Successfully.
              </div>
    <?php
  } 
} 
else if($action=="delete"){
  $delete =  $Base->DeleteData('contactus','id',$id);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='contactus.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Contactus Deleted Successfully.
              </div>
    <?php } else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='contactus.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Deleted!</h4>
               		Contactus can not be deleted ,it may have some error.
              </div>
  <?php }
   }
//edit form start
  else if($action=="edit"){
  $row = $Base->SelectData('contactus','id',$id); ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update Contactus</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
                
              <div class="form-group">
                <label>Contactus Name <span style="color:red;">*</span></label>
                  <input type="text" name="contact_name" value="<?=$row['name']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Contactus mobile 1 <span style="color:red;">*</span></label>
                  <input type="text" name="mobile1" value="<?=$row['mobile1']?>" class="form-control" required="true">
              </div>
              
              <div class="form-group">
                <label>Contactus mobile 2 <span style="color:red;">*</span></label>
                  <input type="text" name="mobile2" value="<?=$row['mobile2']?>" class="form-control" required="true">
              </div>
              
              <div class="form-group">
                <label>Contactus address <span style="color:red;">*</span></label>
                  <input type="text" name="address" value="<?=$row['address']?>" class="form-control" required="true">
              </div>
              
              <div class="form-group">
                <label>Contactus Email <span style="color:red;">*</span></label>
                  <input type="text" name="email" value="<?=$row['email']?>" class="form-control" required="true">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
             <input type="submit" class="btn btn-success" name="update" value="Update Contactus">
            </div>
          </div>   
            </form>
          </div>
           </div>
             </div>
            <!-- /.col -->
<?php
if(isset($_POST['update'])){
  $name = $_POST['contact_name'];
  $mobile1 = $_POST['mobile1'];
  $mobile2 = $_POST['mobile2'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $data = array("name"=>$name,"mobile1"=>$mobile1,"mobile2"=>$mobile2,"address"=>$address,"email"=>$email);  $Update = $Base->SaveEdit($data,$id,'id','contactus');
    if($Update == true){?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='contactus.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Contactus Updated Successfully.
              </div>
    <?php } else{?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='contactus.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Contactus Updation Failed, due to some problem.
              </div>
    <?php } } ?>            
            <!-- /.col -->
          </div>

          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
        <?php  } else{ ?>  
          <!-- view all profiles -->        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Contactus</h3>
            </div>
            <a href="contactus.php?action=add"><button class="btn btn-danger">Add New Contactus</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Contact Name </th>
                  <th>Contact  Mobile </th>
                  <th>Contact Mobile</th>
                  <th>Address</th>
                  <th>Mail</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php $GetContactus = $Base->SelectDataWithColumn("*",'contactus'); 
               foreach($GetContactus as $row){ ?>
                <tr>
                  
                  <td><?=$row['name']?></td>
                  <td><?=$row['mobile1']?></td>
                  <td><?=$row['mobile2']?></td>
                  <td><?=$row['address']?></td>
                  <td><?=$row['email']?></td>
                  <td>
                  	<a href="contactus.php?action=edit&id=<?=$row['id']?>"><button class='btn btn-info'>Edit</button></a>
                    <a href="contactus.php?action=delete&id=<?=$row['id']?>"><button class='btn btn-danger'>Delete</button></a>
                   <?php if($row['status']==0)
                      {?>
                    <a href="contactus.php?action=activate&id=<?=$row['id']?>&status=<?=$row['status']?>"><button class='btn btn-info'>Activate</button></a>
                    <?php  }
                    elseif ($row['status']==1) { ?>
                    <a href="contactus.php?action=deactivate&id=<?=$row['id']?>&status=<?=$row['status']?>"><button class='btn btn-warning'>DeActivate</button></a>
                    <?php  } ?>
                  </td>
                </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <?php
         }
          ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php include('layouts/footer.php');  ?>
  