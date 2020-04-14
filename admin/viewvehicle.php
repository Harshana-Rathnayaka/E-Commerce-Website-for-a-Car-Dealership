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
                    </ul>
            </nav>

            <div class="container-fluid">
                <div class="row">
                    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                        <div class="sidebar-sticky">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link active" href="index.php">
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
                                    <li class="breadcrumb-item active" aria-current="page">Vehicle Details</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="container">
                            <?php
                            require_once '../includes/dbOperations.php';
                            $vehicle_id = $_REQUEST['vehicle_id'];
                            $db = new DbOperations();
                            $result = $db->getVehicleByID($vehicle_id);
                            ?>

                            <form action="editVehicle.php" method="POST">
                                <input type="hidden" name="vehicleId" value="<?php echo $result['vehicle_id']; ?>">
                                <button class="btn btn-success form-control" name="btnEdit"> Edit </button>
                            </form>
                            <form action="../api/deleteVehicle.php" method="POST">
                                <br>
                                <input type="hidden" name="vehicleId" value="<?php echo $result['vehicle_id']; ?>">
                                <button type="submit" class="btn btn-danger form-control" name="btnDelete"> Delete </button>
                                <hr>
                            </form>

                            <form>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Vehicle ID :</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $result['vehicle_id'] ?>">
                                    </div>

                                    <label class="col-sm-2 col-form-label">Make :</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $result['name']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Model :</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $result['model']; ?>">
                                    </div>

                                    <label class="col-sm-2 col-form-label">Year :</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $result['year']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Engine Capacity :</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $result['engine_capacity']; ?>">
                                    </div>

                                    <label class="col-sm-2 col-form-label">Transmission :</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $result['transmission_type']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Horsepower :</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $result['horsepower']; ?>Hp">
                                    </div>

                                    <label class="col-sm-2 col-form-label">Condition :</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $result['vehicle_condition']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Colour :</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $result['colour']; ?>">
                                    </div>

                                    <label class="col-sm-2 col-form-label">Convertible :</label>
                                    <div class="col-sm-4">
                                        <?php $convertible = $result['convertible'];
                                        if ($convertible) {
                                            ?>
                                            <input type="text" readonly class="form-control-plaintext" value="YES">
                                        <?php
                                        } else {
                                            ?>
                                            <input type="text" readonly class="form-control-plaintext" value="NO">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Number of Seats :</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $result['seats']; ?>">
                                    </div>

                                    <label class="col-sm-2 col-form-label">Price :</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $result['price']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">In Stock :</label>
                                    <div class="col-sm-4">
                                        <?php $in_stock = $result['in_stock'];
                                        if ($in_stock) {
                                            ?>
                                            <input type="text" readonly class="form-control-plaintext" value="YES">
                                        <?php
                                        } else {
                                            ?>
                                            <input type="text" readonly class="form-control-plaintext" value="NO">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Image:</label>
                                    <br>
                                    <img src="../vehicleimages/<?php echo $result['image_link']; ?>" width="800" height="300" />
                                </div>

                            </form>
                        </div>
                    </main>
                </div>
            </div>
            <script src="js/jquery-3.3.1.slim.min.js"></script>
            <!-- <script>
        window.jQuery || document.write('<script src="js/jquery-slim.min.js">
    </script>') -->
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/feather.min.js"></script>
            <script src="js/Chart.min.js"></script>
            <script src="js/dashboard.js"></script>
</body>

</html>