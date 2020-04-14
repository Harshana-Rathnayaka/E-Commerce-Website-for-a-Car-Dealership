<?php

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_REQUEST['wishlist_id'])) {

    // some fields are missing
    $response['error'] = true;
    $response['message'] = "Please fill all the details";
    header("location:../dealership/wishlist.php?Invalid= Some values are missing.");
} else {

    $wishlist_id = $_REQUEST['wishlist_id'];

    // db object
    $db = new DbOperations();

    $result = $db->deleteWishlist($wishlist_id);

    if ($result == 1) {
        // successfully deleted from the wishlist
        $response['error'] = false;
        $response['message'] = 'Successfully deleted from the wishlist';
        header("location:../dealership/wishlist.php?Valid= Successfully deleted from the wishlist.");
    } elseif ($result == 2) {
        // some error occured
        $response['error'] = true;
        $response['message'] = 'some error occured';
        header("location:../dealership/wishlist.php?Invalid= Something went wrong. Couldn't delete from the wishlist.");
    }
}

echo json_encode($response);
