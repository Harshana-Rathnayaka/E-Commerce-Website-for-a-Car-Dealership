<?php
session_start();
if (isset($_SESSION['User'])) {
    header("location:../welcome.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title Page-->
    <title>IPT - Register</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form action="../api/registerUser.php" method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="First Name" name="firstname" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Last Name" name="lastname" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Username" name="username" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="usertype">
                                    <option disabled="disabled" selected="selected">Account Type</option>
                                    <option value="1">Student</option>
                                    <option value="2">Company</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="Register">REGISTER</button>
                        </div>
                        <div class="text-center bg-blue">
                            <span class="txt1">
                                Already a member?
                            </span>

                            <a class="txt1 bo1 hov1" href="../login/login-page.php">
                                Login now
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->