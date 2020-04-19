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
  <title>Vehicles</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />

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
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-center text-info" href="#">Welcome <?php echo $_SESSION['User']; ?>! </a>
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
              <a class="nav-link active" href="index.php">
                <span data-feather="list"></span>
                Vehicles <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="addvehicle.php">
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

          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
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


        <div class="table-responsive">
          <table id="vehiclesTable" class="table table-striped table-hover table-dark text-center">
            <thead>
              <tr>
                <th width="3%">#</th>
                <th width="3%">Make</th>
                <th width="3%">Model</th>
                <th width="3%">Transmission</th>
                <th width="3%">Condition</th>
                <th width="3%">Colour</th>
                <th>Convertible</th>
                <th>In Stock</th>
                <th>Price</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              <?php
              include '../api/getVehicles.php';
              if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <td><?php echo $vehicle_id = $row['vehicle_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['model']; ?></td>
                    <td><?php echo $row['transmission_type']; ?></td>
                    <td><?php echo $row['vehicle_condition']; ?></td>
                    <td><?php echo $row['colour']; ?></td>
                    <td><?php $convertible = $row['convertible'];
                            if ($convertible == "0") {
                              ?>
                        <span class="text-danger">&times;</span>
                      <?php
                          } elseif ($convertible == "1") {
                            ?>
                        <span class="text-success">&radic;</span>
                      <?php
                          }
                          ?></td>
                    <td><?php $in_stock = $row['in_stock'];
                            if ($in_stock == "0") {
                              ?>
                        <span class="text-danger">&times;</span>
                      <?php
                          } elseif ($in_stock == "1") {
                            ?>
                        <span class="text-success">&radic;</span>
                      <?php
                          }
                          ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td>
                      <form action="viewvehicle.php?vehicle_id=<?php echo $vehicle_id; ?>" method="POST">
                        <button type="submit" name="view" class="btn btn-success btn-sm">View</button>
                      </form>
                    </td>
                  </tr>
              <?php
                }
              }
              ?>

            </tbody>
          </table>
        </div>
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

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#vehiclesTable').DataTable({
        "lengthMenu": [5, 10],
      });
    });
  </script>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/feather.min.js"></script>
  <script src="js/dashboard.js"></script>



</body>

</html>