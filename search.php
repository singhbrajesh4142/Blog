<!-- include head -->
<?php require_once 'head.php'; ?>
    
<!-- include navigation header -->
<?php require_once 'navigation-header.php'; ?>
    

<!-- main content for this page goes here -->
<div id="search-page-content" class="container">
<?php

	// check if it is a post back request
	if(isset($_POST['btn-search'])){
		require_once 'connection/db.connection.php';

		// get the value from search input field
		$searchContent = mysqli_real_escape_string($conn, $_POST['search-field']);

		$sql = "SELECT * FROM post WHERE post_owner_name LIKE '%$searchContent%' OR post_msg LIKE '%$searchContent%' OR post_create_time LIKE '%$searchContent%' ";
		$result = mysqli_query($conn, $sql);
		$resultCount = mysqli_num_rows($result);
		if($resultCount > 0){
			// match found
			echo '<b><i>'.$resultCount.' matching result found !</i></b>';
			// retrieve all the post from database and display them
						while($row = mysqli_fetch_assoc($result)){
							$postText = $row['post_msg'];
							$time = $row["post_create_time"];
						
							echo '
								<div class="media">
									<div class="media-left">
									    <img src="image/media-user-icon.png" class=" media-object" />
									</div>
									<div class="media-body">
										<h5 class="media-heading"><b>'.$row["post_owner_name"].'</b><small>
										<i>posted on : '.$time.'</i></small>
										</h5>
										<div id="media-content">
											<p><b><i>Post Content : </i></b>';
							
								echo $postText;
							echo '</p>
										</div>
									</div>
								</div>

								';
						}
						
		}else{
			// match not found 
			echo  'No matching result';
		}

	}else{
		header('Location: index.php?error');
		exit();
	}
	mysqli_close($conn);
?>
</div>
<!-- end of the code for this page -->

<style type="text/css">
	#search-page-content{
		min-height: 600px;
	}
	#media-content{
		margin-left: 10px;
		margin-top: 10px;
		padding: 10px;
		max-width: 800px;
		border: 1px solid #d9d9d9;
		border-radius: 4px;
		margin-bottom: 20px;
		background-color: #fff;
	}
	
</style>


<!-- inlcude footer -->
<?php require_once 'footer.php'; ?>