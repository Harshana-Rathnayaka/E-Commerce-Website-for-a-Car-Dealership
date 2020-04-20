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
	public function createUser($firstname, $lastname, $birthday, $gender, $username, $email, $contact, $pass)
	{
		$password = md5($pass); // password encrypting
		if ($this->isUserExist($username, $email)) {
			// user exists
			return 0;
		} else {
			$stmt = $this->con->prepare("INSERT INTO `users` (`id`, `first_name`, `last_name`, `birthday`, `gender`, `username`, `email`, `contact`, `password`, `user_type`, `user_status`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, 1, 1);");
			$stmt->bind_param("ssssssss", $firstname, $lastname, $birthday, $gender, $username, $email, $contact, $password);

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

	// adding new vehicle
	public function createVehicle($make, $model, $year, $engine_capacity, $transmission, $horsepower, $condition, $colour, $convertible, $seats, $price, $img_link)
	{

		$stmt = $this->con->prepare("INSERT INTO `vehicles`(`make`, `model`, `year`, `engine_capacity`, `transmission`, `horsepower`, `vehicle_condition`, `colour`, `convertible`, `seats`, `price`, `image_link`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
		$stmt->bind_param("ssssssssssss", $make, $model, $year, $engine_capacity, $transmission, $horsepower, $condition, $colour, $convertible, $seats, $price, $img_link);

		if ($stmt->execute()) {
			// vehicle created
			return 1;
		} else {
			// some error 
			return 2;
		}
	}

	// add a new colour
	public function addNewColour($colour)
	{
		$stmt = $this->con->prepare("INSERT INTO `colours` (`colour`) VALUES (?);");
		$stmt->bind_param("s", $colour);

		if ($stmt->execute()) {
			// new colour created
			return 1;
		} else {
			// some error 
			return 2;
		}
	}

	// adding to wishlist
	public function addToWishlist($user_id, $vehicle_id, $make_id, $quantity)
	{
		$stmt = $this->con->prepare("INSERT INTO `wishlist`(`user_id`, `vehicle_id`, `make_id`, `quantity`) VALUES (?, ?, ?, ?); ");
		$stmt->bind_param("iiii", $user_id, $vehicle_id, $make_id, $quantity);

		if ($stmt->execute()) {
			// added to wishlist
			return 1;
		} else {
			// some error
			return 2;
		}
	}

	// adding to cart
	public function addToCart($user_id, $vehicle_id, $make_id, $quantity, $total)
	{
		$stmt = $this->con->prepare("INSERT INTO `cart`(`user_id`, `vehicle_id`, `make_id`, `quantity`, `total_price`) VALUES (?, ?, ?, ?, ?); ");
		$stmt->bind_param("iiiii", $user_id, $vehicle_id, $make_id, $quantity, $total);

		if ($stmt->execute()) {
			// added to cart
			return 1;
		} else {
			// some error
			return 2;
		}
	}

	// adding to orders
	public function addToOrders($user_id, $make, $model, $quantity, $total)
	{
		$stmt = $this->con->prepare("INSERT INTO `orders`(`user_id`, `make`, `model`, `quantity`, `paid_amount`) VALUES (?, ?, ?, ?, ?); ");
		$stmt->bind_param("issii", $user_id, $make, $model, $quantity, $total);

		if ($stmt->execute()) {
			// added to orders table
			return 1;
		} else {
			// some error
			return 2;
		}
	}


	/* CRUD  -> r -> RETRIEVE */

	// retreiving user data by username
	public function getUserByUsername($username)
	{
		$stmt = $this->con->prepare("SELECT * FROM `users` WHERE `username` = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		return $stmt->get_result()->fetch_assoc();
	}

	// retreiving user data by id
	public function getUserById($userid)
	{
		$stmt = $this->con->prepare("SELECT * FROM `users` WHERE `id` = ?");
		$stmt->bind_param("i", $userid);
		$stmt->execute();
		return $stmt->get_result()->fetch_assoc();
	}

	// retreiving vehicle data
	public function getVehicleByID($vehicle_id)
	{
		$stmt = $this->con->prepare("SELECT * FROM `vehicles` INNER JOIN `manufacturers` ON manufacturers.make_id = vehicles.make INNER JOIN `colours` ON colours.id = vehicles.colour INNER JOIN `transmissions` ON transmissions.id = vehicles.transmission WHERE `vehicle_id` = ?");
		$stmt->bind_param("i", $vehicle_id);
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

	// checking if the email is taken
	public function isEmailTaken($email)
	{
		$stmt = $this->con->prepare("SELECT * FROM `users` WHERE `email` = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		return $stmt->num_rows > 0;
	}

	// checking if the username is taken
	public function isUsernameTaken($username)
	{
		$stmt = $this->con->prepare("SELECT * FROM `users` WHERE `username` = ?");
		$stmt->bind_param("s", $username);
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

	// retrieving colours table 
	public function getColours()
	{
		$stmt = $this->con->prepare("SELECT * FROM `colours`");
		$stmt->execute();
		return $stmt->get_result();
	}

	// retrieving vehicles table 
	public function getVehicles()
	{
		$stmt = $this->con->prepare("SELECT * FROM `vehicles` INNER JOIN `manufacturers` ON manufacturers.make_id = vehicles.make INNER JOIN `colours` ON colours.id = vehicles.colour INNER JOIN `transmissions` ON transmissions.id = vehicles.transmission ORDER BY `vehicle_id`");
		$stmt->execute();
		return $stmt->get_result();
	}

	// retrieving wishlist table 
	public function getWishlistByUserId($user_id)
	{
		$stmt = $this->con->prepare("SELECT * FROM `wishlist` INNER JOIN `users` ON users.id = wishlist.user_id INNER JOIN
		vehicles ON vehicles.vehicle_id = wishlist.vehicle_id INNER JOIN `manufacturers` ON manufacturers.make_id = wishlist.make_id
		 WHERE `user_id` = ? ORDER BY `wishlist_id`
		");
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		return $stmt->get_result();
	}

	// retrieving cart table
	public function getCartByUserId($user_id)
	{
		$stmt = $this->con->prepare("SELECT * FROM `cart` INNER JOIN `users` ON users.id = cart.user_id INNER JOIN
		vehicles ON vehicles.vehicle_id = cart.vehicle_id INNER JOIN `manufacturers` ON manufacturers.make_id = cart.make_id
		WHERE `user_id` = ? ORDER BY `cart_id`
		");
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		return $stmt->get_result();
	}

	// retrieving orders table by user id
	public function getOrdersByUserId($user_id)
	{
		$stmt = $this->con->prepare("SELECT * FROM `orders` INNER JOIN `users` ON users.id = orders.user_id
		WHERE `user_id` = ? ORDER BY `order_id`");
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		return $stmt->get_result();
	}

	// retrieving pending orders to user
	public function getPendingOrdersById($user_id)
	{
		$stmt = $this->con->prepare("SELECT * FROM `orders` INNER JOIN `users` ON users.id = orders.user_id
		WHERE `user_id` = ? AND `order_status` = 0 ORDER BY `order_id`");
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		return $stmt->get_result();
	}

	// retrieving pending orders to admin
	public function getAllPendingOrders()
	{
		$stmt = $this->con->prepare("SELECT * FROM `orders` INNER JOIN `users` ON users.id = orders.user_id
		WHERE `order_status` = 0 ORDER BY `timestamp`");
		$stmt->execute();
		return $stmt->get_result();
	}

	// retrieving all orders to admin
	public function getAllOrders()
	{
		$stmt = $this->con->prepare("SELECT * FROM `orders` INNER JOIN `users` ON users.id = orders.user_id ORDER BY `timestamp`");
		$stmt->execute();
		return $stmt->get_result();
	}

	// retrieving users table 
	public function getUsers()
	{
		$stmt = $this->con->prepare("SELECT `id`, CONCAT( `first_name`, ' ', `last_name`) AS 'name', `username`, `email`, `contact`, `user_status` FROM `users` WHERE `user_type` = 1");
		$stmt->execute();
		return $stmt->get_result();
	}

	// getting the vehicle count
	public function getVehicleCount()
	{
		$stmt = $this->con->prepare("SELECT * FROM `vehicles` WHERE `in_stock` = 1");
		$stmt->execute();
		$result =  $stmt->get_result();
		return mysqli_num_rows($result);
	}

	// getting the orders count by user
	public function getOrdersCountByUserId($user_id)
	{
		$stmt = $this->con->prepare("SELECT * FROM `orders` WHERE `user_id` = ?");
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		$result =  $stmt->get_result();
		return mysqli_num_rows($result);
	}

	// getting the cart count by user
	public function getCartCountByUserId($user_id)
	{
		$stmt = $this->con->prepare("SELECT * FROM `cart` WHERE `user_id` = ?");
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		$result =  $stmt->get_result();
		return mysqli_num_rows($result);
	}

	// getting the wishlist count by user
	public function getWishlistCountByUserId($user_id)
	{
		$stmt = $this->con->prepare("SELECT * FROM `wishlist` WHERE `user_id` = ?");
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		$result =  $stmt->get_result();
		return mysqli_num_rows($result);
	}



	/* CRUD  -> U -> UPDATE */

	// deactivate user account  by updating user status
	public function deleteAccountById($user_id)
	{
		$stmt = $this->con->prepare("UPDATE `users` SET `user_status` = 0 WHERE `id` = ?");
		$stmt->bind_param("i", $user_id);

		if ($stmt->execute()) {
			// user account status updated and account deactivated
			return 0;
		} else {
			// some error 
			return 1;
		}
	}

	// activate or deactivate user account by updating user status from admin side
	public function updateUserStatus($user_id, $status)
	{
		$stmt = $this->con->prepare("UPDATE `users` SET `user_status` = ? WHERE `id` = ?");
		$stmt->bind_param("ii", $status, $user_id);

		if ($stmt->execute()) {
			// user account status updated by admin
			return 0;
		} else {
			// some error 
			return 1;
		}
	}

	// confirm or refund order by updating order status from admin side
	public function updateOrderStatus($order_id, $status)
	{
		$stmt = $this->con->prepare("UPDATE `orders` SET `order_status` = ? WHERE `order_id` = ?");
		$stmt->bind_param("ii", $status, $order_id);

		if ($stmt->execute()) {
			// user account status updated by admin
			return 0;
		} else {
			// some error 
			return 1;
		}
	}

	// update admin details
	public function updateAdminAccountDetails($userid, $firstname, $lastname, $username, $email)
	{
		$stmt = $this->con->prepare("UPDATE `users` SET `first_name` = ?, `last_name` = ?, `username` = ?, `email` = ? WHERE `id` = ?");
		$stmt->bind_param("ssssi", $firstname, $lastname, $username, $email, $userid);

		if ($stmt->execute()) {
			// admin account details updated
			return 0;
		} else {
			// some error 
			return 1;
		}
	}

	// update user details
	public function updateUserAccountDetails($userid, $firstname, $lastname, $birthday, $gender, $username, $email, $contact)
	{
		$stmt = $this->con->prepare("UPDATE `users` SET `first_name` = ?, `last_name` = ?, `birthday` = ?, `gender` = ?, `username` = ?, `email` = ?, `contact` = ? WHERE `id` = ?");
		$stmt->bind_param("sssssssi", $firstname, $lastname, $birthday, $gender, $username, $email, $contact, $userid);

		if ($stmt->execute()) {
			// user account details updated
			return 0;
		} else {
			// some error 
			return 1;
		}
	}

	// update a vehicle
	public function updateVehicleDetails($vehicle_id,  $model, $year, $engine, $transmission, $horsepower, $condition, $seats, $price, $in_stock)
	{
		$stmt = $this->con->prepare("UPDATE `vehicles` SET `model` = ?, `year` = ?, `engine_capacity` = ?, `transmission` = ?, `horsepower` = ?, `vehicle_condition` = ?, `seats` = ?, `price` = ?, `in_stock` = ? WHERE `vehicle_id` = ?");
		$stmt->bind_param("ssssssisss", $model, $year, $engine, $transmission, $horsepower, $condition, $seats, $price, $in_stock, $vehicle_id);

		if ($stmt->execute()) {
			// vehicle updated
			return 0;
		} else {
			// some error 
			return 1;
		}
	}

	// update colours
	public function updateColour($colour_id, $colour)
	{
		$stmt = $this->con->prepare("UPDATE `colours` SET `colour` = ? WHERE `id` = ?");
		$stmt->bind_param("si", $colour, $colour_id);

		if ($stmt->execute()) {
			// colour updated
			return 0;
		} else {
			// some error 
			return 1;
		}
	}

	// update manufacturers
	public function updateManufacturer($manufacturer_id, $name, $address, $email, $contact)
	{
		$stmt = $this->con->prepare("UPDATE `manufacturers` SET `name` = ?, `address` = ?, `email` = ?, `contact` = ? WHERE `make_id` = ?");
		$stmt->bind_param("ssssi", $name, $address, $email, $contact, $manufacturer_id);

		if ($stmt->execute()) {
			// manufacturer updated
			return 0;
		} else {
			// some error 
			return 1;
		}
	}




	/* CRUD  -> D -> DELETE */

	// delete wishlist item
	public function deleteWishlist($wishlist_id)
	{
		$stmt = $this->con->prepare("DELETE FROM `wishlist` WHERE `wishlist_id` = ?");
		$stmt->bind_param("i", $wishlist_id);

		if ($stmt->execute()) {
			// item deleted
			return 1;
		} else {
			// some error
			return 2;
		}
	}

	// delete cart item
	public function deleteCartItem($cart_id)
	{
		$stmt = $this->con->prepare("DELETE FROM `cart` WHERE `cart_id` = ?");
		$stmt->bind_param("i", $cart_id);

		if ($stmt->execute()) {
			// item deleted
			return 1;
		} else {
			// some error
			return 2;
		}
	}

	// delete vehicle
	public function deleteVehicle($vehicle_id)
	{
		$stmt = $this->con->prepare("DELETE FROM `vehicles` WHERE `vehicle_id` = ?");
		$stmt->bind_param("i", $vehicle_id);

		if ($stmt->execute()) {
			// vehicle deleted
			return 1;
		} else {
			// some error
			return 2;
		}
	}
}
