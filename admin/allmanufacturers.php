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
  <title>Manufacturers</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />

  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

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
              <a class="nav-link " href="index.php">
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
              <a class="nav-link active" href="allmanufacturers.php">
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
              <li class="breadcrumb-item active" aria-current="page">Manufacturers</li>
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

        <!-- ################################################################################################################## -->

        <!-- Edit data modal -->
        <div class="modal fade" id="editManufacturerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editManufacturerModal">Edit Manufacturer Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="../api/updateManufacturer.php" method="POST">
                <div class="modal-body">

                  <input type="hidden" name="manufacturerid" id="manufacturerId">

                  <div class="form-group">
                    <label for="nameText">Name</label>
                    <input type="text" class="form-control" id="nameText" required name="name" placeholder="Enter manufacturer name">
                  </div>

                  <div class="form-group">
                    <label for="addressText">Address</label>
                    <input type="text" class="form-control" id="addressText" required name="address" placeholder="Enter the address">
                  </div>

                  <div class="form-group">
                    <label for="emailText">Email</label>
                    <input type="email" class="form-control" id="emailText" required name="email" placeholder="Enter the email">
                  </div>

                  <div class="form-group">
                    <label for="contactText">Contact</label>
                    <input type="text" class="form-control" id="contactText" required name="contact" placeholder="Enter the phone number">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="btnEditManufacturer" class="btn btn-success">Update</button>
                </div>
              </form>

            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table id="manufacturerTable" class="table table-striped table-dark table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../api/getManufacturers.php';
              if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <td><?php echo $row['make_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td>
                      <button type="submit" name="view" class="btn btn-primary btn-sm btnEdit">Edit</button>
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

  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#manufacturerTable').DataTable({
        "lengthMenu": [5, 10],
      });
    });
  </script>

  <script>
    $('.btnEdit').on('click', function() {

      $('#editManufacturerModal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#manufacturerId').val(data[0]);
      $('#nameText').val(data[1]);
      $('#addressText').val(data[2]);
      $('#emailText').val(data[3]);
      $('#contactText').val(data[4]);
    });
  </script>

  <!-- <script>
    window.jQuery || document.write('<script src="js/jquery-slim.min.js">
  </script>') -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/feather.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/dashboard.js"></script>
</body>

</html>