<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

// check if the session is started
if (isset($_SESSION['User'])) {

    // check the method request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // getting the values from the form
        $make = $_POST['make'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $engine = $_POST['engine'];
        $horsepower = $_POST['horsepower'];
        $condition = $_POST['condition'];
        $transmission = $_POST['transmission'];
        $colour = $_POST['colour'];
        $seats = $_POST['seats'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $convertible = $_POST['convertible'];

        // additional image data
        $name = $_FILES["image"]["name"];
        $type = $_FILES["image"]["type"];
        $size = $_FILES["image"]["size"];
        $temp = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];

        // generating the random image link
        $extension = strtolower(substr($name, strpos($name, '.') + 1));
        $img_no = date('YmdHis') . rand(1, 99999);
        $img_link = $img_no . "." . $extension;

        // checking if the fields are empty
        if ((!empty($make)) && (!empty($model)) && (!empty($year)) && (!empty($engine)) && (!empty($horsepower)) && (!empty($condition)) && (!empty($transmission)) && (!empty($colour)) && (!empty($seats)) && (!empty($price))) {
            // checking if the image is of a valid type
            if (($extension == 'png') || ($extension == 'jpg') || ($extension == 'jpeg') || ($extension == 'JPG')) {

                // uploading the image to the local folder
                if (move_uploaded_file($temp, '../vehicleimages/' . $img_link)) {

                    // db object
                    $db = new DbOperations();

                    // inserting to the vehicles table
                    $result = $db->createVehicle($make, $model, $year, $engine, $transmission, $horsepower, $condition, $colour, $convertible, $seats, $price, $img_link);

                    if ($result == 1) {
                        // successfully uploaded to the db
                        $_SESSION['success'] = "New vehicle added successfully!";
                        $response['error'] = false;
                        $response['message'] = "New vehicle added successfully!";
                        header("location:../admin/index.php");
                    } elseif ($result == 2) {
                        // could't upload to the db
                        $_SESSION['error'] = "Something went wrong. Couldn't upload to the DB";
                        $response['error'] = true;
                        $response['message'] = "Something went wrong. Couldn't upload to the DB";
                        header("location:../admin/addvehicle.php");
                    }
                } else {
                    // the image could not be uploaded
                    $_SESSION['error'] = "Something went wrong. The image could not be uploaded.";
                    $response['error'] = true;
                    $response['message'] = "Some error occured. The image could not be uploaded";
                    header("location:../admin/addvehicle.php");
                }
            } else {
                // a valid image type is not selected
                $_SESSION['error'] = "The selected file is not a valid image. Please select an image of type PNG or JPEG.";
                $response['error'] = true;
                $response['message'] = "The selected file is not a valid image";
                header("location:../admin/addvehicle.php");
            }
        } else {
            // some fields are missing
            $_SESSION['missing'] = "Please fill all the details.";
            $response['error'] = true;
            $response['message'] = "Please fill all the details";
            header("location:../admin/addvehicle.php");
        }
    } else {
        // wrong method
        $response['error'] = true;
        $response['message'] = "Invalid Request";
    }
} else {
    // session not started
    $_SESSION['erorr'] = "Session Expired. Please login to continue";
    $response['error'] = true;
    $response['message'] = "Session Expired. Please login to continue";
    header("location:../login/login-page.php");
}

echo json_encode($response);
