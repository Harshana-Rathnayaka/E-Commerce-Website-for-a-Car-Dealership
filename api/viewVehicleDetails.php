<?php

require_once '../includes/dbOperations.php';

$response = array();

// check if the session is started
if (isset($_SESSION['User'])) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $vehicle_id = $_REQUEST['vehicle_id'];

        // db object
        $db = new DbOperations();

        $result = $db->getUserByUsername($username);
    } else {
        // wrong method
        $response['error'] = true;
        $response['message'] = "Invalid Request";
    }
} else {
    // session not started
    $response['error'] = true;
    $response['message'] = "Session Expired. Please login to continue";
    header("location:../login/login-page.php?Invalid= Session Expired. Please login to continue");
}

echo json_encode($response);
