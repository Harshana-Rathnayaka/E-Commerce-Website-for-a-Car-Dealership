<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['btnUpdateUserStatus'])) {

    // some fields are missing
    $_SESSION['missing'] = "Some fields are missing.";

    $response['error'] = true;
    $response['message'] = "Please fill in all the details";
    header("location:../admin/allusers.php");
} else {

    // getting the values
    $user_id = $_POST['userId'];
    $status = $_POST['process'];

    if ($status == 2 || "") {
        // some fields are missing
        $_SESSION['missing'] = "Please select an option.";

        $response['error'] = true;
        $response['message'] = "Please fill in all the details";
        header("location:../admin/allusers.php");
    } else {

        // db object
        $db = new DbOperations();

        $result = $db->updateUserStatus($user_id, $status);

        if ($result == 0) {

            //success
            $_SESSION['success'] = "Account status updated successfully!";

            $response['error'] = true;
            $response['message'] = "Account status updated successfully!";
            header("location:../admin/allusers.php");
        } elseif ($result == 1) {

            // some error
            $_SESSION['error'] = "Something went wrong, couldn't update user status. Please try again later.";

            $response['error'] = true;
            $response['message'] = "Something went wrong, couldn't update user status. Please try again later.";
            header("location:../admin/allusers.php");
        }
    }
}

echo json_encode($response);
