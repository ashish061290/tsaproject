<?php require 'config/config.php';
      require 'lib/BaseModal.php';
      $companyInfo = $Base->SelectData('admin','status','1');  ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- :: Required Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <!-- :: Bootstrap CSS -->
        <link rel="stylesheet" href="assets/web/css/bootstrap.min.css">

        

        <!-- :: Title -->
        <title>TSA Project’s Private Limited</title>

        <!-- :: Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&family=Heebo:wght@400;500;600;700&display=swap">

        <!-- :: Fontawesome -->
        <link rel="stylesheet" href="assets/web/fonts/fontawesome/css/all.min.css">

        <!-- :: Flaticon -->
        <link rel="stylesheet" href="assets/web/fonts/flaticon/style.css">

        <!-- :: Animate -->
        <link rel="stylesheet" href="assets/web/css/animate.css">
        
        <!-- :: Owl Carousel -->
        <link rel="stylesheet" href="assets/web/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/web/css/owl.theme.default.min.css">
        
        <!-- :: Lity -->
        <link rel="stylesheet" href="assets/web/css/lity.min.css">
        
        <!-- :: Nice Select CSS -->
        <link rel="stylesheet" href="assets/web/css/nice-select.css">
        
        <!-- :: Magnific Popup CSS -->
        <link rel="stylesheet" href="assets/web/css/magnific-popup.css">

        <!-- :: Style CSS -->
        <link rel="stylesheet" href="assets/web/css/style.css">

        <!-- :: Style Responsive CSS -->
        <link rel="stylesheet" href="assets/web/css/responsive.css">

        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
    <body>
        <!-- :: Loading -->
       <!--  <div class="loading">
            <div class="loading-box">
                <div class="lds-roller">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div> -->
        
        <!-- :: All Navbar -->
        <header class="all-navbar fixed-top">
            <!-- :: Navbar -->
            <nav class="nav-bar">
                <div class="container">
                    <div class="content-box d-flex align-items-center justify-content-between">
                        <div class="logo">
                            <a href="#.html" class="logo-nav">
                                <img class="img-fluid one" src="<?=$companyInfo['logo']?>" alt="01 Logo">
                                <img class="img-fluid two" src="<?=$companyInfo['logo']?>" alt="02 Logo">
                            </a>
                            <a href="#open-nav-bar-menu" class="open-nav-bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <div class="nav-bar-links" id="open-nav-bar-menu">
                            <ul class="level-1">
                                <li class="item-level-1">
                                    <a href="#" class="link-level-1 color-active">Home</a>
                                 
                                </li>
                                <li class="item-level-1 has-menu">
                                    <a href="#" class="link-level-1">About Us</a>
                                    <ul class="level-2">
                                        <li class="item-level-2">
                                            <a class="link-level-2" href="#">Profile</a>
                                        </li>
                                        <li class="item-level-2">
                                            <a class="link-level-2" href="#">Quality & Accreditation </a>
                                        </li>
                                        <li class="item-level-2">
                                            <a class="link-level-2" href="#">Clients</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                
								<li class="item-level-1">
                                    <a href="#" class="link-level-1">Products</a>
                                  
                                </li>
                                <li class="item-level-1">
                                    <a href="#" class="link-level-1">Infrastructure</a>
                                   
                                </li>
                                <li class="item-level-1">
                                    <a href="#" class="link-level-1">Projects</a>
                                   
                                </li>
                                <li class="item-level-1">
                                    <a href="#" class="link-level-1">Enquiry</a>
                                </li>
                                 <li class="item-level-1">
                                    <a href="#" class="link-level-1">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <ul class="nav-bar-tools d-flex align-items-center justify-content-between">
                           <!-- <li class="item">
                                <span class="search-icon open"><i class="fas fa-search"></i></span>
                            </li>-->
                            <li class="item phone">
                                <div class="nav-bar-contact">
                                    <i class="ar-icons-phone"></i>
                                    <div class="content-box">
                                        <span>Phone Number</span>
                                        <a href="tel:<?=$companyInfo['mobile']?>"><?=$companyInfo['mobile']?></a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <span class="menu-icon open"><i class="fas fa-list"></i></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <!-- :: Search Box -->
        <div class="search-box">
            <form>
                <input type="search" placeholder="Search Here....." required>
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
            <span class="search-box-icon exit"><i class="fas fa-times"></i></span>
        </div>
        
        <!-- :: Menu Box -->
        <div class="menu-box">
            <div class="inner-menu">
                <div class="website-info">
                    <a href="#.html" class="logo"><img class="img-fluid" src="assets/web/images/Logo-Pick.png" alt="02 Logo"></a>
                    <p>TSA Project’s Private Limited Has Been Established In The Year
