<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['btnUpdate'])) {

    // some fields are missing
    $response['error'] = true;
    $response['message'] = "Please fill in all the details";
    header("location:../user/settings.php?Invalid= Please fill all the details");
} else {

    // getting the values
    $userid = $_POST['userid'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];

    // db object
    $db = new DbOperations();

    $result = $db->updateUserAccountDetails($userid, $firstname, $lastname, $birthday, $gender, $username, $email, $contact);

    if ($result == 0) {
        // successfully updated
        $_SESSION['success'] = "Your account details are updated!";

        $response['error'] = false;
        $response['message'] = "Your account details are updated";
        header('location:../user/settings.php');
    } elseif ($result == 1) {
        // some error 
        $_SESSION['error'] = "Something went wrong, please try again.";

        $response['error'] = true;
        $response['message'] = "Something went wrong.";
        header('location:../user/settings.php');
    }
}

echo json_encode($response);
