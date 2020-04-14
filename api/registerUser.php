<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (
		isset($_POST['firstname']) and
		isset($_POST['lastname']) and
		isset($_POST['birthday']) and
		isset($_POST['gender']) and
		isset($_POST['username']) and
		isset($_POST['email']) and
		isset($_POST['contact']) and
		isset($_POST['password'])
	) {

		// we can operate the data further
		$db = new DbOperations();

		$result = $db->createUser(
			$_POST['firstname'],
			$_POST['lastname'],
			$_POST['birthday'],
			$_POST['gender'],
			$_POST['username'],
			$_POST['email'],
			$_POST['contact'],
			$_POST['password']
		);
		// success
		if ($result == 1) {
			$response['error'] = false;
			$response['message'] = "User registered successfully";
			$_SESSION['User'] = $_POST['username'];
			header("location:../welcome.php");
			// some error
		} elseif ($result == 2) {
			$response['error'] = true;
			$response['message'] = "Some error occured, please try again";
			// user exists
		} elseif ($result == 0) {
			$response['error'] = true;
			$response['message'] = "It seems you are already registered, please choose a different email and username";
		}
	} else {
		// missing fields
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
