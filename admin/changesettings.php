<?php
session_start();
if (!$_SESSION['User']) {
    $msg = "Session Not Started";
    echo "<script>window.top.location='../login/login-page.php?msg=$msg'</script>";
}
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Account Settings</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin Dashboard</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../logout.php?logout">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    </ul>
            </nav>

            <div class="container-fluid">
                <div class="row">
                    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                        <div class="sidebar-sticky">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link " href="index.php">
                                        <span data-feather="list"></span>
                                        Vehicles <span class="sr-only">(current)</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="addvehicle.php">
                                        <span data-feather="plus-circle"></span>
                                        Add vehicle
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="allusers.php">
                                        <span data-feather="users"></span>
                                        Users
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="allmanufacturers.php">
                                        <span data-feather="file-text"></span>
                                        Manufacturers
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="addmanufacturer.php">
                                        <span data-feather="plus-circle"></span>
                                        Add manufacturer
                                    </a>
                                </li>

                                <div class="dropdown-divider"></div>

                                <li class="nav-item">
                                    <a class="nav-link active" href="changesettings.php">
                                        <span data-feather="settings"></span>
                                        Settings
                                    </a>
                                </li>
                        </div>
                    </nav>

                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="container">
                            <h5 class="text-center">Account Details </h5>

                            <form id="myform" action="edit/editdetails.php" method="post" enctype="multipart/form-data">


                                <div class="form-group">
                                    <label>First Name :</label>
                                    <input type="text" class="form-control" value="" name="fname">
                                </div>
                                <div class="form-group">
                                    <label>Last Name :</label>
                                    <input type="text" class="form-control" value="" name="lname">
                                </div>
                                <div class="form-group">
                                    <label>User Name :</label>
                                    <input type="text" class="form-control" value="" name="uname">
                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    <input type="email" class="form-control" value="" name="uname">
                                </div>
                                <div class="form-group">
                                    <label>Password :</label>
                                    <input type="password" class="form-control" value="" name="uname">
                                </div>

                                <button id="saveForm" type="button" class="btn btn-success btn-block">Update</button>
                            </form>
                            <span id="result"></span>
                        </div>
                        <br>


                    </main>

                    <script src="../js/jquery-2.2.3.min.js"></script>
                    <script>
                        $("#saveForm").click(function() {
                            $.post($("#myform").attr("action"), $("#myform :input").serializeArray(), function(info) {
                                $("#result").html(info);
                            });
                            clearInput();

                        });

                        $("#myform").submit(function() {
                            return false;
                        });

                        /*function clearInput(){

                         $("#myform :input").each(function(index, element) {
                         $(this).val('NA');
                         });

                         }*/
                    </script>
                </div>
            </div>

            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/feather.min.js"></script>
            <script src="js/Chart.min.js"></script>
            <script src="js/dashboard.js"></script>
</body>

</html>