2022 As A Subsidiary To T S Industrys – An ISO 9001:2015
Certified Company, With An Aim To Provide An Integrated
Engineering, Procurement And Commissioning Services,
Operating Straight From The Heart Of India For Delivering ClientSpecific Solutions For Project Related Services. The Integrated
Package Of Services Encompasses: Engineering, Procurement,
Manufacturing, Construction, Commissioning And Maintenance.</p>
                </div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <div class="contact-box">
                        <i class="ar-icons-call"></i>
                        <div class="box">

                             

                            <a class="phone" href="tel:<?=$companyInfo['mobile']?>"><?=$companyInfo['mobile']?></a>
                           
                        </div>
                    </div>
                    <div class="contact-box">
                        <i class="ar-icons-email"></i>
                        <div class="box">
                            <a class="mail" href="mailto:tsaprojects@gmail.com">tsaprojects@gmail.com</a>
                           
                        </div>
                    </div>
                    <div class="contact-box">
                        <i class="ar-icons-location"></i>
                        <div class="box">
                            <p>33/6, ‘H’ Sector, Industrial Area, </p>
                            <p>Govindpura, Bhopal – 462 023, M.P. (India)</p>
                        </div>
                    </div>
                </div>
                <div class="follow-us">
                    <h4>Follow Us</h4>
                    <ul class="icon-follow">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
                <span class="menu-box-icon exit"><i class="fas fa-times"></i></span>
            </div>
        </div>
        
        <!-- :: Header -->
        <section class="header" id="page">
            <div class="header-carousel owl-carousel owl-theme">
                <div class="sec-hero display-table" style="background-image: url(assets/web/images/img1.jpg)">
                    <div class="table-cell">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="banner">
                                       
                                        <h1 class="handline">Our Services & Products Include: Engineering and Design
Service</h1>
                                     
                                        
                                        <div class="btn-box">
                                            <a class="btn-1 move-section" href="#"><span>Know More</span></a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sec-hero display-table" style="background-image: url(assets/web/images/img2.png)">
                    <div class="table-cell">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="banner">
                                     <!--    <div class="top-handline">40 years of experience we provide services</div> -->
                                        <h1 class="handline"> Our Aim To Provide An Integrated
Engineering, Procurement And Commissioning Services,
</h1>
                                        <!-- <p class="about-website">Gazolin Are A Industry &amp; Manufacturing Services Provider Institutions. Suitable For Factory, Manufacturing, Industry, Engineering, Construction And Any Related Industry Care Field.</p> -->
                                        <div class="btn-box">
                                            <a class="btn-1 move-section" href="#"><span>About Us</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sec-hero display-table" style="background-image: url(assets/web/images/img3.png)">
                    <div class="table-cell">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="banner">
                                       <!--  <div class="top-handline">Quality &amp; Integrity Service Agency</div> -->
                                        <h1 class="handline">We Are Capable To Provide Qualitative, Safe And Time-Bound
Delivery Of Products & Turnkey Projects To Our Customers</h1>
                                        <!-- <p class="about-website">Gazolin Are A Industry &amp; Manufacturing Services Provider Institutions. Suitable For Factory, Manufacturing, Industry, Engineering, Construction And Any Related Industry Care Field.</p> -->
                                      <!--   <ul class="header-list-features">
                                            <li class="item">
                                                <i class="fas fa-check"></i><h5>Accurate Testing Processes</h5>
                                            </li>
                                            <li class="item">
                                                <i class="fas fa-check"></i><h5>Highly Professional Staff</h5>
                                            </li>
                                        </ul> -->
                                        <div class="btn-box">
                                            <a class="btn-1 btn-2" href="#.html"><span>Request Quote</span></a>
                                           <!--  <a class="btn-1 btn-3 ml-30" href="#"><span>Read More</span></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- :: About US -->
        <section class="about-us py-40" id="start">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="about-us-img-box">
                            <div class="img-box" style="background-image: url(assets/web/images/why.jpg)"></div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="about-us-text-box">
                            <div class="sec-title">
                                <h2>Why Us</h2>
                                <h3>We Are Capable To Provide Qualitative, Safe And Time-Bound
