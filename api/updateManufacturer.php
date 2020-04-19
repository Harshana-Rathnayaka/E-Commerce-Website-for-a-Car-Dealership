<?php

session_start();

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['btnEditManufacturer'])) {

    // some fields are missing
    $_SESSION['missing'] = "Please fill in all the details";

    $response['error'] = true;
    $response['message'] = "Please fill in all the details";
    header("location:../admin/allmanufacturers.php");
} else {

    // getting the values
    $manufacturer_id = $_POST['manufacturerid'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // db object
    $db = new DbOperations();

    $result = $db->updateManufacturer($manufacturer_id, $name, $address, $email, $contact);

    if ($result == 1) {
        // some error
        $_SESSION['error'] = "Something went wrong, please try again.";

        $response['error'] = true;
        $response['message'] = "Something went wrong, please try again.";
        header("location:../admin/allmanufacturers.php");
    } elseif ($result == 0) {
        // success
        $_SESSION['success'] = "Manufacturer updated successfully!";
        $response['error'] = false;
        $response['message'] = "Manufacturer details updated successfully";
        header("location:../admin/allmanufacturers.php");
    }
}

echo json_encode($response);
