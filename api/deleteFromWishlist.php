<?php

session_start();

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['deleteFromWishlist']) && !isset($_POST['wishlistId'])) {

    // some fields are missing
    $_SESSION['missing'] = "Some values are missing.";
    $response['error'] = true;
    $response['message'] = "Please fill all the details";
    // header("location:../dealership/wishlist.php");
} else {

    $wishlist_id = $_POST['wishlistId'];
    $form_id = $_POST['formId'];

    // db object
    $db = new DbOperations();

    $result = $db->deleteWishlist($wishlist_id);

    if ($result == 1) {

        // successfully deleted from the wishlist
        $_SESSION['success'] = "Successfully deleted from the wishlist!";

        $response['error'] = false;
        $response['message'] = 'Successfully deleted from the wishlist';

        if ($form_id == 'dashboardWishlist') {
            header("location:../user/mywishlist.php");
        } elseif ($form_id == 'dealershipWishlist') {
            header("location:../dealership/wishlist.php");
        }
    } elseif ($result == 2) {

        // some error occured
        $_SESSION['error'] = "Something went wrong, couldn't delete from the wishlist.";

        $response['error'] = true;
        $response['message'] = 'some error occured';

        if ($form_id == 'dashboardWishlist') {
            header("location:../user/mywishlist.php");
        } elseif ($form_id == 'dealershipWishlist') {
            header("location:../dealership/wishlist.php");
        }
    }
}

// echo json_encode($response);
