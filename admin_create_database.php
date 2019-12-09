<!DOCTYPE html>

<html>
<body>
<?php
	$server = "localhost:3306";
	$user = "root";
	$pass = "root";
	$conn = mysqli_connect($server, $user, $pass);
	if(!$conn){
		die(msqli_connect_error());
	}
	else{
		$query = "CREATE DATABASE hackathon2019_db;";
		if(mysqli_query($conn,$query)){
			echo "Database hackathon2019_db Successfully created<br>";
		}
		else{
			echo "Error creating Database hackathon2019_db<br>";
		}

		mysqli_close($conn);
	}
?>
</body>
</html>