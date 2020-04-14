<?php

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['btnDelete'])) {
    // some fields are missing
    $_SESSION['error'] = "Some fields are missing";
    $response['error'] = true;
    $response['message'] = "Please fill in all the details";
    header("location:../admin/changesettings.php?Missing=Some fields are missing");
} else {

    // getting the values
    $vehicle_id = $_POST['vehicleId'];

    // db object
    $db = new DbOperations();

    $result = $db->deleteVehicle($vehicle_id);

    if ($result == 1) {
        // successfully deleted the vehicle
        $response['error'] = false;
        $response['message'] = 'Successfully deleted the vehicle';
        header("location:../admin/index.php?Valid=Successfully deleted the vehicle.");
    } elseif ($result == 2) {
        // some error occured
        $response['error'] = true;
        $response['message'] = "Couldn't delete the vehicle";
        header("location:../admin/index.php?Invalid=Couldn't delete the vehicle.");
    }
}

echo json_encode($response);
