<?php

 session_start();
require_once '../includes/dbOperations.php';

$response = array();

// checks the method call
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $process = $_REQUEST['process'];
    $username = $_REQUEST['username'];


    if (!empty($process)) {

        if (!empty($username)) {

            $db = new DbOperations();

            if ($process == "3") {
                header("location:../admin/index.php?Invalid = Please select an option");
                $response['error'] = true;
                $response['message'] = "Please select an option";
            } elseif ($process == "2") {
                if ($db->approveUser($username)) {
                    header("location:../admin/index.php?Invalid = User was rejected");
                    $response['error'] = false;
                    $response['message'] = "User was rejected";
                } else {
                    // header("location:../admin/index.php?Invalid= Some error occured 1");
                    $response['error'] = true;
                    $response['message'] = "Some error occured";
                    $response['username'] = $username;
                    $response['process'] = $process;
                }
            } else {
                if ($db->approveUser($username)) {
                    header("location:../admin/index.php?Invalid= User was approved");
                    $response['error'] = false;
                    $response['message'] = "User was approved";
                } else {
                    header("location:../admin/index.php?Invalid= Some error occured 2");
                    $response['error'] = true;
                    $response['message'] = "Some error occured";
                }
            }
        } else {
            // some fields are missing
            $response['error'] = true;
            $response['message'] = "Username is empty";
            header("location:../admin/index.php?Invalid= Username is empty");
        }
    } else {
        // some fields are missing
        $response['error'] = true;
        $response['message'] = "Process is empty";
        header("location:../admin/index.php?Invalid= Process is empty");
    }
} else {
    // wrong method
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}

echo json_encode($response);
