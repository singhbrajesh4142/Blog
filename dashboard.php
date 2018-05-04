<?php 
	
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>
<div class="col-lg-3 col-md-3 col-sm-2"></div>
<div id="dashboard-div" class="col-lg-6 col-md-6 col-sm-8">
	<h4>Personal Information : </h4><hr/>
	<table >
		<tr>
			<td><b>First Name : </b></td>
			<td><?php echo $_SESSION['first_name']; ?></td>
		</tr>
		<tr>
			<td><b>Last Name : </b></td>
			<td><?php echo $_SESSION['last_name']; ?></td>
		</tr>
		<tr>
			<td><b>Gender : </b></td>
			<td><?php echo $_SESSION['gender']; ?></td>
		</tr>
		<tr>
			<td><b>Mobile : </b></td>
			<td><?php echo $_SESSION['mobile']; ?></td>
		</tr>
		<tr>
			<td><b>Email Id : </b></td>
			<td><?php echo $_SESSION['email']; ?></td>
		</tr>
	</table>
	<hr/>
		<h4>Your Activities : </h4><hr/>
	<div id="activity-div">
		<h5>Your Post  : </h5><br/>
		<?php
			// make connection with database
			require_once 'connection/db.connection.php';
			$username = $_SESSION['user_name'];
			$sql = "SELECT * FROM post WHERE post_owner_id = '$username'";
			$resultSql = mysqli_query($conn, $sql);
			$resultCount = mysqli_num_rows($resultSql);
			if($resultCount > 0){
				// there are some post by you
				echo ' '.$resultCount.' post';
				while($row = mysqli_fetch_assoc($resultSql)){
					$msg = $row['post_msg'];
					$post_time = $row['post_create_time'];
					$stringPost = (string)$msg;
					$postLen = strlen($stringPost);
					$substringPost = $stringPost;
					if($postLen > 50){
						$substringPost = substr($stringPost, 0, 50);
						$substringPost .= '...';
					}
					echo '<div class="postLog"><small><i>posted on </i></small>'.$post_time.' <br/>Post : '.$substringPost.'</div>';
				}
			}else{
				// no post of you
				echo 'No post !';
			}
		?><hr/>
		<h5>Your Confession  : </h5><br/>
		<?php
			// make connection with database
			require_once 'connection/db.connection.php';
			$username = $_SESSION['user_name'];
			$sql = "SELECT * FROM confession WHERE owner_id = '$username'";
			$resultSql = mysqli_query($conn, $sql);
			$resultCount = mysqli_num_rows($resultSql);
			if($resultCount > 0){
				// there are some post by you
				echo ' '.$resultCount.' post';
				while($row = mysqli_fetch_assoc($resultSql)){
					$msg = $row['message'];
					$post_time = $row['create_time'];
					$stringPost = (string)$msg;
					$postLen = strlen($stringPost);
					$substringPost = $stringPost;
					if($postLen > 50){
						$substringPost = substr($stringPost, 0, 50);
						$substringPost .= '...';
					}
					echo '<div class="postLog"><small><i>posted on </i></small>'.$post_time.' <br/>Confession Message : '.$substringPost.'</div>';
				}
			}else{
				// no post of you
				echo 'No Confession !';
			}
		?>
	</div>
</div>

<style type="text/css">
	#dashboard-div h4
	{	margin-top: 20px;
		text-align: center;
	}
	#dashboard-div td{
		padding: 10px;
		
	}
	.postLog{
		background-color: #f2f2f2;
		border: 1px solid #f2f2f2;
		border-radius: 3px;
		padding: 3px;
		margin: 5px;
	}
</style>