<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

if (isset($_POST['Register'])) {
    $email = $_POST['email_value'];

    $db = new DbOperations();

    $result = $db->isEmailTaken($email);

    if ($result > 0) {
        echo "$email is already taken. Please choose a different email.";
    } else {
        echo "$email is Available.";
    }
}
