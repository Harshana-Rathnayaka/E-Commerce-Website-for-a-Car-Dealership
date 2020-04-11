<?php

require_once '../includes/dbOperations.php';

$response = array();

// check if the session is started
if (isset($_SESSION['User'])) {

    $username = $_SESSION['User'];

    // db object
    $db = new DbOperations();

    $result = $db->getUserByUsername($username);
} else {
    // session not started
    $response['error'] = true;
    $response['message'] = "Session not started";
    header("location:../login/login-page.php?Invalid= Session Expired. Please login to continue");
}

// echo json_encode($response);
