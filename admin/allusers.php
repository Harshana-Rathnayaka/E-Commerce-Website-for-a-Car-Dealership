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
  <title>Users</title>

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
                  <a class="nav-link active" href="allusers.php">
                    <span data-feather="users"></span>
                    Users
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="allmanufacturers.php">
                    <span data-feather="file-text"></span>
                    Manufacurers
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="addmanufacturer.php">
                    <span data-feather="plus-circle"></span>
                    Add manufacturer
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
                  <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
              </nav>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-hover table-dark">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="15%">Name</th>
                    <th width="15%">Username</th>
                    <th width="25%">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../api/getUsers.php';
                  if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </main>
        </div>
      </div>
      <script src="js/jquery-3.3.1.slim.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/feather.min.js"></script>
      <script src="js/Chart.min.js"></script>
      <script src="js/dashboard.js"></script>

      <!--===============================================================================================-->
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

</body>

</html>