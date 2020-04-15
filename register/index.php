<?php
session_start();
if (isset($_SESSION['User'])) {
    $usertype = $_SESSION['UserType'];
    if ($usertype == 0) {
        header("location:../admin/index.php");
    } elseif ($usertype == 1) {
        header("location:../user/index.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registration</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>

                    <form action="../api/registerUser.php" method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">First Name</label>
                                    <input class="input--style-4" type="text" placeholder="First Name" required="" name="firstname">
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" placeholder="Last Name" required="" name="lastname">
                                </div>
                            </div>

                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" value="male" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" id="checkEmail" type="email" placeholder="example@this.com" required="" name="email">
                                    <small id="emailError" class="text-success "></small>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" placeholder="0114567896" required="" name="contact">
                                </div>
                            </div>

                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Username</label>
                                    <input class="input--style-4" type="text" id="usernameCheck" placeholder="user11" required="" name="username">
                                    <small id="userError" class="text-success "></small>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" required="" name="password">
                                </div>
                            </div>

                        </div>

                        <?php
                        if (@$_SESSION['error'] == true) {
                            ?>
                            <div class=" text-danger alert text-center py-3">
                                <?php echo $_SESSION['error']; ?>
                            </div>
                        <?php
                            unset($_SESSION['error']);
                        } elseif (@$_SESSION['missing'] == true) {
                            ?>
                            <div class=" text-danger alert text-center py-3">
                                <?php echo $_SESSION['missing']; ?>
                            </div>
                        <?php
                            unset($_SESSION['missing']);
                        }
                        ?>

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" name="Register" type="submit">REGISTER</button>
                        </div>

                    </form>

                    <div class="p-t-15 col-3">
                        <label class="label">Already a member? <a href="../login/login-page.php">Login now</a> </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <!-- script to check the availability of the email -->
    <script>
        $(document).ready(function() {
            $('#checkEmail').keyup(function(e) {

                var email = $('#checkEmail').val();

                $.ajax({
                    type: "POST",
                    url: "../api/isEmailAvailable.php",
                    data: {
                        'Register': 1,
                        'email_value': email,
                    },
                    success: function(response) {
                        $('#emailError').text(response);

                    }
                });
            });
        });
    </script>

    <!-- script to check the availability of the username -->
    <script>
        $(document).ready(function() {
            $('#usernameCheck').keyup(function(e) {

                var username = $('#usernameCheck').val();

                $.ajax({
                    type: "POST",
                    url: "../api/isUsernameAvailable.php",
                    data: {
                        'Register': 1,
                        'username_value': username,

                    },
                    success: function(response) {
                        $('#userError').text(response);

                    }
                });
            });
        });
    </script>



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->