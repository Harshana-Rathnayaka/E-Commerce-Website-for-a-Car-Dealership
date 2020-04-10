<?php
session_start();
if (!isset($_SESSION['User'])) {
    $msg = "You are currently logged out. Please log in to continue.";
    // header('location:../login/login-page.php?Error=You are not logged in. Please log in to continue');
    header('location:../login/login-page.php?Error=You are currently logged out. Please log in to continue.');
}
echo json_encode($msg);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Reports</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />


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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">GTF Dashboard</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../logout.php">Sign out</a>
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
                                <span data-feather="file"></span>
                                Pending Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="all_reports.php">
                                <span data-feather="file"></span>
                                All Reports
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="admin.php">
                                <span data-feather="users"></span>
                                Administrators
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gtf.php">
                                <span data-feather="users"></span>
                                Green Task Force
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="garbagestaff.php">
                                <span data-feather="users"></span>
                                Garbage Staff
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="greenmanagers.php">
                                <span data-feather="users"></span>
                                Green Managers
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="changesettings.php">
                                <span data-feather="settings"></span>
                                Change Settings
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="newusers.php">
                                <span data-feather="users"></span>
                                Add New Users
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Blog</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="allposts.php">
                                <span data-feather="file-text"></span>
                                All Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="newposts.php">
                                <span data-feather="file-text"></span>
                                New Post
                            </a>
                        </li>


                    </ul>

                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>

                </div>

                <div class="container">
                    <h2>View Report</h2>
                    <?php
                    $R_ID = $_REQUEST['R_ID'];
                    $U_ID = $_SESSION['id'];

                    include '../connection.php';
                    $check_query = $db->query("SELECT * FROM reports WHERE R_ID='$R_ID'");
                    $check_query_Run = $check_query->fetch_assoc();

                    ?>

                    <div class="form-group">
                        <img src="../reportimages/<?php echo $check_query_Run['R_URL']; ?>" width="150" height="150" />
                        <br>
                        <label>Uploaded Image:</label>
                    </div>

                    <div class="form-group">
                        <label>Location :</label>
                        <label><?php echo $check_query_Run['Location']; ?></label>

                    </div>
                    <div class="form-group">
                        <label>Location :</label>
                        <label><?php echo $check_query_Run['gps']; ?></label>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <label><?php echo $check_query_Run['Desciption']; ?></label>
                    </div>



                </div>
                <br>

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