Delivery  </h3>
                                <p class="sec-explain">Of Products & Turnkey Projects To Our Customers To
Their Entire Technical Specifications.</p>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <p class="providing">Our Services & Products Include: </p>
                                    <ul class="about-us-core-list">
                                        <li class="item">
                                            <i class="fas fa-check"></i>
                                            <h4> Engineering and Design
Service </h4>
                                        </li>
                                        <li class="item">
                                            <i class="fas fa-check"></i>
                                            <h4> Items of Air
Cooled Heat Exchangers </h4>
                                        </li>
                                        <li class="item">
                                            <i class="fas fa-check"></i>
                                            <h4>Items of Air Cooled Condensers</h4>
                                        </li>
                                        <li class="item">
                                            <i class="fas fa-check"></i>
                                            <h4>Items of Cooling Towers </h4>
                                        </li>
                                        <li class="item">
                                            <i class="fas fa-check"></i>
                                            <h4> Parts
of Motors & Generators </h4>
                                        </li>
                                        <li class="item">
                                            <i class="fas fa-check"></i>
                                            <h4>Compressor Coolers</h4>
                                        </li>
                                         <li class="item">
                                            <i class="fas fa-check"></i>
                                            <h4>Structural Steel
Fabrication</h4>
                                        </li>
                                        
                                    </ul>
                                    <!-- <div class="img-person">
                                        <img class="img-fluid about-us-person" src="assets/web/images/about-us/01_about-us-person.jpg" alt="About US Person">
                                        <img class="img-fluid signature" src="assets/web/images/01_signature.png" alt="About US Signature">
                                    </div> -->
                                </div>
                                <div class="col-sm-5 d-flex align-items-center justify-content-between">
                                    <div class="about-us-features-carousel owl-carousel owl-theme">
                                        <div class="item">
                                            <i class="ar-icons-computer"></i>
                                            <h5>Transparent Pricing</h5>
                                            <a class="btn-1 btn-3" href="#"><span>Read More</span></a>
                                        </div>
                                        <div class="item">
                                            <i class="ar-icons-check-list"></i>
                                            <h5>Satisfaction Guarantee 100%</h5>
                                            <a class="btn-1 btn-3" href="#"><span>Read More</span></a>
                                        </div>
                                        <div class="item">
                                            <i class="ar-icons-architect"></i>
                                            <h5>Personalised Solutions</h5>
                                            <a class="btn-1 btn-3" href="#"><span>Read More</span></a>
                                        </div>
                                        <div class="item">
                                            <i class="ar-icons-plan-1"></i>
                                            <h5>Accurate Testing</h5>
                                            <a class="btn-1 btn-3" href="#"><span>Read More</span></a>
                                        </div>
                                        <div class="item">
                                            <i class="ar-icons-architect"></i>
                                            <h5>Quality Assurance</h5>
                                            <a class="btn-1 btn-3" href="#"><span>Read More</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- :: Services -->
        <section class="services">
            <div class="bg-section">
                <div class="overlay overlay-2"></div>
            </div>
            <div class="container">
                <div class="sec-title">
                    <div class="row">
                        <div class="col-lg-5">
                            <h2>Areas of expertise:</h2>
                            <h3>AREAS</h3>
                        </div>
                        <div class="col-lg-5 d-flex align-items-center">
                            <p class="sec-explain">The Quality Department Here, Has Been Involved In Inspection of Raw Material, Assisting External Inspection Agencies,
