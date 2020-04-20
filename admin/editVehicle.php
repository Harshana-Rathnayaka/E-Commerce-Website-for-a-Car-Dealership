<?php
session_start();
if (!isset($_SESSION['User'])) {
    $_SESSION['error'] = "Session timed out. Please login to continue.";
    header('location:../login/login-page.php');
} elseif (isset($_SESSION['UserType'])) {
    $usertype = $_SESSION['UserType'];

    if ($usertype == 1) {
        header('location:../user/index.php');
    }
}
?>


<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Vehicle Details</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-center text-info" href="#">Welcome <?php echo $_SESSION['User']; ?>!</a>
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
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link active " href="index.php">
                                <span data-feather="list"></span>
                                Vehicles <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="addvehicle.php">
                                <span data-feather="plus-circle"></span>
                                Add Vehicle
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="pendingorders.php">
                                <span data-feather="shopping-bag"></span>
                                Pending Orders
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="allorders.php">
                                <span data-feather="rotate-ccw"></span>
                                All Orders
                            </a>
                        </li>

                        <div class="dropdown-divider"></div>

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
                                Add Manufacturer
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="colours.php">
                                <span data-feather="droplet"></span>
                                Colours
                            </a>
                        </li>

                        <div class="dropdown-divider"></div>

                        <li class="nav-item">
                            <a class="nav-link" href="changesettings.php">
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
                            <li class="breadcrumb-item"><a href="index.php">Vehicles</a></li>
                            <li class="breadcrumb-item"><a href="viewvehicle.php">Vehicle Details</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Vehicle Details</li>
                        </ol>
                    </nav>
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

                <form id="updateVehicleForm" action="../api/updateVehicleDetails.php" method="POST" enctype="multipart/form-data">

                    <div class="form-row">

                        <?php
                        if (isset($_POST['btnEdit'])) {
                            require_once '../includes/dbOperations.php';
                            $vehicle_id = $_POST['vehicleId'];
                            $db = new DbOperations();
                            $result = $db->getVehicleByID($vehicle_id);

                            ?>

                            <input type="hidden" name="vehicleId" value="<?php echo $result['vehicle_id']; ?>">

                            <div class="form-group col-md-3">
                                <label for="inputModel">Model :</label>
                                <input type="text" name="model" value="<?php echo $result['model']; ?>" class="form-control" id="inputModel" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputYear">Year :</label>
                                <input type="text" name="year" value="<?php echo $result['year']; ?>" class="form-control" id="inputYear" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputEngine">Engine :</label>
                                <input type="text" name="engine" value="<?php echo $result['engine_capacity']; ?>" class="form-control" id="inputEngine" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputHorsepower">Horsepower :</label>
                                <input type="text" name="horsepower" value="<?php echo $result['horsepower']; ?>" class="form-control" id="inputHorsepower" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputCondition">Condition :</label>
                                <input type="text" name="condition" value="<?php echo $result['vehicle_condition']; ?>" class="form-control" id="inputCondition" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputTransmission">Transmission :</label>
                                <select class="form-control" id="inputTransmission" name="transmission" required>
                                    <option value="<?php echo $result['id']; ?>"><?php echo $result['transmission_type']; ?> (Selected)</option>
                                    <option value="1">Manual</option>
                                    <option value="2">Automatic</option>
                                </select>
                            </div>


                            <div class="form-group col-md-3">
                                <label for="inputSeats">Number of Seats :</label>
                                <input type="text" name="seats" value="<?php echo $result['seats']; ?>" class="form-control" id="inputSeats" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputSeats">Price :</label>
                                <input type="text" name="price" value="<?php echo $result['price']; ?>" class="form-control" id="inputPrice" required>
                            </div>

                            <?php
                                $in_stock = $result['in_stock'];
                                if ($in_stock == 1) {
                                    ?>
                                <div class="form-group col-md-8">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" value="0" name="inStock" checked class="custom-control-input" id="inStock">
                                        <label class="custom-control-label" for="inStock">Out of Stock</label>
                                    </div>
                                </div>
                            <?php
                                } else {
                                    ?>
                                <div class="form-group col-md-8">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" value="1" name="inStock" class="custom-control-input" id="inStock">
                                        <label class="custom-control-label" for="inStock">Out of Stock</label>
                                    </div>
                                </div>
                            <?php
                                }
                                ?>

                    </div>

                    <button name="updateVehicleButton" type="submit" class="btn btn-success btn-block">Save</button>
                    <a href="viewVehicle.php?vehicle_id=<?php echo $result['vehicle_id']; ?>" class="btn btn-danger btn-block">Cancel</a>

                </form>
            <?php
            }
            ?>

            </main>

            <div class="ml-auto mr-auto text-center py-5 mt-5">
                <footer class="footer">
                    <div class="footer__block block no-margin-bottom">
                        <div class="container-fluid text-center">
                            <p class="no-margin-bottom">2020 &copy; Dreeko Corporations | All Rights Reserved. <a title="www.github.com/Harshana-Rathnayaka" target="_blank" href="https://github.com/Harshana-Rathnayaka" class="icon-repo-forked"> Repository &rightarrowtail;</a></p>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/feather.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/dashboard.js"></script>

    <!--===============================================================================================-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

</body>

</html>