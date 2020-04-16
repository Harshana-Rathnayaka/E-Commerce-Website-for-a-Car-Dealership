<?php

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['vehicle_id']) && !isset($_POST['make_id']) && !isset($_POST['quantity'])) {

    // some fields are missing
    $response['error'] = true;
    $response['message'] = "Please fill all the details";
    header("location:../dealership/details.php?Invalid= Some values are missing.");
} else {

    $vehicle_id = $_POST['vehicle_id'];
    $make_id = $_POST['make_id'];
    $quantity = $_POST['quantity'];
    $user_id = $_POST['user_id'];

    // db object
    $db = new DbOperations();

    $result = $db->addToWishlist($user_id, $vehicle_id, $make_id, $quantity);

    if ($result == 1) {
        // successfully added to the wishlist
        $response['error'] = false;
        $response['message'] = 'Successfully added to the wishlist';
    } elseif ($result == 2) {
        // some error occured
        $response['error'] = true;
        $response['message'] = 'some error occured';
        header("location:../dealership/wishlist.php?Invalid= Something went wrong. Couldn't add to the wishlist.");
    }
}

echo json_encode($response);