Stage Inspection Under Different Manufacturing Process etc</p>
                        </div>
                    </div>
                </div>
                <div class="services-carousel owl-carousel owl-theme">
                    <div class="services-carousel-item">
                         <i class="ar-icons-factory"></i>
                       
                        <h4>Petrochemical &  <br> hydrocarbon industry</h4>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Magna.</p> -->
                        <a class="btn-1 btn-3 open-link" href="#.html"><span>Read More</span></a>
                    </div>
                    <div class="services-carousel-item">
 <i class="ar-icons-bottle"></i>
                        
                        <h4>Chemical <br>industry</h4>
                        
                        <a class="btn-1 btn-3 open-link" href="#.html"><span>Read More</span></a>
                    </div>
                    <div class="services-carousel-item">
                        <i class="ar-icons-bottle"></i>
                        <!-- <i class="ar-icons-factory"></i> -->
                        <h4>Basic  Industrial <br>Chemicals</h4>
                        
                        <a class="btn-1 btn-3 open-link" href="#.html"><span>Read More</span></a>
                    </div>
                    <div class="services-carousel-item">
                        <i class="ar-icons-electricity"></i>

                        <h4>Hydro, thermal, nuclear &  <br>captive power industry</h4>
                        
                        <a class="btn-1 btn-3 open-link" href="#"><span>Read More</span></a>
                    </div>
                    <div class="services-carousel-item">
                        <i class="ar-icons-green-factory"></i>
                        <h4>Cement, steel &  <br>sugar industry</h4>
                      
                        <a class="btn-1 btn-3 open-link" href="#.html"><span>Read More</span></a>
                    </div>
                    <div class="services-carousel-item">
                        <i class="ar-icons-conveyor-1"></i>
                        <h4>Offshore  <br>utilities</h4>
                       
                        <a class="btn-1 btn-3 open-link" href="#.html"><span>Read More</span></a>
                    </div>
                    <div class="services-carousel-item">
                        <i class="ar-icons-oil-tank"></i>
                        <h4>Refineries  <br></h4>
                       
                        <a class="btn-1 btn-3 open-link" href="#.html"><span>Read More</span></a>
                    </div>
                    <div class="services-carousel-item">
                        <i class="ar-icons-toolbox"></i>
                        <h4>Indian   <br>railway</h4>
                       
                        <a class="btn-1 btn-3 open-link" href="#.html"><span>Read More</span></a>
                    </div>
                </div>
                
                <!-- :: Video Presentation -->
               
            </div>
        </section>
          <section class="provide-2 py-40">
            <div class="bg-section">
                <div class="overlay overlay-2"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sec-title">
                            <!-- <h2>Best Creative Industrial!</h2> -->
                            <h3>Word from the Desk of Directors</h3>
                        </div>
                        <div class="provide-btn">
                            <p align="justify" class="text-light">Additionally, We Have Planned A State-Of-The-Art Facility Of CNC Cutting Machine, Hydraulic Bending Machine, Shot
Blasting Unit, Shearing Machine, Milling Machine & Power Press, Thus Exceeding Our Production Capacity Of Around
200 MT Per Month And At The Same Time Enabling Us To Control Our Production By In-Housing The Processes That
Are Currently Outsourced. Marking Our Presence In Contribution Towards “Going Green”, We Are Planning An
Additional Power Source, In the Form of Grid-Connected Solar PV Rooftop System Of Capacity 50kW So As To Make A
Small Contribution Towards The Reduction Of “Global Carbon Footprint”.</p>
                            <a class="btn-1" href="#"><span>Read More</span></a>
                           
                        </div>
                      <!--   <div class="have-experience">
                            <i class="ar-icons-warehouse"></i>
                            <h5>we have +45 years of experience for give you better quality Results</h5>
                        </div> -->
                    </div>
                    <div class="col-lg-6">
                        <!-- :: FAQs -->
                        <div class="faq">
                            <div class="faq-box">
                                <button class="btn btn-primary click" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-1" aria-expanded="false" aria-controls="faqs-1">Vision<i class="fas fa-angle-right"></i>
                                </button>
                                <div class="collapse show" id="faqs-1">
                                    <div class="card card-body about-text">
                                        <b>We Intend To Meet & Exceed Our Customer’s Expectations By Setting Standards Of
Excellence In Terms Of Quality, Delivery And Cost Through Continuous Improvement And
Customer Interaction While Reducing Our Environmental Footprints.</b>
                                    </div>
                                </div>
                            </div>
                            <div class="faq-box">
                                <button class="btn btn-primary click" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-2" aria-expanded="false" aria-controls="faqs-2">Mission<i class="fas fa-angle-right"></i>
                                </button>
                                <div class="collapse" id="faqs-2">
                                    <div class="card card-body about-text">
                                        To Be One-Roof Solution Provider for our Esteemed Client in Each & Every Aspect of
