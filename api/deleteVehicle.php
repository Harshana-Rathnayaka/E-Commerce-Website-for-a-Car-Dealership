<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['btnDelete'])) {
    // some fields are missing
    $_SESSION['missing'] = "Some fields are missing";
    $response['error'] = true;
    $response['message'] = "Please fill in all the details";
    header("location:../admin/viewvehicle.php");
} else {

    // getting the values
    $vehicle_id = $_POST['vehicleId'];

    // db object
    $db = new DbOperations();

    $result = $db->deleteVehicle($vehicle_id);

    if ($result == 1) {
        // successfully deleted the vehicle
        $_SESSION['success'] = "Successfully deleted the vehicle.";
        $response['error'] = false;
        $response['message'] = 'Successfully deleted the vehicle';
        header("location:../admin/index.php");
    } elseif ($result == 2) {
        // some error occured
        $_SESSION['error'] = "Something went wrong, couldn't delete the vehicle.";
        $response['error'] = true;
        $response['message'] = "Couldn't delete the vehicle";
        header("location:../admin/viewvehicle.php");
    }
}

echo json_encode($response);
