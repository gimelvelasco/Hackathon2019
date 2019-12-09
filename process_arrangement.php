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
		$var_arrangement_id_text = $_POST['arrangement_id_text'];
		$var_arrangement_id_text = stripcslashes($var_arrangement_id_text);
		//echo "".$_POST['arrangement_id_text']."";
		$query = "INSERT INTO `hackathon2019_db`.`arrangements` (`lender_id`, `borrower_id`, `amount`, `description`) 
				SELECT `lender_id`, `borrower_id`, `amount`, `description`
				FROM requests
				WHERE arrangement_id = '".$var_arrangement_id_text."';";

		if(mysqli_query($conn,$query)){
			$query = "DELETE FROM `hackathon2019_db`.`requests` WHERE (`arrangement_id` = '".$var_arrangement_id_text."');";
			mysqli_query($conn,$query);
			$message = "Loan Request Approved!";
			echo "<script type='text/javascript'>
				alert('$message');
				window.location='homepage.php';
				</script>";
		}
		else{
			$message = "Error making approving Loan Request.";
			echo "<script type='text/javascript'>
				alert('$message');
				window.location='homepage.php';
				</script>";
		}		
		mysqli_close($conn);
	}
?>