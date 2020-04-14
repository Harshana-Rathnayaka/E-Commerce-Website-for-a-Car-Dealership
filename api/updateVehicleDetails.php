<?php

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['updateVehicleButton'])) {
    // some fields are missing
    $response['error'] = true;
    $response['message'] = "Please fill in all the details";
    header("location:../admin/index.php?Missing= Some fields are missing!");
} else {

    // getting the values
    $vehicle_id = $_POST['vehicleId'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $engine = $_POST['engine'];
    $horsepower = $_POST['horsepower'];
    $condition = $_POST['condition'];
    $transmission = $_POST['transmission'];
    $seats = $_POST['seats'];
    $price = $_POST['price'];

    // db object
    $db = new DbOperations();

    $result = $db->updateVehicleDetails($vehicle_id, $model, $year, $engine, $transmission, $horsepower, $condition, $seats, $price);

    if ($result == 1) {
        // some error
        $response['error'] = true;
        $response['message'] = "Some error occured, please try again.";
        header("location:../admin/index.php?Invalid=Something went wrong, please try again.");
    } elseif ($result == 0) {
        // success
        $response['error'] = false;
        $response['message'] = "Vehicle details updated successfully";
        header("location:../admin/index.php?Valid= Vehicle details updated successfully!");
    }
}

echo json_encode($response);
