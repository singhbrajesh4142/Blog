<?php
	session_start();
	// check if it is a post back request
	if(isset($_POST['submit-sharepost'])){
		// make connection with databse
		require_once '../connection/db.connection.php';

		// retrieve data 
		$name = mysqli_real_escape_string($conn, $_POST['fullname']);
		$post = mysqli_real_escape_string($conn, $_POST['sharepost-msg']);

		//check if any of them is empty
		if(empty($name) ||empty($post)){
			header('Location: ../myaccount.php?status=emptypost');
			exit();
		}else{
			// both fields have some value 
			$username = $_SESSION['user_name'];
			$insertsql = "INSERT INTO post (post_create_time, post_owner_id, post_owner_name, post_msg) VALUES (now(),'$username','$name','$post')";
			if(mysqli_query($conn, $insertsql)){
				header('Location: ../index.php?status=postadded');
				exit();
			}
		}
	}else{
		header('Location: ../index.php');
		exit();
	}

?>