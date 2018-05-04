<!-- include head -->
<?php require_once 'head.php'; ?>
    
<!-- include navigation header -->
<?php require_once 'navigation-header.php'; ?>
    

<!-- main content for this page goes here -->
<div id="home-page-content" class="container">
			<div class="col-lg-12 col-md-12 col-sm-12">
					<ul class="nav nav-tabs">
				<li class="active"><a href="#post-content" data-toggle="tab" area-expended="true">Post</a></li>
				<li><a href="#confession-content" data-toggle="tab" area-expended="true">Confession</a></li>
			</ul>
			<div class="tab-content">
				<div id="post-content" class="active tab-pane fade in">
					<?php
					
					// make connection with database
					include_once 'connection/db.connection.php';
					
					$showPostSql = "SELECT * FROM post ORDER BY post_create_time DESC";
					$resultShowPost = mysqli_query($conn, $showPostSql);
					$resultShowPostCheck = mysqli_num_rows($resultShowPost);
					if($resultShowPostCheck<1){
						// no post in post database
						echo "No Posts are avialable";
					}else{
						// some posts are avialable
						// retrieve all the post from database and display them
						while($row = mysqli_fetch_assoc($resultShowPost)){
							$postText = $row['post_msg'];
							$postLength = strlen($postText);
							$time = $row["post_create_time"];
							//$fullPostLink = '<a href="fullpost.php?time='.$time.'">See full post</a>';
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
							//if($postLength <= 250){
								echo $postText;
							//}else{
							//	$subString = substr($postText,0,250);
							//	echo $subString.'...'.$fullPostLink;
							//}
							echo '</p>
										</div>
									</div>
								</div>

								';
						}
						
					}
				 ?>
				</div>
				<div id="confession-content" class="tab-pane fade in">
					<?php
					
					// make connection with database
					include_once 'connection/db.connection.php';
					
					$showPostSql = "SELECT * FROM confession ORDER BY create_time DESC";
					$resultPost = mysqli_query($conn, $showPostSql);
					$resultShowPostCheck = mysqli_num_rows($resultPost);
					if($resultShowPostCheck<1){
						// no post in post database
						echo "No Confessions are avialable";
					}else{
						// some posts are avialable
						// retrieve all the post from database and display them
						while($row = mysqli_fetch_assoc($resultPost)){
							$confessionId = $row['id'];
							$postText = $row['message'];
							$time = $row["create_time"];
							//$fullPostLink = '<a href="fullpost.php?time='.$time.'">See full post</a>';
							echo '
								<div class="media">
									<div class="media-left">
									    <img src="image/media-user-icon.png" class=" media-object" />
									</div>
									<div class="media-body">
										<h5 class="media-heading"><small>
										<i>posted on : '.$time.'</i></small>
										</h5>
										<div id="media-content">
											<p><b>#'.$confessionId.'<br/><i>Confession Message : </i></b>';
							//if($postLength <= 250){
								echo $postText;
							//}else{
							//	$subString = substr($postText,0,250);
							//	echo $subString.'...'.$fullPostLink;
							//}
							echo '</p>
										</div>
									</div>
								</div>

								';
						}
						
					}
				 ?>
				</div>
			</div>
			</div>
  				
</div>
<!-- end of the code for this page -->

<style type="text/css">
	#media-content{
		margin-left: 10px;
		margin-top: 10px;
		margin-right: 10px;
		padding: 10px;
		paddin-right: 20px;
		border: 1px solid #d9d9d9;
		border-radius: 4px;
		margin-bottom: 20px;
		background-color: #fff;
	}
	#confession-content{
		padding-top: 15px;
	}
	#post-content{
		padding-top: 15px;
	}
</style>


<!-- inlcude footer -->
<?php require_once 'footer.php'; ?>