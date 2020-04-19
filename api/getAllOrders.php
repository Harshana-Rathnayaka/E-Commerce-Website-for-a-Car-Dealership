<?php

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_SESSION['User']) && !isset($_SESSION['Id'])) {

    // session not started
    $response['error'] = true;
    $response['message'] = "Session not started. Please login to continue";
} else {


    // db object
    $db = new DbOperations();

    $result = $db->getAllOrders();
}

// echo json_encode($response);
