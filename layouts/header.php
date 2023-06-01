<?php  require 'config/config.php';
       require 'lib/BaseModal.php';
       $companyInfo = $Base->SelectData('admin','status','1');
       $contactInfo = $Base->SelectData('contactus','status','1');  ?>
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
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                            <a href="index.php" class="logo-nav">
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
                                    <a href="index.php" class="link-level-1 color-active">Home</a>
                                 
                                </li>
                                <li class="item-level-1 has-menu">
                                    <a href="#" class="link-level-1">About Us</a>
                                    <ul class="level-2">
                                        <li class="item-level-2">
                                            <a class="link-level-2" href="profile.php">Profile</a>
                                        </li>
                                        <li class="item-level-2">
                                            <a class="link-level-2" href="quality.php">Quality & Accreditation </a>
                                        </li>
                                        <li class="item-level-2">
                                            <a class="link-level-2" href="clients.php">Clients</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                
								<li class="item-level-1">
                                    <a href="product.php" class="link-level-1">Products</a>
                                  
                                </li>
                                <li class="item-level-1">
                                    <a href="infrastructure.php" class="link-level-1">Infrastructure</a>
                                   
                                </li>
                                <li class="item-level-1">
                                    <a href="projects.php" class="link-level-1">Projects</a>
                                   
                                </li>
                                <li class="item-level-1">
                                    <a href="enquiry.php" class="link-level-1">Enquiry</a>
                                </li>
                                 <li class="item-level-1">
                                    <a href="contact.php" class="link-level-1">Contact Us</a>
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
                            <a class="mail" href="mailto:<?=$contactInfo['email']?>"><?=$contactInfo['email']?></a>
                           
                        </div>
                    </div>
                    <div class="contact-box">
                        <i class="ar-icons-location"></i>
                        <div class="box">
                            <p><?=$contactInfo['address']?> </p>
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