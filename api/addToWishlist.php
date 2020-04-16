<?php

session_start();

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['vehicle_id']) && !isset($_POST['make_id']) && !isset($_POST['quantity'])) {

    // some fields are missing
    $_SESSION['missing'] = "Some values are missing.";

    $response['error'] = true;
    $response['message'] = "Please fill all the details";
    header("location:../dealership/details.php?Invalid= Some values are missing.");
} else {

    $user_id = $_POST['user_id'];
    $vehicle_id = $_POST['vehicle_id'];
    $make_id = $_POST['make_id'];
    $quantity = $_POST['quantity'];

    // db object
    $db = new DbOperations();

    $result = $db->addToWishlist($user_id, $vehicle_id, $make_id, $quantity);

    if ($result == 1) {
        // successfully added to the wishlist

        $_SESSION['success'] = "Successfully added to the wishlist!";

        $response['error'] = false;
        $response['message'] = 'Successfully added to the wishlist';
    } elseif ($result == 2) {
        // some error occured
        $_SESSION['error'] = "Something went wrong. Couldn't add to the wishlist.";

        $response['error'] = true;
        $response['message'] = 'some error occured';
        header("location:../dealership/wishlist.php?Invalid= Something went wrong. Couldn't add to the wishlist.");
    }
}

// echo json_encode($response);
