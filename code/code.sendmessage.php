<?php
	session_start();
	if(isset($_POST['btn-send-msg'])){
		// make connection with database
		require_once '../connection/db.connection.php';
		$msgfrom = $_SESSION['user_name'];
		// retrieve data 
		$msg = mysqli_real_escape_string($conn, $_POST['message']);
		$msgto = mysqli_real_escape_string($conn, $_POST['hiddenusername']);
		if(empty($msg)){
			header('Location: ../myaccount.php?status=emptymsg');
			exit();
		}else{
			$msgSql = "INSERT INTO message (msg_create_time, msgfrom, msgto, msg) VALUES (now(),'$msgfrom','$msgto','$msg')";
				mysqli_query($conn, $msgSql);
				header('Location: ../myaccount.php?status=msgsendsuccess');
				exit();
			
		}

	}else{
		header('Location: ../index.php');
		exit();
	}
?>