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
		$query = "INSERT INTO `hackathon2019_db`.`users` (`username`, `password`, `first_name`, `last_name`) VALUES ('ffdcuser1', '123456', 'Eph', 'Dici');";
		mysqli_query($conn,$query);

		$query = "INSERT INTO `hackathon2019_db`.`users` (`username`, `password`, `first_name`, `last_name`) VALUES ('ffdcuser2', '123456', 'Epheph', 'Dicii');";
		mysqli_query($conn,$query);

		echo "Accounts Created Successfully<br>";

		mysqli_close($conn);
	}
?>
</body>
</html>