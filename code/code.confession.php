<?php
	session_start();
	// check if it is post back requeast
	if(isset($_POST['submit-confession'])){
		// make connection with databse
		require_once '../connection/db.connection.php';
		$username = $_SESSION['user_name'];
		// retrieve data from confession page
		$msg = mysqli_real_escape_string($conn, $_POST['confession-msg']);

		// check if it is empty
		if(empty($msg)){
			header('Location: ../myaccount.php?status=emptyconfession');
			exit();
		}else{
			// msg filed has some value
			$insertMsg = "INSERT INTO confession (owner_id, create_time, message) VALUES ('$username',now() , '$msg')";
			$result = mysqli_query($conn, $insertMsg);
			header('Location: ../myaccount.php?status=confessionadded');
			exit();
		}
	}else{
		header('Location: ../index.php');
		exit();
	}
?>