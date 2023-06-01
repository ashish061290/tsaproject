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
      <h1> Enquiry
        <small>Enquiry</small>
      </h1>
      <?php 
     if($_GET['action']=="delete"){
        $id = $_GET['id'];
     $delete =  $Base->DeleteData('enquiry','id',$id);
     if($delete){
     ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='enquiry.php'">&times;</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Enquiry Deleted Successfully.
              </div>
    <?php $GetEnquiry = $Base->SelectDataWithColumn("*",'enquiry','status=1'); } else{?>
  		<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="window.location='contactus.php'">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Deleted!</h4>
                    Enquiry can not be deleted ,it may have some error.
              </div>
  <?php } } ?>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="enquiry.php">EnquiryList</a></li>
        <li class="active">Enquiry</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- view all profiles -->        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Enquiry</h3>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Contact Name </th>
                  <th>Contact Mobile </th>
                  <th>Contact Email</th>
                  <th>Service</th>
                  <th>Message</th>                  
                  <th>Create Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php $GetEnquiry = $Base->SelectDataWithColumn("*",'enquiry','status=1'); 
               foreach($GetEnquiry as $row){ ?>
                <tr>
                  <td><?=$row['name']?></td>
                  <td><?=$row['mobile']?></td>
                  <td><?=$row['email']?></td>
                  <td><?=$row['service']?></td>
                  <td><?=$row['message']?></td>
                  <td><?=$row['created_at']?></td>
                  <td><?=$row['created_at']?></td>
                  <td><a href="enquiry.php?action=delete&id=<?=$row['id']?>"><button class='btn btn-danger'>Delete</button></a></td>
                </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php include('layouts/footer.php');  ?>
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
  