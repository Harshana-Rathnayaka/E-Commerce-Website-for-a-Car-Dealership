<?php

class DbConnect
{

	private $con;
	function __construct()
	{
	}

	function connect()
	{
		include_once dirname(__FILE__) . '/constants.php';
		$this->con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		if (mysqli_connect_errno()) {
			echo "Failed to connect with the database" . mysqli_error($con);
		}
		return $this->con;
	}
}
