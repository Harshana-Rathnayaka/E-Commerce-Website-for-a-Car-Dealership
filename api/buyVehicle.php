<?php

session_start();

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['btnBuy'], $_POST['userId'])) {

    // some fields are missing
    $_SESSION['missing'] = "Some fields are missing";

    $response['error'] = true;
    $response['message'] = "Some fields are missing";
} else {

    $user_id = $_POST['userId'];
    $cart_id = $_POST['cartId'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];

    if (!empty($user_id) && !empty($cart_id) && !empty($make) && !empty($model) && !empty($quantity) && !empty($total)) {

        // db object
        $db = new DbOperations();

        if ($result = $db->getUserById($user_id)) {

            // success
            $_SESSION['firstname'] = $result['first_name'];
            $_SESSION['lastname'] = $result['last_name'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['contact'] = $result['contact'];
            $_SESSION['cartid'] = $cart_id;
            $_SESSION['make'] = $make;
            $_SESSION['model'] = $model;
            $_SESSION['quantity'] = $quantity;
            $_SESSION['total'] = $total;

            $response['error'] = false;
            $response['message'] = "Got the user details";

            header('location:../dealership/billing-info.php');
        } else {

            // couldn't get the user details
            $_SESSION['error'] = "Something went wrong, couldn't get the user details.";

            $response['error'] = true;
            $response['message'] = "Something went wrong, couldn't get the user details.";
        }
    } else {
        // some fields are missing

        $_SESSION['missing'] = "Some fields are missing";

        $response['error'] = true;
        $response['message'] = "Some fields are missing";
    }
}

echo json_encode($response);
