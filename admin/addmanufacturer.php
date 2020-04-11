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
    <title>Add a Manufacturer</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Username : <?php echo $_SESSION['User'] ?></a>
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
                            <a class="nav-link active" href="addmanufacturer.php">
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
                            <li class="breadcrumb-item active" aria-current="page">Add manufacturer</li>
                        </ol>
                    </nav>
                </div>


                <form id="addManufacturerForm" action="../api/addNewManufacturer.php" method="POST">

                    <div class="form-group">

                        <div class="form-group">
                            <label for="inputName">Name :</label>
                            <input type="text" name="name" class="form-control" id="inputName" placeholder="Name of the company" required>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Address :</label>
                            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address of the company" required>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">Email :</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="example@mail.com" required>
                        </div>

                        <div class="form-group">
                            <label for="inputContact">Contact :</label>
                            <input type="tel" name="contact" class="form-control" id="inputContact" placeholder="0751245252" required>
                        </div>

                        <?php
                        if (@$_GET['Invalid'] == true) {
                            ?>
                            <div class="alert-light text-danger text-center py-1">
                                <h6> <?php echo $_GET['Invalid']; ?> </h6>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="form-group">
                            <input type="submit" value="Add" class="btn btn-success btn-block" id="btnAddManufacturer">
                            <input type="reset" value="Cancel" class="btn btn-danger btn-block" id="btnCancel">
                        </div>

                    </div>

                </form>

                <span id="result"></span>

            </main>
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