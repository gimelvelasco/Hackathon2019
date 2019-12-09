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
		$var_user_text = stripcslashes($var_user_text);
		$var_pass_text = stripcslashes($var_pass_text);
		
		//query the database
		$query = "SELECT * FROM hackathon2019_db.users WHERE username = '".$var_user_text."' LIMIT 1;";
		$result = mysqli_query($conn,$query);
		$line = mysqli_fetch_array($result);

		if(mysqli_num_rows($result)==1){//savestate. add if condition for password
			echo "Login Successful!<br>";
			SESSION_START();
			$_SESSION['username_session'] = $line['username'];
			$_SESSION['user_id_session'] = $line['user_id'];
			header("Location:homepage.php");
		}
		else{
			$message = "No User Account Available";
			echo "<script type='text/javascript'>
				alert('$message');
				window.location='index.php';
				</script>";
		}
		mysqli_close($conn);
	}
?>