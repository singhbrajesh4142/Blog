<?php
	session_start();

	if(isset($_POST['submit-resume'])){

		// make connection with database
		include_once '../connection/db.connection.php';

		$file = $_FILES['resume'];
		
		$fileName = $_FILES['resume']['name'];
		$fileTmpName = $_FILES['resume']['tmp_name'];
		$fileType = $_FILES['resume']['type'];
		$fileSize = $_FILES['resume']['size'];
		$fileError = $_FILES['resume']['error'];

		echo $fileName.$fileTmpName.$fileType.$fileSize.$fileError;

		$fileExt = explode('.',$fileName);
		$fileActualExt = strtolower(end($fileExt));
		
		if($fileActualExt == "pdf" || $fileActualExt == "docx"){
			// check error
			if($fileError === 0){
				// check if size is in range
				if($fileSize <= 5000000){
					$username = $_SESSION['user_name'];
					$fileNameNew = $username.".".$fileActualExt;

					// insert fileName in to database
					
					$sql = "SELECT * FROM tbl_resume WHERE user_id = '$username'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck<1){
						// insert query
						$insertSql = "INSERT INTO tbl_resume (user_id, status, resume_file) VALUES ('$username', 1, '$fileNameNew')";
						$resultInsertSql = mysqli_query($conn, $insertSql);
					}else{
						// update query
						$updateSql = "UPDATE tbl_resume SET resume_file = '$fileNameNew' WHERE user_id = '$username'";
						$resultUpdateSql = mysqli_query($conn, $updateSql);
					}

					$destinationUpload = "../resumeUploads/".$fileNameNew;
					if(move_uploaded_file($fileTmpName, $destinationUpload))
					{
						
						header('Location: ../myaccount.php?rstatus=uploadSuccess');
						exit();
					}else{
						header('Location: ../myaccount.php?rstatus=uploadFail');
						exit();
					}
				}else{
					header('Location: ../myaccount.php?rstatus=largefile');
					exit();
				}
			}else{
				header('Location: ../myaccount.php?rstatus=uploadingError');
				exit();
			}
		}else{
			header('Location: ../myaccount.php?rstatus=invalidExtension&'.$file.'%');
			exit();
		}
		// close connection 
		mysqli_close($conn);

	}else{
		header('Location: ../index.php?error');
		exit();
	}