<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    echo $username = $_REQUEST['User'];

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
    $img_no = rand();
    $img_link = $img_no . "." . $extension;

    // checking if the fields are empty
    if ((!empty($make)) && (!empty($model)) && (!empty($year)) && (!empty($engine)) && (!empty($horsepower)) && (!empty($condition)) && (!empty($transmission)) && (!empty($colour)) && (!empty($seats)) && (!empty($price))(!empty($convertible))
    ) {
        // checking if the image is of a valid type
        if (($extension == 'png') || ($extension == 'jpg') || ($extension == 'jpeg') || ($extension == 'JPG')) {

            // uploading the image to the local folder
            if (move_uploaded_file($temp, '../vehicleimages' . $img_link)) {

                // db object
                $db = new DbOperations();

                // inserting to the vehicles table
                $insert = $db->query("INSERT INTO `vehicles`(`id`, `make`, `model`, `year`, `engine_capacity`, `transmission`, `horsepower`, `vehicle_condition`, `colour`, `convertible`, `seats`, `price`)
                 VALUES ('', '$make', '$model', '$year', '$engine, '$transmission', '$horsepower', '$condition', '$colour', '$convertible', '$seats', '$price')");

                if ($insert) {
                    // successfully uploaded to the db
                    $response['error'] = false;
                    $response['message'] = "Successfully uploaded to the DB";
                    header("location:../admin/index.php?Invalid= Successfully uploaded to the DB");
                } else {
                    // could't upload to the db
                    $response['error'] = true;
                    $response['message'] = "Something went wrong. Couldn't upload to the DB";
                    header("location:../admin/index.php?Invalid= Something went wrong. Couldn't upload to the DB");
                }
            } else {
                // the image could not be uploaded
                $response['error'] = true;
                $response['message'] = "Some error occured. The image could not be uploaded";
                header("location:../admin/index.php?Invalid= Some error occured. The image could not be uploaded");
            }
        } else {
            // a valid image type is not selected
            $response['error'] = true;
            $response['message'] = "The selected file is not a valid image";
            header("location:../admin/index.php?Invalid= The selected file is not a valid image");
        }
    } else {
        // some fields are missing
        $response['error'] = true;
        $response['message'] = "Please fill all the details";
        header("location:../admin/index.php?Invalid= Please fill all the details");
    }
} else {
    // wrong method
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}

echo json_encode($response);