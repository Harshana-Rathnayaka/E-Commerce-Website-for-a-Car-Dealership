<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

if (isset($_POST['Register'])) {
	$username = $_POST['username_value'];

    $db = new DbOperations();
    
    $result = $db->isUsernameTaken($username);

    if($result > 0) {
        echo "$username is already taken.";
    } else {
        echo "$username is Available.";
    }
}