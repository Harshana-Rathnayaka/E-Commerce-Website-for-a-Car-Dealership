<?php

require_once '../includes/dbOperations.php';

$response = array();

// check if the session is started
// if (isset($_SESSION['User'])) {

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        session_start();
        $vehicle_id = $_POST['view'];

        // db object
        $db = new DbOperations();

        $result = $db->getVehicleByID($vehicle_id);

        $_SESSION['result'] = $result;

            
            // details page
            // $response['colour'] = $result['colour'];
            // $response['transmission'] = $result['transmission_type'];
            // $response['make'] = $result['name'];
            // $response['horsepower'] = $result['horsepower'];
            // $response['error'] = false;
            // $response['message'] = "Details Page";
            //  header("location:../admin/viewvehicle.php?result= ".$result);
        // } else {
        //     // some error occured
        //     $response['error'] = true;
        //     $response['message'] = "Something went wrong";
        //     // header("location:../admin/index.php?Invalid= Something went wrong!");
        // }
    // } else {
    //     // wrong method
    //     $response['error'] = true;
    //     $response['message'] = "Invalid Request";
    // }
// } else {
//     // session not started
//     $response['error'] = true;
//     $response['message'] = "Session Expired. Please login to continue";
//     header("location:../login/login-page.php?Invalid= Session Expired. Please login to continue");
// }

echo json_encode($response);
