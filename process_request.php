<?php
	SESSION_START();
	if(!isset($_SESSION['username_session'])){
		$message = "No User Account Login!";
		echo "<script type='text/javascript'>
			alert('$message');
			window.location='index.php';
			</script>";
	}
?>

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
		$var_lender_text = $_POST['lender_text'];
		$var_borrower_text = $_POST['borrower_text'];
		$var_amount_number = $_POST['amount_number'];
		$var_description_text = $_POST['description_text'];
		$var_lender_text = stripcslashes($var_lender_text);
		$var_borrower_text = stripcslashes($var_borrower_text);
		$var_amount_number = stripcslashes($var_amount_number);
		$var_description_text = stripcslashes($var_description_text);

		$query = "INSERT INTO `hackathon2019_db`.`requests` (`lender_id`, `borrower_id`, `amount`, `description`) VALUES ('$var_lender_text', '$var_borrower_text', '$var_amount_number', '$var_description_text');";
		if(mysqli_query($conn,$query)){
			$message = "Loan Request Successful! Wait for the Lender to Approve your request.";
			echo "<script type='text/javascript'>
				alert('$message');
				window.location='homepage.php';
				</script>";
		}
		else{
			$message = "Error making a Loan Request.";
			echo "<script type='text/javascript'>
				alert('$message');
				window.location='new_request.php';
				</script>";
		}		
		mysqli_close($conn);
	}
?>