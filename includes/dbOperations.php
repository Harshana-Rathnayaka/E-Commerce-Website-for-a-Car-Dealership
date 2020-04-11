<?php

class DbOperations
{

	private $con;

	function __construct()
	{

		require_once dirname(__FILE__) . '/dbConnection.php';

		$db = new DbConnect();

		$this->con = $db->connect();
	}

	/* CRUD  -> C -> CREATE */

	// user registration
	public function createUser($firstname, $lastname, $username, $pass, $email, $usertype)
	{
		$password = md5($pass); // password encrypting
		if ($this->isUserExist($username, $email)) {
			// user exists
			return 0;
		} else {
			$stmt = $this->con->prepare("INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `user_type`, `user_status`) VALUES (NULL, ?, ?, ?, ?, ?, ?, 0);");
			$stmt->bind_param("ssssss", $firstname, $lastname, $username, $password, $email, $usertype);

			if ($stmt->execute()) {
				// user created
				return 1;
			} else {
				// some error
				return 2;
			}
		}
	}

	// user login
	public function userLogin($username, $pass)
	{
		$password = md5($pass); // password decrypting
		$stmt = $this->con->prepare("SELECT `id` FROM `users` WHERE `username` = ? AND `password` = ?");
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$stmt->store_result();
		return $stmt->num_rows > 0;
	}

	// adding new manufacturer
	public function createManufacturer($name, $address, $email, $contact)
	{
		if ($this->isManufacturerExist($name)) {
			// manufacturer exists
			return 0;
		} else {
			$stmt = $this->con->prepare("INSERT INTO `manufacturers` (`make_id`, `name`, `address`, `email`, `contact`) VALUES (NULL, ?, ?, ?, ?);");
			$stmt->bind_param("ssss", $name, $address, $email, $contact);

			if ($stmt->execute()) {
				// manufacturer created
				return 1;
			} else {
				// some error 
				return 2;
			}
		}
	}


		/* CRUD  -> r -> RETRIEVE */

	// retreiving user data
	public function getUserByUsername($username)
	{
		$stmt = $this->con->prepare("SELECT * FROM `users` WHERE `username` = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		return $stmt->get_result()->fetch_assoc();
	}

	// checking if the user exists
	private function isUserExist($username, $email)
	{
		$stmt = $this->con->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
		$stmt->bind_param("ss", $username, $email);
		$stmt->execute();
		$stmt->store_result();
		return $stmt->num_rows > 0;
	}

	// checking if the manufacturer exists
	private function isManufacturerExist($name)
	{
		$stmt = $this->con->prepare("SELECT `make_id` FROM `manufacturers` WHERE `name` = ?");
		$stmt->bind_param("s", $name);
		$stmt->execute();
		$stmt->store_result();
		return $stmt->num_rows > 0;
	}

	// retrieving manufacturers table 
	public function getManufacturers()
	{
		$stmt = $this->con->prepare("SELECT * FROM `manufacturers`");
		$stmt->execute();
		return $stmt->get_result();
	}

	// retrieving users table 
	public function getUsers()
	{
		$stmt = $this->con->prepare("SELECT `id`, CONCAT( `first_name`, ' ', `last_name`) AS 'name', `username`, `email` FROM `users`");
		$stmt->execute();
		return $stmt->get_result();
	}

	// retrieving approved companies
	public function getApprovedCompanies()
	{
		$stmt = $this->con->prepare("SELECT `id`, CONCAT( `first_name`, ' ', `last_name`) AS 'name', `username`, `email` FROM `users` WHERE `user_status` = 1 AND `user_type` = 2");
		$stmt->execute();
		return $stmt->get_result();
	}



	/* CRUD  -> U -> UPDATE */

	// updating user status
	public function approveUser($username)
	{
		$stmt = $this->con->prepare("UPDATE `users` SET `user_status` = 1 WHERE `username` = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		return $stmt->get_result();
	}
}
