<?php include('layouts/header.php');
      $categoryInfo = $Base->SelectDataWithColumn('*','category');  ?>
        <!-- :: Search Box -->
        <style>
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
        </style>
         <style>
            .apollo-care-and-covid-consult {
    padding: 42.5px 0 0;
    background: #fff;
}

.apollo-care-and-covid-consult .box {
    border: 1px solid #eee;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    margin: 7.5px 0;
    height: calc(100% - 15px);
}

.apollo-care-and-covid-consult .box .apollologo {
    height: 55px;
    position: absolute;
    right: 15px;
    top: 15px;
    background: #fff;
    padding: 5px 15px 11px;
    border-radius: 10px;
    box-shadow: 2px 2px 10px rgb(0 0 0 / 10%);
}

.apollo-care-and-covid-consult .box .box-body {
    padding: 30px;
}

.apollo-care-and-covid-consult .box .box-body h3 {
    font-size: 20px;
}

.apollo-care-and-covid-consult .box .box-body p {
    font-size: 14px;
    color: grey;
}

.apollo-care-and-covid-consult .box .box-body .btn,
.consult-doctor-online-new-sec .web-btn {
    border-radius: 10px;
}
.apollo-care-and-covid-consult .info-section.color1 {
    background: #caf1de;
}

.apollo-care-and-covid-consult .info-section.color2 {
    background: #e1f8dc;
}

.apollo-care-and-covid-consult .info-section.color3 {
    background: #fef8dd;
}

.apollo-care-and-covid-consult .info-section.color4 {
    background: #ffe7c7;
}

.row-h-100 {
    height: 100%;
}

.apollo-care-and-covid-consult .info-section {
    border-radius: 20px;
    margin: 15px 0;
    padding: 25px 15px;
    transition: 0.3s linear;
    height: calc(100% - 30px);
    background-color: #ffffff;
    overflow: hidden;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 20%);
}

.apollo-care-and-covid-consult .info-section:hover,
.apollo-care-and-covid-consult .info-section:focus {
    transform: scale(1.05, 1.05);
    background-color: var(--lightgreencolor);
    color: black;
}

.apollo-care-and-covid-consult .info-section:hover img,
.apollo-care-and-covid-consult .info-section:focus img {
    filter: invert(0);
}

.apollo-care-and-covid-consult .info-section img {
    width: 100%;
    height: auto;
    margin-bottom: 15px;
    object-fit: contain;
    filter: var(--greenfilter);
}

.apollo-care-and-covid-consult .info-section h3 {
    font-size: 14px;
    line-height: 15px;
    margin-bottom: 0px;
    font-weight: bold;
    color: inherit;
}

.apollo-care-and-covid-consult .info-section h6,
.footer-new p {
    font-size: 12px;
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
        </style>
        
        <!-- :: Header -->
        <section class="header" id="page">
           <div class="col-md-12"><center>
             <img src="storage/uploads/imgslide.jpg" style="border-radius:10px; width:100%"/></center></div>
         <div class="row">
         <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Category</li> </ol>
         </nav>
         </div>
         <hr/>
        </div>
        </section>
        <!-- :: About US -->
<section class="apollo-care-and-covid-consult" style="border-top: 2px solid #97F8E5;">
<div class="container">
<div class="row row-h-100">
<?php foreach($categoryInfo as $cat){ ?>
<div class="col-6 col-md-2">
<a href="viewproduct.php?catid=<?=$cat['category_id']?>">
<div class="info-section">
<img class="lazy" src="<?=$cat['category_img']?>">
<h3><center><?=$cat['category_name']?></center></h3>
</div>
</a>
</div>
<?php } ?>
</div>
</div>
</section>
        <!-- :: Blog -->
      
       <?php include('layouts/footer.php') ?>