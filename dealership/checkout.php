<?php

session_start();

require_once '../includes/dbOperations.php';
include '../instamojo/Instamojo.php';
$api = new Instamojo\Instamojo('test_4e779d7c96c0e971e34dff7524c', 'test_4a0af00544f088f3e3cef293303', 'https://test.instamojo.com/api/1.1/');


$response = array();

if (isset($_POST['btnContinueToCheckout'])) {

    if (isset($_SESSION['Id'])) {

        // getting the values
        $user_id = $_SESSION['Id'];
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $make = $_POST['make'];
        $model = $_POST['model'];
        $quantity = $_POST['quantity'];
        $total = $_POST['total'];
        $cart_id = $_SESSION['cartid'];

        try {
            $response = $api->paymentRequestCreate(array(
                "purpose" => $make . ' ' . $model,
                "amount" => $total,
                "send_email" => true,
                "email" => $email,
                "buyer_name" => $first_name . ' ' . $last_name,
                "phone" => $contact,
                "send_sms" => true,
                "allow_repeated_payments" => false,
                "redirect_url" => "http://localhost/ds/dealership/thankyou.php"
            ));

            $pay_url = $response['longurl'];

            // db object
            $db = new DbOperations();

            // deleting fron the cart
            $result = $db->deleteCartItem($cart_id);

            if ($result == 1) {

                // successfully deleted from the cart
                $response['error'] = false;
                $response['message'] = 'Successfully deleted from the cart.';

                // adding to the orders table

                $result = $db->addToOrders($user_id, $make, $model, $quantity, $total);

                if ($result == 1) {

                    // successfully added to the orders table
                    $response['error'] = false;
                    $response['message'] = 'Successfully added to orders.';
                    header("location:$pay_url");
                } elseif ($result == 2) {

                    // some error occured
                    $response['error'] = true;
                    $response['message'] = 'some error occured. Unable to add to orders';
                }
            } elseif ($result == 2) {

                // some error occured
                $response['error'] = true;
                $response['message'] = 'some error occured';
            }
        } catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
    } else {
        // some fields are missing
        $_SESSION['error'] = "Session not started. Please login to continue.";

        $response['error'] = true;
        $response['message'] = "Session not started. Please login to continue.";
        header("location:../login/login-page.php");
    }
} else {
    // some fields are missing
    $_SESSION['missing'] = "Some fields are missing.";

    $response['error'] = true;
    $response['message'] = "Some fields are missing.";
    header("location:../dealership/billing-info.php");
}
