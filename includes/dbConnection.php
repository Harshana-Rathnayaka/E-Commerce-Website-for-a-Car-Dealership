<?php

class DbConnect
{

	private $con;
	function __construct()
	{ }

	function connect()
	{
		include_once dirname(__FILE__) . '/constants.php';

		try {

			// main server
			$this->con = new mysqli(BACKUP_DB_HOST, BACKUP_DB_USER, BACKUP_DB_PASSWORD, BACKUP_DB_NAME);

			if (mysqli_connect_errno()) {

				// backup server
				$this->con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


				if (mysqli_connect_errno()) {
					echo "Failed to connect with the database" . mysqli_error($con);
				}
				return $this->con;
			}
			return $this->con;
		} catch (Exception $e) {
			echo "Connection Failed" . $e->getMessage();
		}
	}
}
