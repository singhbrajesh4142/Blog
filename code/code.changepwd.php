<?php
	session_start();
	// checck if it is a post back request
	if(isset($_POST['submit-change-pwd'])){
		// make connection with database
		require_once '../connection/db.connection.php';

		// retrieve data from the change password page 
		$oldpwd = mysqli_real_escape_string($conn,$_POST['oldpwd']);
		$newpwd = mysqli_real_escape_string($conn,$_POST['newpwd']);
		$confirmnewpwd = mysqli_real_escape_string($conn,$_POST['confirmnewpwd']);

		// check if any one of them is empty
		if(empty($oldpwd) || empty($newpwd) || empty($confirmnewpwd) ){
			header('Location: ../myaccount.php?status=emptypwd');
			exit();
		}else{
			// all fields have some value then proceed next
			$username = $_SESSION['user_name'];
			$sql = "SELECT * FROM users WHERE user_name = '$username'";
			$result = mysqli_query($conn, $sql);
			if(($row = mysqli_fetch_assoc($result))){
				$pwdCheck = password_verify($oldpwd, $row['password']);
				// check if password match
				if($pwdCheck == true){
					// password match then compare new password and confirm
					$strnewpwd = (string)$newpwd;
					$lenstrnewpwd = strlen($strnewpwd);
					if($lenstrnewpwd < 6){
						// password should be atleast 6 character long
						header('Location: ../myaccount.php?status=pwdlessthan6');
						exit();
					}else{
						if($newpwd == $confirmnewpwd){
							// update password into table
							$hashpwd = password_hash($newpwd, PASSWORD_DEFAULT);
							$updateSql = "UPDATE users SET password = '$hashpwd' WHERE user_name = '$username'";
							if(mysqli_query($conn, $updateSql)){
								header('Location: ../myaccount.php?status=pwdUpdated');
								exit();
							}	
						}else{
							header('Location: ../myaccount.php?status=pwdnconfirmpwdnotmatch');
							exit();
						}
					}
				}
				if($pwdCheck == false){
					header('Location: ../myaccount.php?status=oldpwdnotmatch');
					exit();
				}
			}
		}
	}else{
		header('Location: ../index.php?error');
		exit();
	}

?>