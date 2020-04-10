<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

// checks the method call
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['username']) and isset($_POST['password'])) {

        // db object
        $db = new DbOperations();


        if ($db->userLogin($_POST['username'], $_POST['password'])) {

            // getting user data
            $user = $db->getUserByUsername($_POST['username']);

            // checks if the user is approved
            if ($user['user_status'] == 1) {

                // student account
                if ($user['user_type'] == 1) {

                    // session and reroute
                    $_SESSION['User'] = $_POST['username'];
                    header("location:../students/index.php");

                    // adding user data to json array
                    $response['error'] = false;
                    $response['id'] = $user['id'];
                    $response['email'] = $user['email'];
                    $response['username'] = $user['username'];
                    $response['firstname'] = $user['first_name'];
                    $response['lastname'] = $user['last_name'];

                    // company account
                } else if ($user['user_type'] == 2) {

                    // session and reroute
                    $_SESSION['User'] = $_POST['username'];
                    header("location:../companies/index.php");

                    // adding user data to json array
                    $response['error'] = false;
                    $response['id'] = $user['id'];
                    $response['email'] = $user['email'];
                    $response['username'] = $user['username'];
                    $response['firstname'] = $user['first_name'];
                    $response['lastname'] = $user['last_name'];

                    // admin account
                } elseif ($user['user_type'] == 0) {

                    // session and reroute
                    $_SESSION['User'] = $_POST['username'];
                    header("location:../admin/index.php");

                    // adding user data to json array
                    $response['error'] = false;
                    $response['id'] = $user['id'];
                    $response['email'] = $user['email'];
                    $response['username'] = $user['username'];
                    $response['firstname'] = $user['first_name'];
                    $response['lastname'] = $user['last_name'];
                } else {
                    header("location:../login/login-page.php?Invalid= Your account is not of a valid type.");
                    $response['error'] = true;
                    $response['message'] = "Your account is not of a valid type.";
                }
            } else {
                header("location:../login/login-page.php?Invalid= Your request hasn't been approved yet. Please try again later.");
                $response['error'] = true;
                $response['message'] = "Your request hasn't been approved yet. Please try again later.";
            }
        } else {
            header("location:../login/login-page.php?Invalid= Please provide a valid username and a password");
            $response['error'] = true;
            $response['message'] = "Invalid username or password";
        }
    } else {
        header('location:../login/login-page.php?Empty=Please fill in the blanks');
        $response['error'] = true;
        $response['message'] = "Required fields are missing";
    }
} else {
    // wrong method
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}

// json output
echo json_encode($response);
