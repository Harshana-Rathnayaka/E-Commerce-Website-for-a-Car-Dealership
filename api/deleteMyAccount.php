<?php

session_start();

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['btnConfirm'], $_SESSION['User'], $_SESSION['Id'])) {

    $_SESSION['error'] = "Session not started. Please login to continue.";

    $response['error'] = true;
    $response['message'] = "Session not started. Please login to continue.";
    header("location:../login/login-page.php");
} else {

    if (empty($_POST['userid']) || empty($_POST['btnConfirm'])) {

        $_SESSION['missing'] = "Some fields are missing.";

        $response['error'] = true;
        $response['message'] = "Some fields are missing.";
        header("location:../user/deleteaccount.php");
    } else {

        $user_id = $_POST['userid'];

        // db object
        $db = new DbOperations();

        $result = $db->deleteAccountById($user_id);

        if ($result == 0) {

            //success
            unset($_SESSION['User']);
            unset($_SESSION['Id']);
            $_SESSION['success'] = "Account deleted successfully! We are sorry to see you go.";

            $response['error'] = true;
            $response['message'] = "Account deleted successfully! We are sorry to see you go.";
            header("location:../login/login-page.php");
        } elseif ($result == 1) {

            // some error
            $_SESSION['error'] = "Something went wrong, couldn't delete your account. Please try again later.";

            $response['error'] = true;
            $response['message'] = "Something went wrong, couldn't delete your account. Please try again later.";
            header("location:../user/deleteaccount.php");
        }
    }
}

echo json_encode($response);
