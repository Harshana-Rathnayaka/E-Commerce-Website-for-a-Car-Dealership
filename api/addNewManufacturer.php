<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

// check if the session is started
if (isset($_SESSION['User'])) {

    // checking the method 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // getting the values from the form
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        if ((!empty($name)) && (!empty($address)) && (!empty($email)) && (!empty($contact))) {

            // db object
            $db = new DbOperations();

            // inserting to the manufacturers table
            $result = $db->createManufacturer($name, $address, $email, $contact);

            if ($result == 1) {
                // successfully uploaded to the db
                $_SESSION['success'] = "Manufacturer added successfully!";
                $response['error'] = false;
                $response['message'] = "Successfully uploaded to the DB";
                header("location:../admin/allmanufacturers.php");
            } elseif ($result == 2) {
                // could't upload to the db
                $_SESSION['error'] = "Something went wrong. Couldn't upload to the DB.";
                $response['error'] = true;
                $response['message'] = "Something went wrong. Couldn't upload to the DB";
                header("location:../admin/addmanufacturer.php");
            } elseif ($result == 0) {
                // manufacturer exists in the db
                $_SESSION['error'] = " It seems this manufacturer already exists. Please choose a different name.";
                $response['error'] = true;
                $response['message'] = "It seems this manufacturer already exists. Please choose a different name.";
                header("location:../admin/addmanufacturer.php");
            }
        } else {
            // some fields are missing
            $_SESSION['missing'] = "Please fill all the details";
            $response['error'] = true;
            $response['message'] = "Please fill in all the details";
            header("location:../admin/addmanufacturer.php");
        }
    } else {
        // wrong method
        $response['error'] = true;
        $response['message'] = "Invalid Request";
    }
} else {
    // session not started
    $_SESSION['error'] = "Session Expired. Please login to continue";
    $response['error'] = true;
    $response['message'] = "Session Expired. Please login to continue";
    header("location:../login/login-page.php");
}

echo json_encode($response);
