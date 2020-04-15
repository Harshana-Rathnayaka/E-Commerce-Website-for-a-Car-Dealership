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

		if ($result == 1) {

			// success

			$user = $db->getUserByUsername($_POST['username']);

			$response['error'] = false;
			$response['message'] = "User registered successfully";

			$_SESSION['User'] = $_POST['username'];
			$_SESSION['FirstName'] = $_POST['firstname'];
			$_SESSION['LastName'] = $_POST['lastname'];
			$_SESSION['Email'] = $_POST['email'];
			$_SESSION['Id'] = $user['id'];
			$_SESSION['UserType'] = $user['user_type'];

			header("location:../user/index.php");
		} elseif ($result == 2) {

			// some error

			$_SESSION['error'] = "Something went wrong, please try again";

			$response['error'] = true;
			$response['message'] = "Some error occured, please try again";

			header("location:../register/index.php");
		} elseif ($result == 0) {

			// user exists

			$_SESSION['error'] = "It seems you are already registered, please choose a different email and username.";

			$response['error'] = true;
			$response['message'] = "It seems you are already registered, please choose a different email and username";

			header("location:../register/index.php");
		}
	} else {
		// missing fields

		$_SESSION['missing'] = "Required fields are missing.";

		$response['error'] = true;
		$response['message'] = "Required fields are missing";

		header("location:../register/index.php");
	}
} else {
	// wrong method
	$response['error'] = true;
	$response['message'] = "Invalid Request";
}

// json output
// echo json_encode($response);
