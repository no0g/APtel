<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>APU Hostel</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="assets/landing/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/landing/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="assets/landing/css/fontAwesome.css">
        <link rel="stylesheet" href="assets/landing/css/hero-slider.css">
        <link rel="stylesheet" href="assets/landing/css/owl-carousel.css">
        <link rel="stylesheet" href="assets/landing/css/datepicker.css">
        <link rel="stylesheet" href="assets/landing/css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="assets/landing/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <link href="../../../assets/img/favicon.png" rel="shortcut icon" />
<!--
	Venue Template
	http://www.templatemo.com/tm-522-venue
-->
    </head>

<body>
 
    <div class="wrap">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="index.html"><div class="logo">
                            <img style="height=80%;" src="assets/img/logo.png" alt="Venue Logo">
                        </div></a>
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li><a href="student"  href="#">Log In</a></li>
                            </ul>
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>
      

    
    <section class="banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>APU Hostel</h2>
                        <span>Study more, live on campus.</span>
                        <div class="blue-button">
                            <a href="https://apu.edu.my">Discover More</a>
                        </div>
                    </div>
                    <div class="submit-form">
                        <form id="form-submit" action="student/register/" method="GET">
                            <div class="row">
                                <div class="col-md-3 first-item">
                                    <fieldset>
                                        <input name="firstname" type="text" class="form-control" id="name" placeholder="Your first name..." required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-3 second-item">
                                    <fieldset>
                                        <input name="lastname" type="text" class="form-control" id="location" placeholder="Your last name..." required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-3 third-item">
                                    <fieldset>
                                        <input name="email" type="email" class="form-control" id="location" placeholder="Your email..." required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-3">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="btn" name="gas" value="go">Register Now</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <section class="featured-places" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <span>Our Rooms</span>
                        <h2>Designed for you</h2>
                    </div>
                </div> 
            </div> 
            <div class="row">
            <?php
                require_once 'config/config.php';

                $check = $mysqli->prepare("select distinct roomtype.id,roomtype.name,roomtype.size,roomtype.image,roomtype.price,roomtype.Description from room right join roomtype
                on roomtype.id =room.type  LIMIT 3");
                
                $check->execute();
                $check->store_result();
                $check->bind_result($roomtypeid,$name,$size,$image,$price,$description);
                
                if($check->num_rows > 0){
                  while($row = $check->fetch()){
            ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="uploads/room/<?php echo $image?>" alt="">
                        </div>
                        <div class="down-content">
                            <h4><?php echo $name?></h4>
                            <span><?php echo $size?></span>
                            <p><?php echo $description?></p>
                            <div class="row">
                                <div class="col-md-6 first-button">
                                    <div class="text-button">
                                        <a href="student/register">Register</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-button">
                                        <a href="student">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } }?>
            </div>
        </div>
    </section>



    <section class="our-services" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <span>Our Services</span>
                        <h2>Making The Best Out of Your Stay in Malaysia</h2>
                    </div>
                </div> 
            </div> 
            <div class="row">
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="icon">
                            <img src="assets/landing/img/service_icon_1.png" alt="">
                        </div>
                        <h4>Well-Designed Rooms</h4>
                        <p>Our designers make sure your experience staying here will improve your study.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="icon">
                            <img src="assets/landing/img/service_icon_2.png" alt="">
                        </div>
                        <h4>24H Customer Care</h4>
                        <p>We have warden everywhere, you can just call them anytime anywhere.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="icon">
                            <img src="assets/landing/img/service_icon_3.png" alt="">
                        </div>
                        <h4>Security</h4>
                        <p>Security guards are placed everywhere to make sure your safety.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    

    <section id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
                <span>Experience Visualized.</span>
                <h2>Explore the comfort life with us.</h2>
                <a href="https://www.youtube.com/watch?v=HWkSzLO0qRw" target="_blank"><i class="fa fa-play"></i></a>
            </div>
        </div>
        <video autoplay="" loop="" muted>
        	<source src="highway-loop.mp4" type="video/mp4" />
        </video>
    </section>

    <section class="contact" id="contact">
        <div id="map">
        			<!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7968.293705486169!2d101.700491!3d3.055345!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1c37182a714ba968!2sAsia%20Pacific%20University%20of%20Technology%20%26%20Innovation%20(APU)!5e0!3m2!1sen!2smy!4v1615141019389!5m2!1sen!2smy" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        
    </section>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-veno">
                        <div class="logo">
                            <img src="assets/img/logo.png" alt="Venue Logo">
                        </div>
                        <p>Providing the best living space for students from around the world. Committed to creating a good space in which will improve student's lifestyle.</p>
                        <ul class="social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="useful-links">
                        <div class="footer-heading">
                            <h4>Useful Links</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    
                                    <li><a href="student/register"><i class="fa fa-stop"></i>Register</a></li>
                                    <li><a href="student/"><i class="fa fa-stop"></i>Login</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-info">
                        <div class="footer-heading">
                            <h4>Contact Information</h4>
                        </div>
                        <p>Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur.</p>
                        <ul>
                            <li><span>Phone:</span><a >(+60) 3-899-61000</a></li>
                            <li><span>Email:</span><a >hostel@apu.edu.my</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <p>Copyright &copy; jmp2rsp 
    
    	- Design: <a rel="nofollow" href="http://www.templatemo.com">Template Mo</a></p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="assets/landing/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="assets/landing/js/vendor/bootstrap.min.js"></script>
    
    <script src="assets/landing/js/datepicker.js"></script>
    <script src="assets/landing/js/plugins.js"></script>
    <script src="assets/landing/js/main.js"></script>
</body>
</html>