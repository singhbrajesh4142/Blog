<?php
session_start();
// check if it is a post back request
if(isset($_POST['btn-login'])){
	// proceed next

	// make connection with database
	require_once '../connection/db.connection.php';

	// retrieve data from the login page
	$username = mysqli_real_escape_string($conn, $_POST['uname']);
	$password = mysqli_real_escape_string($conn, $_POST['pwd']);

	// check if any of the field is empty
	if(empty($username) || empty($password)){
		header('Location: ../index.php?status=empty');
		exit();
	}else{
		// check if username is exist in our database or not 
		$userSql = "SELECT * FROM users WHERE user_name = '$username'";
		$resultUserSql = mysqli_query($conn, $userSql);
		$resultCount = mysqli_num_rows($resultUserSql);
		if($resultCount < 1){
			// user is not exist in database
			header('Location: ../index.php?status=invaliduserid');
			exit();
		}else{
			// username exits in our database
			// check for password
			if($row = mysqli_fetch_assoc($resultUserSql)){
				$pwdInDb = $row['password'];
				$pwdCheck = password_verify($password, $pwdInDb);
				// check if password match
				if($pwdCheck == true){
					// username exist and password matches so store them in a session variable
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['gender']= $row['gender'];
					$_SESSION['mobile'] = $row['mobile_no'];
					header('Location: ../index.php?user='.$_SESSION['user_name'].'&userid='.$_SESSION['u_id']);
					exit();
				}
				if($pwdCheck == false){
					header('Location: ../index.php?status=incorrectpwd');
					exit();
				}
			}
		}
	}

}else{
	//if it is not a post back request 
	header('Location: ../index.php?error');
	exit();

}

?>