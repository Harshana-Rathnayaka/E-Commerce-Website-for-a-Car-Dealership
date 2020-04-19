<?php

session_start();

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['deleteFromCart']) && !isset($_POST['cartId'])) {

    // some fields are missing
    $_SESSION['missing'] = "Some values are missing.";
    $response['error'] = true;
    $response['message'] = "Please fill all the details";
} else {

    $cart_id = $_POST['cartId'];

    // db object
    $db = new DbOperations();

    $result = $db->deleteCartItem($cart_id);

    if ($result == 1) {

        // successfully deleted from the cart
        $_SESSION['success'] = "Successfully deleted from the cart!";

        $response['error'] = false;
        $response['message'] = 'Successfully deleted from the cart.';

        header('location:../user/mycart.php');

        // if ($form_id == 'dashboardWishlist') {
        //     header("location:../user/mywishlist.php");
        // } elseif ($form_id == 'dealershipWishlist') {
        //     header("location:../dealership/wishlist.php");
        // }
    } elseif ($result == 2) {

        // some error occured
        $_SESSION['error'] = "Something went wrong, couldn't delete from the cart.";

        $response['error'] = true;
        $response['message'] = 'some error occured';

        header('location:../user/mycart.php');


        // if ($form_id == 'dashboardWishlist') {
        //     header("location:../user/mywishlist.php");
        // } elseif ($form_id == 'dealershipWishlist') {
        //     header("location:../dealership/wishlist.php");
        // }
    }
}

// echo json_encode($response);
