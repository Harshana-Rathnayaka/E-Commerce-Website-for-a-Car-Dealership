<?php

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_SESSION['User']) && !isset($_SESSION['Id'])) {

    // session not started
    $response['error'] = true;
    $response['message'] = "Session not started. Please login to continue";
} else {

    $user_id = $_SESSION['Id'];

    // db object
    $db = new DbOperations();

    $result = $db->getOrdersByUserId($user_id);
}

// echo json_encode($response);
