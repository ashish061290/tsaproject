<?php include('layouts/header.php'); ?>
       <style>
        .provide{
            padding-top:80px !important;
        }
        .overlay-3{
            background-color:#fff !important;
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
      
        <!-- :: Search Box -->
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
                               <img src="storage/enquiry.png" width="250px" height="580px" />
                                <!-- <iframe src="https://maps.google.com/maps?q=manhatan&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe> -->
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="sec-title home-2">
                                <h3>Get Quotes</h3>
                                <div id="message"></div>
                            </div>
                            <form class="form-contact" id="EnquiryForm">
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
                                            <select name="service">
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
                                        <div class="g-recaptcha" data-sitekey="6LezFT0dAAAAAC0UjTO3_-xiUq7wX_RZvy_c14eB"></div>
                                        </div>
                                    </div>
                                 
                                    <div class="col-lg-12">
                                        <div class="quote-item">
                                            <input type="submit" name="submit" class="btn-1 btn-3 submit" value="Submit" />
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
        <!-- :: Blog -->
      
       <?php include('layouts/footer.php') ?>