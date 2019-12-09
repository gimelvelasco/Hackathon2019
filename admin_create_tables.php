<!DOCTYPE html>

<html>
<body>
<?php
	$server = "localhost:3306";
	$user = "root";
	$pass = "root";
	$db = "hackathon2019_db";
	$conn = mysqli_connect($server, $user, $pass, $db);
	if(!$conn){
		die(msqli_connect_error());
	}
	else{
		$query = "CREATE TABLE users (user_id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(20) UNIQUE, password VARCHAR(20), first_name VARCHAR(50), last_name VARCHAR(50));";
		mysqli_query($conn,$query);

		$query = "CREATE TABLE arrangements (arrangement_id INT PRIMARY KEY AUTO_INCREMENT, lender_id INT, borrower_id INT, amount INT, description VARCHAR(50), created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (lender_id) REFERENCES users(user_id), FOREIGN KEY (borrower_id) REFERENCES users(user_id));";
		mysqli_query($conn,$query);

		$query = "CREATE TABLE requests LIKE arrangements;";
		mysqli_query($conn,$query);

		echo "Database Tables Created Successfully<br>";

		mysqli_close($conn);
	}
?>
</body>
</html>