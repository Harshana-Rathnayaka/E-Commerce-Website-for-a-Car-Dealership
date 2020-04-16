<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>My Wishlist</title>
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

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                  <div class="col-lg-6 col-lg-6 col-xs-12 col-sm-6 col-md-6 call-us"><i class="fa fa-clock-o"></i> Mon -
                    Fri : 09am to 06pm <i class="fa fa-phone"></i> 011 2 729 729</div>
                </div>
                <div class="fl-header-right">
                  <div class="fl-links">
                    <div class="no-js">
                      <a title="" class="clicker"></a>
                      <div class="fl-nav-links">
                        <h3><a href="../user/index.php">My Acount</a></h3>
                        <ul class="links">
                          <li><a href="../login/login-page.php" title="Login">Login</a></li>
                          <li><a href="../register/index.php" title="Register">Register</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>

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
                            <li class="level1 first parent"><a href="accessories-detail.html"><span>Accessories
                                  Detail</span></a> </li>
                          </ul>
                        </li>

                        <li class="mega-menu hidden-sm"> <a class="level-top" href="compare.html"><span>Compare
                              Cars‎</span></a> </li>
                        <li class="mega-menu hidden-sm"> <a class="level-top" href="contact-us.html"><span>Contact‎</span></a> </li>
                        <li class="mega-menu hidden-sm"> <a class="level-top" href="about-us.html"><span>About
                              us‎</span></a> </li>

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
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="page-title">
              <h2>My Wishlist</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- BEGIN Main Container col2-right -->
    <section class="main-container col2-right-layout">
      <div class="main container">
        <div class="row">
          <section class="col-main col-sm-9 col-xs-12 wow bounceInUp animated animated" style="visibility: visible;">
            <div class="my-account">

              <?php
              if (@$_SESSION['success'] == true) {
                $success = $_SESSION['success'];
                ?>
                <script>
                  swal({
                    title: "SUCCESS!",
                    text: "<?php echo $success; ?>",
                    icon: "success",
                    button: "OK",
                  });
                </script>
              <?php
                unset($_SESSION['success']);
              } elseif (@$_SESSION['error'] == true) {
                $error = $_SESSION['error'];
                ?>
                <script>
                  swal({
                    title: "ERROR!",
                    text: "<?php echo $error; ?>",
                    icon: "warning",
                    button: "OK",
                  });
                </script>
              <?php
                unset($_SESSION['error']);
              } elseif (@$_SESSION['missing'] == true) {
                $missing = $_SESSION['missing'];
                ?>
                <script>
                  swal({
                    title: "INFO!",
                    text: "<?php echo $missing; ?>",
                    icon: "info",
                    button: "OK",
                  });
                </script>
              <?php
                unset($_SESSION['missing']);
              }
              ?>

              <div class="my-wishlist">
                <fieldset>
                  <input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">
                  <div class="table-responsive">
                    <table class="clean-table linearize-table data-table table-striped" id="wishlist-table">
                      <thead>
                        <tr class="first last">
                          <th class="customer-wishlist-item-image"></th>
                          <th class="customer-wishlist-item-info"></th>
                          <th class="customer-wishlist-item-quantity">Quantity</th>
                          <th class="customer-wishlist-item-price">Price</th>
                          <th class="customer-wishlist-item-cart"></th>
                          <th class="customer-wishlist-item-remove"></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $user_id = $_SESSION['Id'];
                        include '../api/getWishlist.php';
                        if ($result) {
                          while ($row = mysqli_fetch_array($result)) {

                            $username = $row['username'];
                            $make = $row['name'];
                            $model = $row['model'];
                            $year = $row['year'];
                            $capacity = $row['engine_capacity'];
                            $horsepower = $row['horsepower'];
                            $condition = $row['vehicle_condition'];
                            $colour = $row['colour'];
                            $seats = $row['seats'];
                            $price = $row['price'];
                            $image_link = $row['image_link'];
                            $quantity = $row['quantity'];

                            $vehicle_id = $row['vehicle_id'];
                            $wishlist_id = $row['wishlist_id'];
                            $make_id = $row['make_id'];

                            $total = $price * $quantity;

                            ?>

                            <tr id="item_32" class="first odd">

                              <td class="wishlist-cell0 customer-wishlist-item-image"><a class="product-image" href="product-detail.html" title="Slim Fit Casual Shirt"> <img src="../vehicleimages/<?php echo $image_link; ?>" width="80" height="80" alt="Vehicle"> </a>
                              </td>

                              <td class="wishlist-cell1 customer-wishlist-item-info">
                                <h3 class="product-name"><a href="product-detail.html" title="Vehicle"><?php echo $make; ?> <?php echo $model; ?> <?php echo $year; ?></a></h3>
                                <div class="description std">
                                  <div class="inner">
                                    <?php echo $capacity; ?> leters <br>
                                    <?php echo $horsepower; ?> Hp <br>
                                    <?php echo $condition; ?> <br>
                                    <?php echo $colour; ?> <br>
                                    <?php echo $seats; ?> seats <br>
                                  </div>
                                </div>
                              </td>



                              <td class="wishlist-cell2 customer-wishlist-item-quantity" data-rwd-label="Quantity">
                                <div class="cart-cell">
                                  <div class="add-to-cart-alt">
                                    <input type="text" pattern="\d*" readonly class="input-text qty validate-not-negative-number" name="qty[32]" value="<?php echo $quantity; ?>">
                                  </div>
                                </div>
                              </td>

                              <td class="wishlist-cell3 customer-wishlist-item-price" data-rwd-label="Price">
                                <div class="cart-cell">
                                  <div class="price-box"> <span class="regular-price" id="product-price-2"> <span class="price">LKR <?php echo $total; ?></span> </span> </div>
                                </div>
                              </td>

                              <td class="wishlist-cell4 customer-wishlist-item-cart">
                                <div class="cart-cell">
                                  <form action="../api/addToCart.php" method="POST">
                                    <input type="hidden" name="userId" value="<?php echo $user_id; ?>">
                                    <input type="hidden" name="vehicleId" value="<?php echo $vehicle_id; ?>">
                                    <input type="hidden" name="makeId" value="<?php echo $make_id; ?>">
                                    <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
                                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                                    <input type="submit" name="btnAddToCart" class="button" value="Add to cart">
                                  </form>
                                </div>
                              </td>

                              <td class="wishlist-cell5 customer-wishlist-item-remove last">
                                <form action="../api/deleteFromWishlist.php" method="post">
                                  <input type="hidden" name="formId" value="dealershipWishlist">
                                  <input type="hidden" name="wishlistId" value="<?php echo $wishlist_id; ?>">
                                  <input type="submit" name="deleteFromWishlist" class="button" value="Delete">
                                </form>
                              </td>

                            </tr>

                        <?php
                          }
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>
                </fieldset>
              </div>
            </div>
          </section>

          <!--col-main col-sm-9 wow bounceInUp animated-->
          <aside class="col-right sidebar col-sm-3 col-xs-12 wow bounceInUp animated animated" style="visibility: visible;">
            <div class="block block-account">
              <div class="block-title"> My Account </div>
              <div class="block-content">
                <ul>
                  <li><a href="../user/index.php"><span> Account Dashboard</span></a></li>
                  <li><a href="../user/myorders.php"><span> My Orders</span></a></li>
                  <li class="current"><a>My Wishlist</a></li>
                </ul>
              </div>
              <!--block-content-->
            </div>
            <!--block block-account-->


          </aside>
          <!--col-right sidebar col-sm-3 wow bounceInUp animated-->
        </div>
        <!--row-->
      </div>
      <!--main container-->
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
            <div class="col-sm-4 col-xs-12 coppyright"><a target="_blank" href="https://github.com/Harshana-Rathnayaka">2020 Dreeko Corporations. All Rights Reserved. &copy;
                &reg;</a></div>
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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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