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
      <h1> About Pages
        <small>Pages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="about-profile.php">PagesList</a></li>
        <li class="active">Pages</li>
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
          <h3 class="box-title">Add About Page</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Page Name<span style="color:red;">*</span></label>
                <select name="page_name" class="form-control" required>
                    <option value="">--Select--</option>
                    <option value="profile">Profile</option>
                    <option value="quality&accrediation">Quality & Accrediation</option>
                </select>
               
              </div>
              <div class="form-group">
                <label>Description<span style="color:red;">*</span></label>
                <textarea class="form-control" name="description" id="page_descr"></textarea>
              </div>
             
              <!-- /.form-group -->
            <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Add Profile">
            </div>
          </div>   
            </form></div></div></div>
            <!-- /.col -->
<?php
if(isset($_POST['submit'])){
  $page_name = $_POST['page_name'];
  $aboutrow =  $Base->CountNumRow('about_us',$page_name,'page_name');
  $description = $_POST['description'];
  if($aboutrow>0){ ?>
   <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='about-profile.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Failed!</h4>
                Duplicate Category Not Allowed.
              </div>
              <?php } else{
    $data = array("page_name"=>$page_name,"description"=>$description);
    $Insert = $Base->SaveEdit($data,null,null,'about_us');
    if($Insert==true){ ?>
    <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='about-profile.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Page Added Successfully.
              </div>
    <?php } else{ ?>
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='about-profile.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Page Added Failed, due to some problem.
              </div>
            <?php }  } } ?>            
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Visit <a href="https://Bit7.com">Bit7</a> for more examples and information about
          the plugin.
        </div></div> <?php } 
  //add form end
     else if($action=="deactivate"){
     $Deactive = $Base->ActiveDeactive($id,$status,'about_us','id');
     if($Deactive){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='about-profile.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Category DeActivated Successfully.
              </div>
    <?php
  } 
} else if($action=="activate"){
 $active = $Base->ActiveDeactive($id,$status,'about_us','id');
 if($active){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='about-profile.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Category DeActivated Successfully.
              </div>
    <?php
  } 
} 
else if($action=="delete"){
  $delete =  $Base->DeleteData('about_us','id',$id);
  if($delete){
    ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='about-profile.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Category Deleted Successfully.
              </div>
    <?php } else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='about-profile.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Deleted!</h4>
               		Category can not be deleted ,it may have some sub-category so please delete its sub-category first.
              </div>
  <?php }
   }
//edit form start
  else if($action=="edit"){
  $row = $Base->SelectData('about_us','id',$id); ?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update Page</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <label>Page Name <span style="color:red;">*</span></label>
                  <input type="text" name="page_name" value="<?=$row['page_name']?>" class="form-control" required="true">
              </div>
              <div class="form-group">
                <label>Page Description<span style="color:red;">*</span></label>
                <div class="form-group">
               
                <textarea class="form-control" name="description" id="page_descr"><?=$row['description']?></textarea>
              </div>
              </div>
             
              <!-- /.form-group -->
              <div class="form-group">
             <input type="submit" class="btn btn-success" name="update" value="Update Page">
            </div>
          </div>   
            </form>
          </div>
           </div>
             </div>
            <!-- /.col -->
<?php
if(isset($_POST['update'])){
  $page_name = $_POST['page_name'];
  $description = $_POST['description']; 
  $data = array("page_name"=>$page_name,"description"=>$description); 
   $Update = $Base->SaveEdit($data,$id,'id','about_us');
   if($Update == true){?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='about-profile.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Page Updated Successfully.
              </div>
    <?php }  else{?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='about-profile.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i>Failed!</h4>
               Page Updation Failed, due to some problem.
              </div>
    <?php } } ?>            
            <!-- /.col -->
          </div>

          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Visit <a href="https://Bit7">Bit7</a> for more examples and information about
          the plugin.
        </div></div>
        
        <?php  } else{ ?>  
          <!-- view all category -->        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pages</h3>
            </div>
            <a href="about-profile.php?action=add"><button class="btn btn-danger">Add New Page</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  <th>Page Name</th>
                  <th>Page Description</th>     
                  <th>Status</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php $GetPages = $Base->SelectDataWithColumn("*",'about_us'); 
               foreach($GetPages as $row){ ?>
                <tr>
                  <td><?=$row['page_name']?></td>
                  <td><?=$row['description'];?></td>
                  <td> <?php 
                    if($row['status']==0){
                        echo "<img src='Img/status_inactive.png' alt='Inactive' title='Inactive'>";
                      }
                    elseif ($row['status']==1){
                        echo "<img src='Img/status_active.png' alt='active' title='active'>";
                      } 
                    ?></td>
                  <td>
                  	<a href="about-profile.php?action=edit&id=<?=$row['id']?>"><button class='btn btn-info'>Edit</button></a>
                    <a href="about-profile.php?action=delete&id=<?=$row['id']?>"><button class='btn btn-danger'>Delete</button></a>
                   <?php if($row['status']==0)
                      {?>
                    <a href="about-profile.php?action=activate&id=<?=$row['id']?>&status=<?=$row['status']?>"><button class='btn btn-info'>Activate</button></a>
                    <?php  }
                    elseif ($row['status']==1) { ?>
                    <a href="about-profile.php?action=deactivate&id=<?=$row['id']?>&status=<?=$row['status']?>"><button class='btn btn-warning'>DeActivate</button></a>
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
  <script src="<?php echo ADMINASSETS ?>ckeditor/ckeditor.js" ></script>
  <script type="text/javascript">
	
		// Initialize CKEditor
		//CKEDITOR.inline( 'short_desc');

		CKEDITOR.replace('page_descr',{
			//width: "500px",
        	height: "200px"
   
		}); 
	
    	
	</script>
  <?php include('layouts/footer.php');  ?>
  