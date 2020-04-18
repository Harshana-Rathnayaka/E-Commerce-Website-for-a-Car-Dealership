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
  <title>Colours</title>

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

            <li class="nav-item">
              <a class="nav-link active" href="colours.php">
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
              <li class="breadcrumb-item active" aria-current="page">Colours</li>
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



        <!-- Add data modal -->
        <div class="modal fade" id="addColourModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addColourModal">Add New Colour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="../api/addNewColour.php" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="colourText">Colour</label>
                    <input type="text" class="form-control" id="colourText" required name="colourText" placeholder="Enter a colour">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="btnAddColour" class="btn btn-success">Save</button>
                </div>
              </form>

            </div>
          </div>
        </div>



        <!-- ################################################################################################################## -->

        <!-- Edit data modal -->
        <div class="modal fade" id="editColourModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editColourModal">Edit Colour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="../api/updateColour.php" method="POST">
                <div class="modal-body">
                  <div class="form-group">

                    <input type="hidden" name="coloudid" id="colourId">

                    <label for="colourText">Colour</label>
                    <input type="text" class="form-control" id="updateColourText" required name="colourText" placeholder="Enter a colour">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="btnEditColour" class="btn btn-success">Update</button>
                </div>
              </form>

            </div>
          </div>
        </div>


        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addColourModal">
          Add New Colour
        </button>
        <hr>

        <div class="table-responsive">
          <table id="coloursTable" class="table table-striped table-hover table-dark text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Colour</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>

              <?php
              include '../api/getColours.php';
              if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <td><?php echo $colour_id = $row['id']; ?></td>
                    <td><?php echo $row['colour']; ?></td>
                    <td>
                      <form action="viewvehicle.php?vehicle_id=<?php echo $vehicle_id; ?>" method="POST">
                        <button type="submit" name="view" class="btn btn-info btn-sm btnEdit">Edit</button>
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
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#coloursTable').DataTable({
        "lengthMenu": [5, 10],
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.btnEdit').on('click', function() {

        $('#editColourModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#colourId').val(data[0]);
        $('#updateColourText').val(data[1]);
      });
    });
  </script>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/feather.min.js"></script>
  <script src="js/dashboard.js"></script>



</body>

</html>