<?php include('layouts/header.php');
      $infrastructureInfo = $Base->SelectDataWithColumn("*",'infrastructure');
      ?>
        <style>
           .surgery-support-new {
    background-color: white;
    font-weight: 500;
}
.heading-with-btn {
    margin-bottom: 40px;
}
.heading-with-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.heading-with-btn div {
    width: 80%;
}
.section-header h1, .section-header h2 {
    font-size: 22px;
    margin-bottom: 0;
    font-weight: 600;
}
.section-header h2 {
    margin-bottom: 0;
    font-weight: 500;
    font-size:22px !important;
}
.heading-with-btn p {
    margin: 5px 0px 0px !important;
}
.section-header p {
    color: #434343;
    font-size: 16px;
    margin-bottom: 0;
    margin-top: 15px;
}
.align-items-center {
    -ms-flex-align: center !important;
    align-items: center !important;
}
.surgery-support-new .box img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    margin-right: 15px;
    background-color: #f8f9fa;
}
.surgery-support-new .box {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px;
    transition: all 0.3s 0s linear;
}

.row-h-100 {
    height: 100%;
}


           .fixed-top{
                background-color:#fff !important;
                color:#000 !important;
            }
            .nav-bar .nav-bar-links .level-1 .item-level-1 .link-level-1{
                color:#c00000 !important;
            }
            .content-box a, .menu-icon i,.content-box span{ color: #c00000 !important; }
            a{ color: #000 !important;}
            #page nav{ padding-top:10px; font-size:21px; text-align:center;}
            #page nav ol{ padding:8px !important; margin:0px !important; font-size:21px; text-align:center;}
            .paragraph{
               padding:20px !important; 
            }
        </style>
        <!-- :: Header -->
        <section class="header" id="page">
           <div class="col-md-12"><center>
             <img src="storage/uploads/imgslide.jpg" style="border-radius:10px; width:100%"/></center></div>
         <div class="row">
         <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Infrastructure</li> </ol>
         </nav>
         </div>
         <hr/>
        </section>
        <!-- :: About US -->
        <section class="about-us" id="start">
            <div class="container">
                <div class="row">
<section class="surgery-support-new">
<div class="container">
<div class="row align-items-center">

<div class="col-sm-12">
<div class="section-header heading-with-btn">
<div>
<h2> Infrastructure <span class="web-clr"></span></h2>
<p></p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-12">
<?php foreach($infrastructureInfo as $infra){ ?>
    <div class="row">
<div class="box">
<div class="col-lg-6">
<img class="lazy" src="<?=$infra['infrastructure_img']?>" data-original="<?=$infra['infrastructure_img']?>" alt="project info" style="background-image: url(&quot;<?=$infra['infrastructure_img']?>&quot;);" />
</div>
<div class="col-lg-6 paragraph">
<h2> <?=$infra['infrastructure_name']?> <span class="web-clr"> </span></h2>
<p><?=$infra['infrastructure_desc']?></p>
</div>
</div>
</div>
<?php } ?>

</div>
</div>
</section>
        </div>
            </div>
              </section>
        <!-- :: Blog -->
<?php include('layouts/footer.php') ?>