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
                    <div class="list-inline-item"><a href="#" title="Search" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>
                    <!-- Log out               -->
                    <div class="list-inline-item logout"> <a id="logout" title="Logout" href="../logout.php?logout" class="nav-link">Logout <i class="icon-logout"></i></a></div>
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
                    <a href="index.php" title="Home"> <i class="icon-home"></i>Home </a>
                </li>
                <li>
                    <a href="myorders.php" title="Orders"> <i class="icon-bill"></i>My Orders </a>
                </li>
                <li>
                    <a href="mycart.php" title="Cart"> <i class="icon-list"></i>My Cart </a>
                </li>
                <li>
                    <a href="mywishlist.php" title="Wishlist"> <i class="icon-list-1"></i>My Wishlist </a>
                </li>
            </ul><span class="heading" title="More actions">Actions</span>
            <ul class="list-unstyled">
                <li>
                    <a href="settings.php" title="Settings"> <i class="icon-settings"></i>Settings </a>
                </li>
                <li class="active">
                    <a href="deleteaccount.php" title="Delete account"> <i class="icon-logout"></i>Delete My Account </a>
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