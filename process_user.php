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
		$var_user_text = $_POST['user_text'];
		$var_pass_text = $_POST['pass_text'];
		$var_first_name_text = $_POST['first_name_text'];
		$var_last_name_text = $_POST['last_name_text'];

		$var_user_text = stripcslashes($var_user_text);
		$var_pass_text = stripcslashes($var_pass_text);
		$var_first_name_text = stripcslashes($var_first_name_text);
		$var_last_name_text = stripcslashes($var_last_name_text);
		
		//query the database
		$query = "INSERT INTO `hackathon2019_db`.`users` (`username`, `password`, `first_name`, `last_name`) VALUES ('$var_user_text', '$var_pass_text', '$var_first_name_text', '$var_last_name_text');";
		if(mysqli_query($conn,$query)){
			$message = "New Account Created!";
			echo "<script type='text/javascript'>
				alert('$message');
				window.location='index.php';
				</script>";
		}
		else{
			echo "Error making new Account.<br>";
		}
		mysqli_close($conn);
	}
?>