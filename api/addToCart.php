<?php

require_once '../includes/dbOperations.php';

$response = array();

if (isset($_POST['btnAddToCart'])) {

    $user_id = $_POST['userId'];
    $wishlist_id = $_POST['wishlistId'];
    $vehicle_id = $_POST['vehicleId'];
    $make_id = $_POST['makeId'];
    $colour_id = $_POST['colourId'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];

    if (
        !empty($user_id) && !empty($wishlist_id) && !empty($vehicle_id) && !empty($make_id) && !empty($colour_id)
        && !empty($quantity) && !empty($total)
    ) {

        $db = new DbOperations();

        $result = $db->addToCart($user_id, $wishlist_id, $vehicle_id, $make_id, $colour_id, $quantity, $total);

        if ($result == 1) {

            // success
            $_SESSION['success'] = "Successfully added to Cart.";
            header('location:../user/mycart.php');

            $response['error'] = false;
            $response['message'] = 'Successfully added to Cart';
        } elseif ($result == 2) {

            // error
            $_SESSION['error'] = "Something went wrong, Couldn't add to the Cart.";
            header('location:wishlist.php');

            $response['error'] = true;
            $response['message'] = "Something went wrong, Couldn't add to the Cart.";
        }
    } else {

        // some fields are missing
        $_SESSION['error'] = "Some fields are missing.";
        header('location:wishlist.php');

        $response['error'] = true;
        $response['message'] = "Some fields are missing.";
    }
}

echo json_encode($response);