Engineering, Design & Manufacturing - Fabrication and Machining.
                                    </div>
                                </div>
                            </div>
                            <div class="faq-box">
                                <button class="btn btn-primary click" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-3" aria-expanded="false" aria-controls="faqs-3">Goal<i class="fas fa-angle-right"></i>
                                </button>
                                <div class="collapse" id="faqs-3">
                                    <div class="card card-body about-text">
                                        To Be A World Class Player in Industrial, Power and Consumer Sectors And Be In Top 3
Position By 2025
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- :: Get Update -->
                <div class="get-update">
                    <div class="row">
                        <div class="col-lg-4">
                            <h5>Get Your <span>Free</span> Quote</h5>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center align-items-center">
                            <div class="phone">
                                <a href="tel:<?=$companyInfo['mobile']?>" class="pulse">
                                    <i class="ar-icons-phone"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex align-items-center justify-content-between">
                            <div>
                                <a class="phone-mail" href="tel:<?=$companyInfo['mobile']?>"><?=$companyInfo['mobile']?></a>
                                <a class="phone-mail" href="mailto:support@Gazolin.com">tsaprojects@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <section class="projects py-40">
            <div class="container">
                <div class="sec-title">
                    <div class="row">
                        <div class="col-lg-5">
                           <!--  <h2>We work with global Industries!</h2> -->
                            <h3>PRODUCTS</h3>
                        </div>
                        <!-- <div class="col-lg-5 d-flex align-items-center">
                            <p class="sec-explain">Gazolin Are A Industry &amp; Manufacturing Services Provider Institutions. Suitable For Factory, Manufacturing, Industry, Engineering, Construction And Any Related Industry Care Field.</p>
                        </div> -->
                    </div>
                </div>
                <div class="projects-carousel owl-carousel owl-theme">
                    <div class="projects-item">
                        <div class="img-box">
                            <img class="img-fluid projects-item-img" src="assets/web/images/product/1.jpeg" alt="01 projects">
                        </div>
                        <div class="hover-box">
                            <div class="text-box">
                                
                                <h4><a href="#.html">Motor & generator shell</a></h4>
                            </div>
                            <ul class="projects-icon">
                                <li><a href="#.html"><i class="fas fa-link"></i></a></li>
                                <li><a class="popup" href="assets/web/images/product/1.jpeg"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="projects-item">
                        <div class="img-box">
                            <img class="img-fluid projects-item-img" src="assets/web/images/product/2.jpeg" alt="02 projects">
                        </div>
                        <div class="hover-box">
                            <div class="text-box">
                               
                                <h4><a href="#.html">Flash tanks</a></h4>
                            </div>
                            <ul class="projects-icon">
                                <li><a href="#.html"><i class="fas fa-link"></i></a></li>
                                <li><a class="popup" href="assets/web/images/product/2.jpeg"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="projects-item">
                        <div class="img-box">
                            <img class="img-fluid projects-item-img" src="assets/web/images/product/3.jpeg" alt="03 projects">
                        </div>
                        <div class="hover-box">
                            <div class="text-box">
                               
                                <h4><a href="#.html">Cooler housing assembly</a></h4>
                            </div>
                            <ul class="projects-icon">
                                <li><a href="#.html"><i class="fas fa-link"></i></a></li>
                                <li><a class="popup" href="assets/web/images/product/3.jpeg"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="projects-item">
                        <div class="img-box">
                            <img class="img-fluid projects-item-img" src="assets/web/images/product/4.jpeg" alt="04 projects">
                        </div>
                        <div class="hover-box">
                            <div class="text-box">
                                
                                <h4><a href="#.html">LP & HP heater</a></h4>
                            </div>
                            <ul class="projects-icon">
                                <li><a href="#.html"><i class="fas fa-link"></i></a></li>
                                <li><a class="popup" href="assets/web/images/product/4.jpeg"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="projects-item">
                        <div class="img-box">
                            <img class="img-fluid projects-item-img" src="assets/web/images/product/6.jpeg" alt="05 projects">
                        </div>
                        <div class="hover-box">
                            <div class="text-box">
                               
                                <h4><a href="#.html">Side cover assembly</a></h4>
                            </div>
                            <ul class="projects-icon">
                                <li><a href="#.html"><i class="fas fa-link"></i></a></li>
                                <li><a class="popup" href="assets/web/images/product/6.jpeg"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="projects-item">
                        <div class="img-box">
                            <img class="img-fluid projects-item-img" src="assets/web/images/product/4.jpeg" alt="06 projects">
                        </div>
                        <div class="hover-box">
                            <div class="text-box">
                               
                                <h4><a href="#.html">Compressor + shell & tube cooler</a></h4>
                            </div>
                            <ul class="projects-icon">
                                <li><a href="#.html"><i class="fas fa-link"></i></a></li>
                                <li><a class="popup" href="assets/web/images/product/4.jpeg"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="projects-item">
                        <div class="img-box">
                            <img class="img-fluid projects-item-img" src="assets/web/images/product/3.jpeg" alt="06 projects">
                        </div>
                        <div class="hover-box">
                            <div class="text-box">
                               
                                <h4><a href="#.html">Exciter cover assembly</a></h4>
                            </div>
                            <ul class="projects-icon">
                                <li><a href="#.html"><i class="fas fa-link"></i></a></li>
                                <li><a class="popup" href="assets/web/images/product/3.jpeg"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="projects-item">
                        <div class="img-box">
                            <img class="img-fluid projects-item-img" src="assets/web/images/product/2.jpeg" alt="06 projects">
                        </div>
                        <div class="hover-box">
                            <div class="text-box">
                               
                                <h4><a href="#.html">Hydro components</a></h4>
                            </div>
                            <ul class="projects-icon">
                                <li><a href="#.html"><i class="fas fa-link"></i></a></li>
                                <li><a class="popup" href="assets/web/images/product/2.jpeg"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- :: Team -->
     <section class="provide home-2">
            <div class="bg-section">
                <div class="overlay overlay-3"></div>
            </div>
            <div class="container">
               
               
                <!-- :: Qoute Box -->
                <div class="quote-box">
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- :: Map -->
                            <div class="map-box">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14661.012865636545!2d77.43278835096301!3d23.27024716401187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397c69c2f30b0b23%3A0x482eb51678fed558!2sSector%20H%2C%20Govindpura%20Industrial%20Area%2C%20Bhopal%2C%20Madhya%20Pradesh%20462010!5e0!3m2!1sen!2sin!4v1683469812961!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <!-- <iframe src="https://maps.google.com/maps?q=manhatan&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe> -->
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="sec-title home-2">
                                <h3>Get Quotes</h3>
                                
                            </div>
                            <form class="form-contact">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="quote-item">
                                            <input type="text" name="name" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="quote-item">
                                            <input type="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="quote-item">
                                            <select name="industry">
                                                <option value="Select your industry">Select your Service</option>
                                                <option value="Constraction Of Engineering">MOTOR & GENERATOR SHELL</option>
                                                <option value="Petroleum Gas Energy">COOLER HOUSING ASSEMBLY</option>
                                                <option value="Basic Industrial Chemicals">FLASH TANKS</option>
                                                <option value="Mechanical Engineering">LP & HP HEATER</option>
                                                <option value="Bridge Constraction">SIDE COVER ASSEMBLY</option>
                                                <option value="Automotive Manufacturing">COMPRESSOR + SHELL & TUBE COOLER</option>
                                                <option value="Automotive Manufacturing">EXCITER COVER ASSEMBLY</option>
                                                <option value="Automotive Manufacturing">HYDRO COMPONENTS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="quote-item">
                                            <input type="tel" name="phone" placeholder="Phone" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="quote-item">
                                            <div class="quote-item">
                                                <textarea name="message" placeholder="Message Details!" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="quote-item">
                                            <button class="btn-1 btn-3 submit" type="submit"><span>Submit Request</span></button>
                                            <span class="out-message"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- :: Sponsors -->
        <div class="sponsors">
            <div class="container">
                <div class="sponsors-carousel owl-carousel owl-theme">
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/1.jpg" alt="01 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/2.jpg" alt="02 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/3.jpg" alt="03 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/4.jpg" alt="04 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/5.jpg" alt="04 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/6.jpg" alt="04 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/7.jpg" alt="04 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/8.jpg" alt="04 ">
                    </div>
                    
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/9.jpg" alt="04 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/10.jpg" alt="04 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/11.jpg" alt="04 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/12.jpg" alt="04 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/13.jpg" alt="04 ">
                    </div>
                    <div class="sponsors-box-item">
                        <img class="img-fluid" src="assets/web/images/icon/14.jpg" alt="04 ">
                    </div>
                </div>
            </div>
        </div>
        <!-- :: Provide -->
        
        
        <!-- :: Blog -->
      
        
        <!-- :: Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-1"> <img class="img-fluid" src="assets/web/images/Logo-Pick1.png" alt=" Logo"></div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="logo">
                           
                            <p align="justify">Our Team Members Are Individually Experience In Execution Of
