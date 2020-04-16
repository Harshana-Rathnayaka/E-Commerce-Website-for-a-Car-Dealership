<?php

require_once '../includes/dbOperations.php';

$response = array();

// check if the session is started
// if (isset($_SESSION['User'])) {

if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    // db object
    $db = new DbOperations();

    $result = $db->getWishlistByUserId($userid);

    echo $result;
} else {
    echo "error";
}


// } else {
//     // session not started
//     $response['error'] = true;
//     $response['message'] = "Session Expired. Please login to continue";
//     header("location:../login/login-page.php?Invalid= Session Expired. Please login to continue");
// }

// echo json_encode($response);
