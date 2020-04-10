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
  <title>Add a Vehicle</title>

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
          <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link " href="index.php">
                <span data-feather="list"></span>
                Vehicles <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="addvehicle.php">
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
              <li class="breadcrumb-item active" aria-current="page">Add vehicle</li>
            </ol>
          </nav>
        </div>


        <form id="addVehicleForm" action="" method="POST" enctype="multipart/form-data">

          <div class="form-row">

            <div class="form-group col-md-3">
              <label for="inputMake">Make :</label>
              <input type="text" name="make" class="form-control" id="inputMake" placeholder="ex: Toyota" required>
            </div>

            <div class="form-group col-md-3">
              <label for="inputModel">Model :</label>
              <input type="text" name="model" class="form-control" id="inputModel" placeholder="ex: Corolla" required>
            </div>

            <div class="form-group col-md-3">
              <label for="inputYear">Year :</label>
              <input type="text" name="year" class="form-control" id="inputYear" placeholder="ex: 2015" required>
            </div>

            <div class="form-group col-md-3">
              <label for="inputEngine">Engine :</label>
              <input type="text" name="engine" class="form-control" id="inputEngine" placeholder="ex: 2.0" required>
            </div>

            <div class="form-group col-md-3">
              <label for="inputHorsepower">Horsepower :</label>
              <input type="text" name="horsepower" class="form-control" id="inputHorsepower" placeholder="ex: 720hp" required>
            </div>

            <div class="form-group col-md-3">
              <label for="inputCondition">Condition :</label>
              <input type="text" name="condition" class="form-control" id="inputCondition" placeholder="ex: Brand New or Recondition" required>
            </div>

            <div class="form-group col-md-3">
              <label for="inputTransmission">Transmission :</label>
              <select class="form-control" id="inputTransmission" name="transmission" required>
                <option value="0">Select the transmission</option>
                <option value="1">Manual</option>
                <option value="2">Automatic</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="inputColour">Colour :</label>
              <select class="form-control" id="inputColour" name="colour" required>
                <option value="0">Select the colour</option>
                <option value="1">Red</option>
                <option value="2">Blue</option>
                <option value="3">Black</option>
                <option value="4">White</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="inputSeats">Number of Seats :</label>
              <input type="text" name="seats" class="form-control" id="inputSeats" placeholder="ex: 2/4/5" required>
            </div>

            <div class="form-group col-md-4">
              <label for="inputSeats">Price :</label>
              <input type="text" name="price" class="form-control" id="inputPrice" placeholder="ex: 4000000.00" required>
            </div>

            <div class="form-group col-md-4">
              <label for="inputImage">Image :</label>
              <input type="file" name="price" class="form-control btn btn-sm btn-outline-info" id="inputImage" placeholder="Price of the vehicle" required>
            </div>

            <div class="form-group col-3">
              <label>Convertible :</label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="yesRadio" name="convertible" class="custom-control-input">
                <label class="custom-control-label" for="yesRadio">Yes</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="noRadio" name="convertible" class="custom-control-input">
                <label class="custom-control-label" for="noRadio">No</label>  
              </div>
            </div>

          </div>

          <button id="addVehicleButton" type="button" class="btn btn-success btn-block">Add</button>
          <button id="cancelButton" type="button" class="btn btn-danger btn-block">Cancel</button>

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