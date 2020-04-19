<?php

session_start();

require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['btnEditColour'])) {

    // some fields are missing
    $_SESSION['missing'] = "Please fill in all the details";

    $response['error'] = true;
    $response['message'] = "Please fill in all the details";
    header("location:../admin/colours.php");
} else {

    // getting the values
    $colour_id = $_POST['colourid'];
    $colour = $_POST['colourText'];

    // db object
    $db = new DbOperations();

    $result = $db->updateColour($colour_id, $colour);

    if ($result == 1) {
        // some error
        $_SESSION['error'] = "Something went wrong, please try again.";

        $response['error'] = true;
        $response['message'] = "Something went wrong, please try again.";
        header("location:../admin/colours.php");
    } elseif ($result == 0) {
        // success
        $_SESSION['success'] = "Colour updated successfully!";
        $response['error'] = false;
        $response['message'] = "Colour details updated successfully";
        header("location:../admin/colours.php");
    }
}

echo json_encode($response);