Various Fabrication Jobs For Numerous Projects In India & Across
The Globe. Thus We Target The Sectors Of Oil And Gas, PetroChemical, Fertilizers & Chemicals, Power And Cement & Clients
Who Are Investors, Operators Or Themselves EPC Contractors.
Therefore, Exploration And Production Companies, Oil Marketing
Companies And Owners / Operators Can Have Their Investments
Secured By Entrusting TSA Project’s Private Limited</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-2">
                        <div class="footer-title">
                            <h4>Quick Link</h4>
                        </div>
                        <ul class="links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">Infrastructure</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Enquiry</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- <div class="col-sm-6 col-md-6 col-lg-2">
                        <div class="footer-title">
                            <h4>Industries</h4>
                        </div>
                        <ul class="links">
                            <li><a href="#">Retail &amp; Consumer</a></li>
                            <li><a href="#">Sciences &amp; Healthcare</a></li>
                            <li><a href="#">Industrial &amp; Chemical</a></li>
                            <li><a href="#">Power Generation</a></li>
                            <li><a href="#">Food &amp; Beverage</a></li>
                            <li><a href="#">Oil &amp; Gas</a></li>
                        </ul>
                    </div> -->
                    <div class="col-sm-6 col-md-6 col-lg-2">
                        <div class="footer-title">
                            <h4>Product</h4>
                        </div>
                        <ul class="links">
                            <li><a href="#.html">Motor & generator shell</a></li>
                            <li><a href="#.html">Cooler housing assembly</a></li>
                            <li><a href="#">Side cover assembly</a></li>
                            <li><a href="#">Compressor + shell & tube cooler</a></li>
                            <li><a href="#">Exciter cover assembly</a></li>
                            <li><a href="#">Hydro components</a></li>
                           <li><a href="#"> Flash tanks</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="footer-title">
                            <h4>Follow</h4>
                        </div>
                       
                        <ul class="icon">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>Copyright @2023 All rights reserved TSA Project's</p>
                    <!--<ul>
                        <li><a href="#">Terms &amp; Conditions </a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>-->
                </div>
            </div>
        </footer>
        
        <!-- :: Scroll UP -->
        <div class="scroll-up">
            <a class="move-section" href="#page">
                <i class="fas fa-long-arrow-alt-up"></i>
            </a>
        </div>
        
        <!-- :: JavaScript Files -->
        <!-- :: jQuery JS -->
        <script src="assets/web/js/jquery-3.6.0.min.js"></script>

        <!-- :: Bootstrap JS Bundle With Popper JS -->
        <script src="assets/web/js/bootstrap.bundle.min.js"></script>
        
        <!-- :: Owl Carousel JS -->
        <script src="assets/web/js/owl.carousel.min.js"></script>
        
        <!-- :: Lity -->
        <script src="assets/web/js/lity.min.js"></script>
        
        <!-- :: Nice Select -->
        <script src="assets/web/js/jquery.nice-select.min.js"></script>
        
        <!-- :: Waypoints -->
        <script src="assets/web/js/jquery.waypoints.min.js"></script>

        <!-- :: CounterUp -->
        <script src="assets/web/js/jquery.counterup.min.js"></script>
        
        <!-- :: Magnific Popup -->
        <script src="assets/web/js/jquery.magnific-popup.min.js"></script>
		
		<!-- :: MixitUp -->
        <script src="assets/web/js/mixitup.min.js"></script>
        
        <!-- :: Main JS -->
        <script src="assets/web/js/main.js"></script><script src="assets/web/js/ajax-script.js"></script>
    </body>
</html>