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
                <li>
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
                <li class="active">
                    <a href="deleteaccount.php" title="Delete account"> <i class="fa fa-minus-circle"></i>Delete My Account </a>
                </li>
            </ul>

        </nav>
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            <!-- Page Header-->
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Delete Account</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Delete My Account </li>
                </ul>
            </div>

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
                        icon: "error",
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

            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-11">

                            <form action="../api/deleteMyAccount.php" class="form-horizontal" method="POST">

                                <input type="hidden" name="userid" value="<?php echo $_SESSION['Id']; ?>">

                                <div class="line"></div>
                                <div class="form-group">
                                    <p class="col-sm-12 form-control-label">
                                        This action is irreversible.
                                        You will lose access to all your data in the site as well as access to your account.
                                        Are you sure you want to delete your account?</p>

                                    <div class="col-sm-12">
                                        <input type="checkbox" value="0" required name="confirm" class="checkbox-template">
                                        <label class="col-sm-11">I understand. Delete my account.</label>
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-12 ml-auto">
                                        <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
                                        <input type="submit" value="Confirm" name="btnConfirm" class="btn btn-outline-success">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <p class="no-margin-bottom">2020 &copy; Dreeko Corporations | All Rights Reserved. <a target="_blank" href="https://github.com/Harshana-Rathnayaka" class="icon-repo-forked">
                                Repository &rightarrowtail;</a></p>
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