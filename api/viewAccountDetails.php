<?php

require_once '../includes/dbOperations.php';

$response = array();

// check if the session is started
if (isset($_SESSION['Id'])) {

    $userid = $_SESSION['Id'];

    // db object
    $db = new DbOperations();

    $result = $db->getUserById($userid);
} else {
    // session not started
    $response['error'] = true;
    $response['message'] = "Session not started";
    header("location:../login/login-page.php?Invalid= Session Expired. Please login to continue");
}

// echo json_encode($response);
