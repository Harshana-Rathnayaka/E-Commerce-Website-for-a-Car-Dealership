<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Vehicle List </title>
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
                  <div class="col-lg-6 col-lg-6 col-xs-12 col-sm-6 col-md-6 call-us"><i class="fa fa-clock-o"></i> Mon -
                    Fri : 09am to 06pm <i class="fa fa-phone"></i> 011 2 729 729</div>
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
                        <li class="level0 parent drop-menu"> <a class="level-top" href="#"><span>Listing‎</span></a> </li>
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
                <li class="category1601"> <strong>Vehicles</strong> </li>
              </ul>
            </div>
            <!--col-xs-12-->
          </div>
          <!--row-->
        </div>
        <!--container-->
      </div>
      <div class="page-title">
        <h2>VEHICLE LISTING</h2>
      </div>
    </div>
    <!--breadcrumbs-->

    <!-- BEGIN Main Container col2-left -->
    <section class="main-container col2-left-layout bounceInUp animated">
      <div class="container">
        <div class="row">
          <div class="col-main col-sm-9 col-sm-push-3 product-grid">
            <div class="pro-coloumn">
              <article class="col-main">
                <div class="toolbar">
                  <div class="sorter">
                    <div class="view-mode"><a href="grid.html" title="List" class="button-grid">&nbsp;</a> <span title="list" class="button button-active button-list">&nbsp;</span> </div>
                  </div>
                  <div id="sort-by">
                    <label class="left">Sort By: </label>
                    <ul>
                      <li><a href="#">Position<span class="right-arrow"></span></a>
                        <ul>
                          <li><a href="#">Name</a></li>
                          <li><a href="#">Price</a></li>
                          <li><a href="#">Position</a></li>
                        </ul>
                      </li>
                    </ul>
                    <a class="button-asc left" href="#" title="Set Descending Direction"><span class="top_arrow"></span></a>
                  </div>
                  <div class="pager">
                    <div id="limiter">
                      <label>View: </label>
                      <ul>
                        <li><a href="#">15<span class="right-arrow"></span></a>
                          <ul>
                            <li><a href="#">20</a></li>
                            <li><a href="#">30</a></li>
                            <li><a href="#">35</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <div class="pages">
                      <label>Page:</label>
                      <ul class="pagination">
                        <li><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                      </ul>
                    </div>
                  </div>
                </div>

                <?php
                include '../api/getVehicles.php';
                if ($result) {
                  while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <div class="category-products">
                      <ol class="products-list" id="products-list">
                        <li class="item first">
                          <div class="product-image">
                            <a href="details.php?vehicle_id=<?php echo $row['vehicle_id']; ?>" title="See details">
                              <img class="small-image" src="../vehicleimages/<?php echo $row['image_link']; ?>" alt="Vehicle image">
                            </a>
                          </div>
                          <div class="product-shop">
                            <h2 class="product-name"><a href="details.php?vehicle_id=<?php echo $row['vehicle_id']; ?>" title="See details"><?php echo $row['name']; ?> <?php echo $row['model']; ?></a></h2>

                            <div class="desc std">
                              <b> Engine Capacity: </b> <?php echo $row['engine_capacity']; ?> leters <br>
                              <b> Transmission: </b> <?php echo $row['transmission_type']; ?> transmission <br>
                              <b> Horsepower: </b> <?php echo $row['horsepower']; ?>Hp <br>
                              <a class="link-learn" title="See details" href="details.php?vehicle_id=<?php echo $row['vehicle_id']; ?>">Learn More....</a>
                              </p>
                            </div>
                            <div class="price-box">
                              <p class="special-price"> <span class="price-label"></span> <span id="product-price-212" class="price"> LKR <?php echo $row['price']; ?> </span> </p>
                            </div>
                            <!-- <div class="actions">
                              <button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>Add to
                                  Cart</span></button>
                              <span class="add-to-links">
                                <a title="Add to Wishlist" class="button link-wishlist" href="#">
                                  <span>Add to Wishlist</span>
                                </a>
                              </span>
                            </div> -->
                          </div>
                        </li>




                      </ol>
                    </div>

                <?php
                  }
                }
                ?>


                <div class="toolbar bottom">
                  <div id="sort-by">
                    <label class="left">Sort By: </label>
                    <ul>
                      <li><a href="#">Position<span class="right-arrow"></span></a>
                        <ul>
                          <li><a href="#">Name</a></li>
                          <li><a href="#">Price</a></li>
                          <li><a href="#">Position</a></li>
                        </ul>
                      </li>
                    </ul>
                    <a class="button-asc left" href="#" title="Set Descending Direction"><span class="top_arrow"></span></a>
                  </div>
                  <div class="pager">
                    <div id="limiter">
                      <label>View: </label>
                      <ul>
                        <li><a href="#">15<span class="right-arrow"></span></a>
                          <ul>
                            <li><a href="#">20</a></li>
                            <li><a href="#">30</a></li>
                            <li><a href="#">35</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <div class="pages">
                      <label>Page:</label>
                      <ul class="pagination">
                        <li><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                      </ul>
                    </div>
                  </div>
                </div>

              </article>
            </div>
            <!--	///*///======    End article  ========= //*/// -->
          </div>

          <!--col-right sidebar-->
        </div>
        <!--row-->
      </div>
      <!--container-->
    </section>
    <!--main-container col2-left-layout-->

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
            <div class="col-sm-4 col-xs-12 coppyright"><a target="_blank" href="https://github.com/Harshana-Rathnayaka">2020 Dreeko Corporations &reg; | All Rights Reserved.
                &copy;</a></div>
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
  <script type="text/javascript">
    function HideMe() {
      jQuery('.popup1').hide();
      jQuery('#fade').hide();
    }
  </script>

</body>

</html>