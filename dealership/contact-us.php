<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Harrier Contact Us Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Default Description">
    <meta name="keywords" content="fashion, store, E-commerce">
    <meta name="robots" content="*">
    <link rel="icon" href="#" type="image/x-icon">
    <link rel="shortcut icon" href="#" type="image/x-icon">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="stylesheet/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/font-awesome.css" media="all">
    <link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/revslider.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/jquery.mobile-menu.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="stylesheet/responsive.css" media="all">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Teko:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Condensed:300,400,500,600,700,800" rel="stylesheet">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

</head>

<body>
    <div id="page">
        <header>
            <div class="container">
                <div class="row">
                    <div id="header">
                        <div class="header-container">
                            <div class="header-logo">
                                <a href="index.php" title="Car HTML" class="logo">
                                    <div><img src="images/logo.png" alt="Car Store"></div>
                                </a>
                            </div>
                            <div class="header__nav">
                                <div class="header-banner">
                                    <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                                        <div class="assetBlock">
                                            <div style="height: 20px; overflow: hidden;" id="slideshow">
                                                <p style="display: block;">Lowest rates - <span>50%</span> Get ready for summer! </p>
                                                <p style="display: none;">Save up to <span>50%</span> Hurry limited offer!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-lg-6 col-xs-12 col-sm-6 col-md-6 call-us"><i class="fa fa-clock-o"></i> Mon - Fri : 09am to 06pm <i class="fa fa-phone"></i> 011 2 729 729</div>
                                </div>
                                <div class="fl-header-right">
                                    <div class="fl-links">
                                        <div class="no-js">
                                            <a title="" class="clicker"></a>
                                            <div class="fl-nav-links">
                                                <h3>My Acount</h3>
                                                <ul class="links">
                                                    <?php
                                                    if (isset($_SESSION['User'], $_SESSION['Email'])) {
                                                        ?>
                                                        <li><?php echo $_SESSION['FirstName']; ?> <?php echo $_SESSION['LastName']; ?></li>
                                                        <li><?php echo $_SESSION['Email']; ?></li>
                                                        <br>
                                                        <li><a href="../logout.php?logout" title="Log out">Log out</a></li>
                                                    <?php
                                                    } else {
                                                        ?>
                                                        <li><a href="../login/login-page.php" title="Login">Login</a></li>
                                                        <li><a href="../register/index.php" title="Register">Register</a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!--mini-cart-->
                                    <div class="collapse navbar-collapse">
                                        <form class="navbar-form" role="search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="search-btn"> <span class="glyphicon glyphicon-search"> <span class="sr-only">Search</span> </span>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <!--links-->
                                </div>

                                <div class="fl-nav-menu">
                                    <nav>
                                        <div class="mm-toggle-wrap">
                                            <div class="mm-toggle"><i class="fa fa-bars"></i><span class="mm-label">Menu</span> </div>
                                        </div>

                                        <div class="nav-inner">
                                            <!-- BEGIN NAV -->
                                            <ul id="nav" class="hidden-xs">
                                                <li class="active"> <a class="level-top" href="index.php"><span>Home</span></a></li>
                                                <li class="level0 parent drop-menu"> <a class="level-top" href="vehicle-list.php"><span>Listing‎</span></a> </li>
                                                <li class="mega-menu hidden-sm"> <a class="level-top" href="contact-us.php"><span>Contact‎</span></a> </li>
                                                <li class="mega-menu hidden-sm"> <a class="level-top" href="about-us.php"><span>About us‎</span></a> </li>
                                                <?php
                                                if (isset($_SESSION['Id']) && isset($_SESSION['UserType'])) {

                                                    $usertype = $_SESSION['UserType'];
                                                    if ($usertype == 1) {
                                                        ?>
                                                        <li class="mega-menu hidden-sm"> <a class="level-top" href="wishlist.php"><span>Wishlist</span></a> </li>
                                                        <li class="mega-menu hidden-sm"> <a class="level-top" href="../user/index.php"><span>Dashboard‎</span></a> </li>
                                                        <li class="mega-menu hidden-sm"> <a class="level-top" href="../user/mycart.php" title="View my cart"><span class="fa fa-shopping-cart"></span></a> </li>
                                                        <li class="mega-menu hidden-sm"> <a class="level-top" href="../logout.php?logout"><span>Logout</span></a> </li>
                                                    <?php
                                                        } elseif ($usertype == 0) {
                                                            ?>
                                                        <li class="mega-menu hidden-sm"> <a class="level-top" href="../logout.php?logout"><span>Logout</span></a> </li>
                                                    <?php
                                                        }
                                                    } else {
                                                        ?>
                                                    <li class="mega-menu hidden-sm"> <a class="level-top" href="../login/login-page.php"><span>Login</span></a> </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                            <!--nav-->

                                        </div>
                                    </nav>
                                </div>
                            </div>

                            <!--row-->

                        </div>
                    </div>
                </div>
            </div>
        </header>


        <div class="page-heading">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul>
                                <li class="home"> <a href="index-2.html" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
                                <li class="category1601"> <strong>Contact Us</strong> </li>
                            </ul>
                        </div>
                        <!--col-xs-12-->
                    </div>
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <div class="page-title">
                <h2>CONTACT US</h2>
            </div>
        </div>
        <!--breadcrumbs-->

        <!-- BEGIN Main Container col2-right -->
        <div class="main-container col2-right-layout">
            <div class="main container">
                <div class="row">
                    <div class="col-main col-sm-9 wow bounceInUp animated animated" style="visibility: visible;">
                        <div id="messages_product_view"></div>
                        <form action="#" id="contactForm" method="post">
                            <div class="static-contain">
                                <fieldset class="group-select">
                                    <ul>
                                        <li id="billing-new-address-form">
                                            <fieldset class="">
                                                <ul>
                                                    <li>
                                                        <div class="customer-name">
                                                            <div class="input-box name-firstname">
                                                                <label for="name"><em class="required">*</em>Name</label>
                                                                <br>
                                                                <input name="name" id="name" title="Name" value="john doe" class="input-text required-entry" type="text">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="email"><em class="required">*</em>Email</label>
                                                                <br>
                                                                <input name="email" id="email" title="Email" value="john.doe@gmail.com" class="input-text required-entry validate-email" type="text">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label for="telephone">Telephone</label>
                                                        <br>
                                                        <input name="telephone" id="telephone" title="Telephone" value="" class="input-text" type="text">
                                                    </li>
                                                    <li>
                                                        <label for="comment"><em class="required">*</em>Comment</label>
                                                        <br>
                                                        <textarea name="comment" id="comment" title="Comment" class="required-entry input-text" cols="5" rows="3"></textarea>
                                                    </li>
                                                </ul>
                                            </fieldset>
                                        </li>
                                        <p class="require"><em class="required">* </em>Required Fields</p>
                                        <input type="text" name="hideit" id="hideit" value="" style="display:none !important;">
                                        <div class="buttons-set">
                                            <button type="submit" title="Submit" class="button submit"><span><span>Submit</span></span></button>
                                        </div>
                                    </ul>
                                </fieldset>
                            </div>
                        </form>

                    </div>
                    <aside class="col-right sidebar col-sm-3 wow bounceInUp animated animated" style="visibility: visible;">
                        <div class="block block-company">
                            <div class="block-title">Company</div>
                            <div class="block-content">
                                <ol id="recently-viewed-items">
                                    <li class="item odd"><a href="about-us.html">About Us</a></li>
                                    <li class="item even"><a href="#">Sitemap</a></li>
                                    <li class="item  odd"><a href="#">Terms of Service</a></li>
                                    <li class="item last"><a href="#">Search Terms</a></li>
                                    <li class="item last"><a href="contact-us.html"><strong>Contact Us</strong></a></li>
                                </ol>
                            </div>
                        </div>
                    </aside>
                    <!--col-right sidebar-->
                </div>
                <!--row-->
            </div>
            <!--main-container-inner-->
        </div>
        <!--main-container col2-left-layout-->



    </div>
    <!-- For version 1,2,3,4,6 -->

    <footer>
        <!-- BEGIN INFORMATIVE FOOTER -->
        <div class="footer-inner">
            <div class="our-features-box wow bounceInUp animated animated">
                <div class="container">
                    <ul>
                        <li>
                            <div class="feature-box">
                                <div class="icon-truck"><img src="images/world-icon.png" alt="Image"></div>
                                <div class="content">
                                    <h6>World's #1</h6>
                                    <p>Largest Auto portal</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="feature-box">
                                <div class="icon-support"><img src="images/car-sold-icon.png" alt="Image"></div>
                                <div class="content">
                                    <h6>Car Sold</h6>
                                    <p>Every 4 minute</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="feature-box">
                                <div class="icon-money"><img src="images/tag-icon.png" alt="Image"></div>
                                <div class="content">
                                    <h6>Offers</h6>
                                    <p>Stay updated pay less</p>
                                </div>
                            </div>
                        </li>
                        <li class="last">
                            <div class="feature-box">
                                <div class="icon-return"><img src="images/compare-icon.png" alt="Image"></div>
                                <div class="content">
                                    <h6>Compare</h6>
                                    <p>Decode the right car</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12 col-lg-4">
                        <div class="co-info">
                            <h4>SHOWROOM</h4>
                            <address>
                                <div><span>NSBM Green University, <br>
                                        Mahenwaththa, <br>
                                        Pitipana, <br>
                                        Homagama</span></div>
                                <div> <span> 011 2 729 729</span></div>
                                <div> <span><a href="#">harrier@nsbm.com</a></span></div>
                                <div> <span>Mon - Fri : 09am to 06pm</span></div>
                            </address>
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-12 col-lg-8">
                        <div class="footer-column">
                            <h4>Quick Links</h4>
                            <ul class="links">
                                <li><a title="FAQs" href="#">FAQs</a></li>
                                <li><a title="Payment" href="#">Payment</a></li>
                                <li><a title="Shipment" href="#">Shipment</a></li>
                                <li><a title="Where is my order?" href="#">Where is my order?</a></li>
                                <li class="last"><a title="Return policy" href="#">Return policy</a></li>
                            </ul>
                        </div>
                        <div class="footer-column">
                            <h4>Style Advisor</h4>
                            <ul class="links">
                                <li class="first"><a title="Your Account" href="#">Your Account</a></li>
                                <li><a title="Information" href="#">Information</a></li>
                                <li><a title="Addresses" href="#">Addresses</a></li>
                                <li><a title="Orders History" href="#">Orders History</a></li>
                                <li class="last"><a title=" Additional Information" href="#"> Additional Information</a></li>
                            </ul>
                        </div>
                        <div class="footer-column">
                            <h4>Information</h4>
                            <ul class="links">
                                <li class="first"><a title="Site Map" href="#">Site Map</a></li>
                                <li><a title="Advanced Search" href="#">Advanced Search</a></li>
                                <li><a title="History" href="#">About Us</a></li>
                                <li><a title="History" href="#">Contact Us</a></li>
                                <li><a title="Suppliers" href="#">Suppliers</a></li>
                            </ul>
                        </div>
                    </div>

                    <!--col-sm-12 col-xs-12 col-lg-8-->
                    <!--col-xs-12 col-lg-4-->
                </div>
                <!--row-->

            </div>

            <!--container-->
        </div>
        <!--footer-inner-->

        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="social">
                            <ul>
                                <li class="fb">
                                    <a href="#"></a>
                                </li>
                                <li class="tw">
                                    <a href="#"></a>
                                </li>
                                <li class="googleplus">
                                    <a href="#"></a>
                                </li>
                                <li class="linkedin">
                                    <a href="#"></a>
                                </li>
                                <li class="youtube">
                                    <a href="#"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12 coppyright"><a target="_blank" href="https://github.com/Harshana-Rathnayaka">2020 Dreeko Corporations. All Rights Reserved. &copy; &reg;</a></div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="payment-accept"> <img src="images/payment-1.png" alt=""> <img src="images/payment-2.png" alt=""> <img src="images/payment-3.png" alt=""> <img src="images/payment-4.png" alt=""> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN SIMPLE FOOTER -->
    </footer>
    <!-- End For version 1,2,3,4,6 -->

    </div>
    <!--page-->
    <!-- Mobile Menu-->
    <div id="mobile-menu">
        <ul>
            <li>
                <div class="mm-search">
                    <form id="search1" name="search">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
                            </div>
                            <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
                        </div>
                    </form>
                </div>
            </li>
            <li class="active"> <a class="level-top" href="#"><span>Home</span></a></li>
            <li><a href="grid1.html">Accessories</a>
                <!--mega menu-->
                <ul class="level0">
                    <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Audio</span></a>
                        <!--sub sub category-->
                        <ul class="level1">
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Amplifiers</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Installation Parts</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Speakers</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Stereos</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Subwoofers</span></a> </li>
                            <!--level2 nav-6-1-1-->
                        </ul>
                        <!--level1-->
                        <!--sub sub category-->
                    </li>
                    <!--level3 nav-6-1 parent item-->
                    <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Body Parts</span></a>
                        <!--sub sub category-->
                        <ul class="level1">
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Bumpers</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Doors</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Fenders</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Grilles</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Hoods</span></a> </li>
                            <!--level2 nav-6-1-1-->
                        </ul>
                        <!--level1-->
                        <!--sub sub category-->
                    </li>
                    <!--level3 nav-6-1 parent item-->
                    <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Exterior</span></a>
                        <!--sub sub category-->
                        <ul class="level1">
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Bed Accessories</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Body Kits</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Custom Grilles</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Car Covers</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Off-Road Bumpers</span></a> </li>
                            <!--level2 nav-6-1-1-->
                        </ul>
                        <!--level1-->
                        <!--sub sub category-->
                    </li>
                    <!--level3 nav-6-1 parent item-->
                    <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Interior</span></a>
                        <!--sub sub category-->
                        <ul class="level1">
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Custom Gauges</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Dash Kits</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Seat Covers</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Steering Wheels</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Sun Shades</span></a> </li>
                            <!--level2 nav-6-1-1-->
                        </ul>
                        <!--level1-->
                        <!--sub sub category-->
                    </li>
                    <!--level3 nav-6-1 parent item-->
                    <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Lighting</span></a>
                        <!--sub sub category-->
                        <ul class="level1">
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Fog Lights</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Headlights</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>LED Lights</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Off-Road Lights</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Signal Lights</span></a> </li>
                            <!--level2 nav-6-1-1-->
                        </ul>
                        <!--level1-->
                        <!--sub sub category-->
                    </li>
                    <!--level3 nav-6-1 parent item-->
                    <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Performance</span></a>
                        <!--sub sub category-->
                        <ul class="level1">
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Air Intake Systems</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Brakes</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Exhaust Systems</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Power Adders</span></a> </li>
                            <!--level2 nav-6-1-1-->
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Racing Gear</span></a> </li>
                            <!--level2 nav-6-1-1-->
                        </ul>
                        <!--level1-->
                        <!--sub sub category-->
                    </li>
                    <!--level3 nav-6-1 parent item-->
                </ul>
                <!--level0-->
            </li>
            <li><a href="#">Listing‎</a>
                <ul class="level1">
                    <li class="level1 first"><a href="grid.html"><span>Car Grid</span></a></li>
                    <li class="level1 nav-10-2">
                        <a href="list.html"> <span>Car List</span> </a>
                    </li>
                    <li class="level1 nav-10-3">
                        <a href="grid1.html"> <span>Accessories Grid</span> </a>
                    </li>
                    <li class="level1 nav-10-4">
                        <a href="list1.html"> <span>Accessories List</span> </a>
                    </li>
                    <li class="level1 first parent"><a href="car-detail.html"><span>Car Detail</span></a> </li>
                    <li class="level1 first parent"><a href="accessories-detail.html"><span>Accessories Detail</span></a> </li>
                </ul>
            </li>
            <li><a href="grid.html">Blog</a>
                <ul class="level1">
                    <li class="level1 first"><a href="blog.html"><span>Blog List</span></a></li>
                    <li class="level1 nav-10-2">
                        <a href="blog-detail.html"> <span>Blog Detail</span> </a>
                    </li>
                </ul>
            </li>
            <li><a href="compare.html">Sandwiches‎</a></li>
            <li><a href="#">Pages</a>
                <ul class="level1">
                    <li class="level1">
                        <a href="about-us.html"> <span>About us</span> </a>
                    </li>
                    <li class="level1 nav-10-4">
                        <a href="shopping-cart.html"> <span>Cart Page</span> </a>
                    </li>
                    <li class="level1 first parent"><a href="checkout.html"><span>Checkout</span></a>
                        <!--sub sub category-->
                        <ul class="level2 right-sub">
                            <li class="level2 nav-2-1-1 first"><a href="checkout-method.html"><span>Method</span></a></li>
                            <li class="level2 nav-2-1-5 last"><a href="checkout-billing-info.html"><span>Billing Info</span></a></li>
                        </ul>
                        <!--sub sub category-->
                    </li>
                    <li class="level1 nav-10-4">
                        <a href="wishlist.html"> <span>Wishlist</span> </a>
                    </li>
                    <li class="level1">
                        <a href="dashboard.html"> <span>Dashboard</span> </a>
                    </li>
                    <li class="level1">
                        <a href="multiple-addresses.html"> <span>Multiple Addresses</span> </a>
                    </li>
                    <li class="level1"><a href="contact-us.html"><span>Contact us</span></a> </li>
                    <li class="level1"><a href="404error.html"><span>404 Error Page</span></a> </li>
                    <li class="level1"><a href="login.html"><span>Login Page</span></a> </li>
                    <li class="level1"><a href="quickview.html"><span>Quick View</span></a> </li>
                    <li class="level1"><a href="newsletter.html"><span>Newsletter</span></a> </li>
                </ul>
            </li>
            <li><a href="#">Custom</a></li>
        </ul>
    </div>
    <!-- JavaScript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/parallax.js"></script>
    <script type="text/javascript" src="js/revslider.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>


</body>

</html>