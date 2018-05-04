<?php
	if(isset($_POST['btn-signup'])){
		// check if submit button is clicked if yes then proceed next 

		// make a connection with database
		require_once '../connection/db.connection.php';

		// retrieve data from the page
		$firstName = mysqli_real_escape_string($conn,$_POST['firstname']);
		$lastName = mysqli_real_escape_string($conn,$_POST['lastname']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$pwd = mysqli_real_escape_string($conn,$_POST['password']);
		$confirmpwd = mysqli_real_escape_string($conn,$_POST['confirmpassword']);

		// check if any of the field is empty
		if(empty($firstName) || empty($lastName) || empty($mobile) || empty($email) || empty($username) || empty($pwd) || empty($confirmpwd)){
			// then redirect user to signup page with error message
			header('Location: ../signup.php?error=empty&');
			exit();
		}else{
			// if all fields have some value then validate them

			//check for first name and last name
			if(!preg_match("/^[a-zA-Z ]*$/",$firstName) || !preg_match("/^[a-zA-Z ]*$/",$lastName)){
				header('Location: ../signup.php?error=firstOrLast&');
				exit();
			}

			//validate mobile number fields
			$stringMobile =(string)$mobile;
			$lenStringMobile = strlen($stringMobile);
			if($lenStringMobile != 10){
				header('Location: ../signup.php?error=not10&');
				exit();
			}else{
				// mobile number is 10 character is long
				// check if all characters are numeric
				if(!ctype_digit($stringMobile)){
					header('Location: ../signup.php?error=notdigit&');
					exit();
				}else{
					// all are numeric character then check is first digit is zero
					$firstCharacter = substr($stringMobile,0,1);
					if($firstCharacter == '0'){
						header('Location: ../signup.php?error=zerofirst&');
						exit();
					}
				}
			}

			// check for email 
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header('Location: ../signup.php?error=invalidemail&');
				exit();
			}else{
				// check if both password fields are equal
				$strpwd = (string)$pwd;
				$lenpwd = strlen($strpwd);
				if($lenpwd < 6){
					// password should be atleast 6 character long 
					header('Location: ../signup.php?error=pwd6');
					exit();
				}else{
					if($pwd != $confirmpwd){
						header('Location: ../signup.php?error=pwdnotmatch&');
						exit();
					}else{
						// both password fields are having same value so proceed next
						// check if username already exist
						$userSql = "SELECT * FROM users WHERE user_name = '$username' ";
						$resultUserSql = mysqli_query($conn, $userSql);
						$resultUserSqlCheck = mysqli_num_rows($resultUserSql);
						if($resultUserSqlCheck > 0){
							// user already exist
							header('Location: ../signup.php?error=userexist');
							exit();
						} else{
							// insert user record into database
							// password hashing 
							$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
							$insertSql = "INSERT INTO users (user_name, first_name, last_name, gender, mobile_no, email, password) VALUES ('$username','$firstName','$lastName','$gender','$mobile','$email','$hashedPwd')";
							$resultInsertSql = mysqli_query($conn, $insertSql);
								// user inserted successfully
								header('Location: ../signup.php?status=success');
								exit();
						}
					}
				}
				
			}
		}
	}else{	
		// if it is not a post back request then redirect user to the home page with an error
		header('Location: ../index.php?error');
		exit();
	}
?>