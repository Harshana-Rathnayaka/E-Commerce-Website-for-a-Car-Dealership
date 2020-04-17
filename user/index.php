<?php
session_start();
if (!isset($_SESSION['User'])) {
    $_SESSION['error'] = "Session timed out. Please login to continue.";
    header('location:../login/login-page.php');
} elseif (isset($_SESSION['UserType'])) {
    $usertype = $_SESSION['UserType'];

    if ($usertype == 0) {
        header('location:../admin/index.php');
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Dashboard </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="search-panel">
                <div class="search-inner d-flex align-items-center justify-content-center">
                    <div class="close-btn">Close <i class="fa fa-close"></i></div>
                    <form id="searchForm" action="#">
                        <div class="form-group">
                            <input type="search" name="search" placeholder="What are you searching for...">
                            <button type="submit" class="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <!-- Navbar Header-->
                    <a href="index.html" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Main</strong><strong>Dashboard</strong></div>
                        <div class="brand-text brand-sm"><strong class="text-primary">M</strong><strong>D</strong></div>
                    </a>
                    <!-- Sidebar Toggle Btn-->
                    <button class="sidebar-toggle" title="Hide sidebar"><i class="fa fa-long-arrow-left"></i></button>
                </div>
                <div class="right-menu list-inline no-margin-bottom">
                    <div class="list-inline-item"><a href="#" title="Search" class="search-open nav-link"><i class="fa fa-search"></i></a></div>
                    <!-- Go to website -->
                    <div class="list-inline-item"> <a id="website" title="Go to website" href="../dealership/index.php" class="nav-link">Buy Cars <i class="fa fa-globe"></i></a></div>
                    <!-- Log out               -->
                    <div class="list-inline-item logout"> <a id="logout" title="Logout" href="../logout.php?logout" class="nav-link">Logout <i class="fa fa-sign-out"></i></a></div>
                </div>
            </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="img/avatar-6.jpg" title="Profile picture" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1 class="h5" title="Name"><?php echo $_SESSION['FirstName']; ?> <?php echo $_SESSION['LastName']; ?></h1>
                    <p title="Email"><?php echo $_SESSION['Email']; ?></p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus-->
            <span class="heading">Main</span>
            <ul class="list-unstyled">
                <li class="active">
                    <a href="index.php" title="Home"> <i class="fa fa-home"></i>Home </a>
                </li>
                <li>
                    <a href="myorders.php" title="Orders"> <i class="fa fa-history"></i>My Orders </a>
                </li>
                <li>
                    <a href="mycart.php" title="Cart"> <i class="fa fa-shopping-cart"></i>My Cart </a>
                </li>
                <li>
                    <a href="mywishlist.php" title="Wishlist"> <i class="fa fa-shopping-basket"></i>My Wishlist </a>
                </li>
            </ul><span class="heading" title="More actions">Actions</span>
            <ul class="list-unstyled">
                <li>
                    <a href="settings.php" title="Settings"> <i class="fa fa-wrench"></i>Settings </a>
                </li>
                <li>
                    <a href="deleteaccount.php" title="Delete account"> <i class="fa fa-minus-circle"></i>Delete My Account </a>
                </li>
            </ul>

        </nav>
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Home</h2>
                </div>
            </div>

            <?php

            require_once '../includes/dbOperations.php';
            $user_id = $_SESSION['Id'];

            $db = new DbOperations();

            $vehicle_count = $db->getVehicleCount();
            $cart_count = $db->getCartCountByUserId($user_id);
            $wishlist_count = $db->getWishlistCountByUserId($user_id);


            ?>
            <section class="no-padding-top no-padding-bottom">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="statistic-block block" title="Vehicles currently on sale">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="fa fa-car"></i></div><strong>Vehicles On Sale</strong>
                                    </div>
                                    <div class="number dashtext-1"><?php echo $vehicle_count; ?></div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: <?php echo $vehicle_count; ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="statistic-block block" title="My orders">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="fa fa-history"></i></div><strong>My Orders</strong>
                                    </div>
                                    <div class="number dashtext-2">375</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="statistic-block block" title="My cart">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="fa fa-shopping-cart"></i></div><strong>My Cart</strong>
                                    </div>
                                    <div class="number dashtext-3"><?php echo $cart_count; ?></div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: <?php echo $cart_count; ?>%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-5"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="statistic-block block" title="My wishlist">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="fa fa-shopping-basket"></i></div><strong>My Wishlist</strong>
                                    </div>
                                    <div class="number dashtext-4"><?php echo $wishlist_count; ?></div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: <?php echo $wishlist_count; ?>%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-info"><i class="fa fa-list-ol"></i></th>
                                                <th class="text-info">First Name</th>
                                                <th class="text-info">Last Name</th>
                                                <th class="text-info">Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <p class="no-margin-bottom">2020 &copy; Dreeko Corporations | All Rights Reserved. <a title="www.github.com/Harshana-Rathnayaka" target="_blank" href="https://github.com/Harshana-Rathnayaka" class="icon-repo-forked"> Repository &rightarrowtail;</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
</body>

</html>