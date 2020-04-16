<?php
session_start();
// if (!isset($_SESSION['User'])) {
    // $_SESSION['error'] = "Session timed out. Please login to continue.";
    // header('location:../login/login-page.php');
// } elseif (isset($_SESSION['UserType'])) {
    // $usertype = $_SESSION['UserType'];

    // if ($usertype == 0) {
        // header('location:../admin/index.php');
    // }
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Home</title>
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
</head>

<body>
    <div id="page">
        <header>
            <div class="container">
                <div class="row">
                    <div id="header">
                        <div class="header-container">
                            <div class="header-logo">
                                <a href="index-2.html" title="Car HTML" class="logo">
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
                                                    <li><a href="../login/login-page.php" title="Login">Login</a></li>
                                                    <li><a href="../register/index.php" title="Register">Register</a></li>
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
                                                <li class="active"> <a class="level-top" href="index.html"><span>Home</span></a></li>

                                                <li class="level0 parent drop-menu"> <a class="level-top" href="#"><span>Listing‎</span></a>
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

                                                <li class="mega-menu hidden-sm"> <a class="level-top" href="compare.html"><span>Compare Cars‎</span></a> </li>
                                                <li class="mega-menu hidden-sm"> <a class="level-top" href="contact-us.html"><span>Contact‎</span></a> </li>
                                                <li class="mega-menu hidden-sm"> <a class="level-top" href="about-us.html"><span>About us‎</span></a> </li>

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

        <!--container-->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <!-- Slider -->
                    <div class="home-slider5">
                        <div id="thmg-slideshow" class="thmg-slideshow">
                            <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                                <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                                    <ul>
                                        <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slide-img1.jpg'><img src='images/slide-img1.jpg' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner" />
                                            <div class="container">
                                                <div class="content_slideshow">
                                                    <div class="row">
                                                        <div>
                                                            <div class="info">
                                                                <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'><span>Top Brands 2020</span> </div>
                                                                <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'><span style="font-weight:normal; display:block">Modern-classic</span> incredible </div>
                                                                <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="buy-btn">Buy Now</a> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slide-img2.jpg'><img src='images/slide-img2.jpg' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner" />
                                            <div class="container">
                                                <div class="content_slideshow">
                                                    <div class="row">
                                                        <div>
                                                            <div class="info">
                                                                <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'><span>Top Brands 2018</span> </div>
                                                                <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'><span style="font-weight:normal; display:block">Modern-classic</span> Decorative </div>
                                                                <div class='tp-caption Title sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1450' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>Get 40% OFF on selected items.</div>
                                                                <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="buy-btn">Book Appointment</a> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="tp-bannertimer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Category slider Start-->

            <div class="section-filter">
                <div class="b-filter__inner bg-grey container">
                    <h2>Find the right car for you</h2>
                    <form class="b-filter">
                        <div class="btn-group bootstrap-select">
                            <select class="selectpicker" data-width="100%" tabindex="-98">
                                <option>Select Make</option>
                                <?php
                                include '../api/getManufacturers.php';
                                if ($result) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?php echo $row['make_id']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="btn-group bootstrap-select">
                            <select class="selectpicker" data-width="100%" tabindex="-98">
                                <option>Select Car Status</option>
                                <option value="Brand New">Brand New</option>
                                <option value="Recondition">Recondition</option>
                            </select>
                        </div>
                        <div class="btn-group bootstrap-select">
                            <select class="selectpicker" data-width="100%" tabindex="-98">
                                <option>Select Type</option>
                                <option value="0">Coupe</option>
                                <option value="1">Spyder</option>
                            </select>
                        </div>
                        <div class="btn-group bootstrap-select">
                            <select class="selectpicker" data-width="100%" tabindex="-98">
                                <option>Select Colour</option>
                                <?php
                                include '../api/getColours.php';
                                if ($result) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['colour']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="btn-group bootstrap-select">
                            <select class="selectpicker" data-width="100%" tabindex="-98">
                                <option>Select Year</option>
                                <option>2020</option>
                                <option>2019</option>
                                <option>2018</option>
                                <option>2017</option>
                                <option>2016</option>
                                <option>2015</option>
                            </select>
                        </div>

                        <div class="btn-group bootstrap-select">
                            <select class="selectpicker" data-width="100%" tabindex="-98">
                                <option>Select Transmission</option>
                                <option value="1">Manual</option>
                                <option value="2">Automatic</option>
                            </select>
                        </div>

                        <div>
                            <div class="b-filter__btns">
                                <button class="btn btn-lg btn-primary">search vehicle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- best Pro Slider -->
            <section class=" wow bounceInUp animated">
                <div class="hot_deals slider-items-products container">
                    <div class="new_title">
                        <h2>Up for Sale</h2>
                    </div>

                    <div id="hot_deals" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            <?php
                            include '../api/getVehicles.php';
                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <div class="item">

                                        <div class="item-inner">

                                            <div class="item-img">
                                                <div class="item-img-info">
                                                    <a href="details.php?vehicle_id=<?php echo $row['vehicle_id']; ?>" title="See details" class="product-image"><img src="../vehicleimages/<?php echo $row['image_link']; ?>" alt="Retis lapen casen"></a>
                                                    <?php $condition = $row['vehicle_condition'];
                                                            if ($condition == "Brand New") {
                                                                ?>
                                                        <div class="new-label new-top-left">New</div>
                                                    <?php
                                                            } elseif ($condition == "Recondition") {
                                                                ?>
                                                        <div class="sale-label new-top-left">Used</div>
                                                    <?php
                                                            }
                                                            ?>

                                                    <div class="item-box-hover">
                                                        <div class="box-inner">
                                                            <div class="add_cart">
                                                                <button class="button btn-cart" type="button"></button>
                                                            </div>
                                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title">
                                                        <a href="details.php?vehicle_id=<?php echo $row['vehicle_id']; ?>" title="See details"><?php echo $row['name']; ?> <?php echo $row['model']; ?></a>
                                                    </div>

                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price"><span class="price">LKR <?php echo $row['price']; ?></span> </span>
                                                            </div>
                                                        </div>

                                                        <div class="other-info">
                                                            <div class="col-km"><i class="fa fa-tachometer"></i> <?php echo $row['colour']; ?></div>
                                                            <div class="col-engine"><i class="fa fa-gear"></i> <?php echo $row['transmission_type']; ?></div>
                                                            <div class="col-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $row['year']; ?></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- best Pro Slider -->
            <section class=" wow bounceInUp animated">
                <div class="best-pro slider-items-products container">
                    <div class="new_title">
                        <h2>Best Seller Cars</h2>
                    </div>
                    <div id="best-seller" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">

                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a href="accessories-detail.html" title="Retis lapen casen" class="product-image"><img src="products-images/p13.jpg" alt="Retis lapen casen"></a>
                                            <div class="new-label new-top-left">Hot</div>
                                            <div class="sale-label sale-top-left">-15%</div>
                                            <div class="item-box-hover">
                                                <div class="box-inner">
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button"></button>
                                                    </div>
                                                    <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                                    <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a href="accessories-detail.html" title="Retis lapen casen">Gorgeous Mercedes-Benz E-Class All-Terrain Luxury</a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div class="rating" style="width:80%"></div>
                                                        </div>
                                                        <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"><span class="price">$49000.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="other-info">
                                                    <div class="col-km"><i class="fa fa-tachometer"></i> 4875km</div>
                                                    <div class="col-engine"><i class="fa fa-gear"></i> Automatic</div>
                                                    <div class="col-date"><i class="fa fa-calendar" aria-hidden="true"></i> 2018</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->

                        </div>
                    </div>
                </div>
            </section>


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

                <li><a href="#">Other</a>
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
            </ul>
        </div>

        <!-- JavaScript -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="js/parallax.js"></script>
        <script type="text/javascript" src="js/revslider.js"></script>
        <script type="text/javascript" src="js/common.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>
        <script src="js/countdown.js"></script>
        <script>
            jQuery(document).ready(function() {
                jQuery('#rev_slider_4').show().revolution({
                    dottedOverlay: 'none',
                    delay: 5000,
                    startwidth: 1170,
                    startheight: 650,

                    hideThumbs: 200,
                    thumbWidth: 200,
                    thumbHeight: 50,
                    thumbAmount: 2,

                    navigationType: 'thumb',
                    navigationArrows: 'solo',
                    navigationStyle: 'round',

                    touchenabled: 'on',
                    onHoverStop: 'on',

                    swipe_velocity: 0.7,
                    swipe_min_touches: 1,
                    swipe_max_touches: 1,
                    drag_block_vertical: false,

                    spinner: 'spinner0',
                    keyboardNavigation: 'off',

                    navigationHAlign: 'center',
                    navigationVAlign: 'bottom',
                    navigationHOffset: 0,
                    navigationVOffset: 20,

                    soloArrowLeftHalign: 'left',
                    soloArrowLeftValign: 'center',
                    soloArrowLeftHOffset: 20,
                    soloArrowLeftVOffset: 0,

                    soloArrowRightHalign: 'right',
                    soloArrowRightValign: 'center',
                    soloArrowRightHOffset: 20,
                    soloArrowRightVOffset: 0,

                    shadow: 0,
                    fullWidth: 'on',
                    fullScreen: 'off',

                    stopLoop: 'off',
                    stopAfterLoops: -1,
                    stopAtSlide: -1,

                    shuffle: 'off',

                    autoHeight: 'off',
                    forceFullWidth: 'on',
                    fullScreenAlignForce: 'off',
                    minFullScreenHeight: 0,
                    hideNavDelayOnMobile: 1500,

                    hideThumbsOnMobile: 'off',
                    hideBulletsOnMobile: 'off',
                    hideArrowsOnMobile: 'off',
                    hideThumbsUnderResolution: 0,

                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    startWithSlide: 0,
                    fullScreenOffsetContainer: ''
                });
            });
        </script>
        <script>
            var dthen1 = new Date("12/25/17 11:59:00 PM");
            start = "08/04/15 03:02:11 AM";
            start_date = Date.parse(start);
            var dnow1 = new Date(start_date);
            if (CountStepper > 0)
                ddiff = new Date((dnow1) - (dthen1));
            else
                ddiff = new Date((dthen1) - (dnow1));
            gsecs1 = Math.floor(ddiff.valueOf() / 1000);

            var iid1 = "countbox_1";
            CountBack_slider(gsecs1, "countbox_1", 1);
        </script>
</body>

</html>

</html>