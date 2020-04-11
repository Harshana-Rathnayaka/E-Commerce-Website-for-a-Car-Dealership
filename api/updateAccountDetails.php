<?php

require_once '../includes/dbOperations.php';

$response = array();

// check if the session is started
if (isset($_SESSION['User'])) {

    // checking the method 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $user = $_REQUEST['user'];
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $username = $_POST['uname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ((!empty($user)) && (!empty($firstname)) && (!empty($lastname)) && (!empty($username)) && (!empty($email)) && (!empty($password))) {

            // db object
            $db = new DbOperations();

            $result = $db->upateUserDetails($user, $firstname, $lastname, $username, $email, $password);

            // success
            if ($result == 0) {
                $response['error'] = false;
                $response['message'] = "User details updated successfully";
                header("location:../admin/changesettings.php?Valid= User details updated successfully");

                // some error
            } elseif ($result == 1) {
                $response['error'] = true;
                $response['message'] = "Some error occured, please try again";
                header("location:../admin/changesettings.php?Inalid= Some error occured, please try again");
            }
        } else {
            // some fields are missing
            $response['error'] = true;
            $response['message'] = "Please fill in all the details";
            header("location:../admin/changesettings.php?Invalid= Please fill all the details");
        }
    } else {
        // wrong method
        $response['error'] = true;
        $response['message'] = "Invalid Request";
    }
} else {
    // session not started
    $response['error'] = true;
    $response['message'] = "Session Expired. Please login to continue";
    header("location:../login/login-page.php?Invalid= Session Expired. Please login to continue");
}

// echo json_encode($response);
