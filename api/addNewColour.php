<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

if (isset($_POST['btnAddColour'])) {

    if (!empty($_POST['colourText'])) {

        $colour = $_POST['colourText'];

        // db object
        $db = new DbOperations();

        $result = $db->addNewColour($colour);

        if ($result == 1) {
            // successfully uploaded to the db
            $_SESSION['success'] = "Colour added successfully!";
            $response['error'] = false;
            $response['message'] = "Successfully uploaded to the DB";
            header("location:../admin/colours.php");
        } elseif ($result == 2) {
            // could't upload to the db
            $_SESSION['error'] = "Something went wrong, couldn't add the colour.";
            $response['error'] = true;
            $response['message'] = "Something went wrong. Couldn't upload to the DB";
            header("location:../admin/colours.php");
        }
    } else {

        // some fields are missing
        $_SESSION['missing'] = "Please provide a colour.";

        $response['error'] = true;
        $response['message'] = "Please provide a colour";
        header("location:../admin/colours.php");
    }
}
