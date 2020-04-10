<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

// check if the session is started
// if (isset($_SESSION['User'])) {
// checks the method call
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // db object
    $db = new DbOperations();

    $result = $db->getPendingRequests();
    $output = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    // wrong method
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}
// } else {
//     $response['error'] = true;
//     $response['message'] = "Session not started";
//     // header("location:../admin/index.php");
// }
