<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['btnUpdateOrderStatus'])) {

    // some fields are missing
    $_SESSION['missing'] = "Some fields are missing.";

    $response['error'] = true;
    $response['message'] = "Please fill in all the details";
    header("location:../admin/pendingorders.php");
} else {

    // getting the values
    $order_id = $_POST['orderId'];
    $status = $_POST['process'];

    if ($status == 3 || "") {
        // some fields are missing
        $_SESSION['missing'] = "Please select an option.";

        $response['error'] = true;
        $response['message'] = "Please fill in all the details";
        header("location:../admin/pendingorders.php");
    } else {

        // db object
        $db = new DbOperations();

        $result = $db->updateOrderStatus($order_id, $status);

        if ($result == 0) {

            //success
            $_SESSION['success'] = "Order status updated successfully!";

            $response['error'] = true;
            $response['message'] = "Order status updated successfully!";
            header("location:../admin/pendingorders.php");
        } elseif ($result == 1) {

            // some error
            $_SESSION['error'] = "Something went wrong, couldn't update order status. Please try again later.";

            $response['error'] = true;
            $response['message'] = "Something went wrong, couldn't update order status. Please try again later.";
            header("location:../admin/pendingorders.php");
        }
    }
}

echo json_encode($response);
