<?php

require_once '../includes/dbOperations.php';

$response = array();

if ((!isset($_POST['vehicle_id']) && !isset($_POST['make_id']) && !isset($_POST['quantity']) && !isset($_POST['wishlist_id'])) && 
(!empty($_POST['vehicle_id']) && !empty($_POST['make_id']) && !empty($_POST['quantity']) && !empty($_POST['wishlist_id']))) {

    // some fields are missing
    $response['error'] = true;
    $response['message'] = "Please fill all the details";
    header("location:../dealership/details.php?Invalid= Some values are missing.");
} else {

    $vehicle_id = $_POST['vehicle_id'];
    $make_id = $_POST['make_id'];
    $quantity = $_POST['quantity'];
    $wishlist_id = $_POST['wishlist_id'];

    // db object
    $db = new DbOperations();

    $result = $db->addToCart(1, $vehicle_id, $make_id, $quantity, $wishlist_id);

    if ($result == 1) {
        // successfully added to the wishlist
        $response['error'] = false;
        $response['message'] = 'Successfully added to the cart';
        header("location:../dealership/shopping-cart.html?Valid= Successfully added to the cart");
    } elseif ($result == 2) {
        // some error occured
        $response['error'] = true;
        $response['message'] = 'some error occured';
        header("location:../dealership/wishlist.php?Invalid= Something went wrong. Couldn't add to the cart.");
    }
}

echo json_encode($response);
