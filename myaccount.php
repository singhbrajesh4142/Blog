<!-- include head -->
<?php require_once 'head.php'; ?>
    
<!-- include navigation header -->
<?php require_once 'navigation-header.php'; ?>
    

<!-- content for my account page -->
	<div id="myaccount_page_content" >
		<div id="profile-pic-content">
			<div id="profile-pic">
				<?php 
					$username = $_SESSION['user_name'];
					require_once 'connection/db.connection.php';
					$profilepicsql = "SELECT * FROM profileimg WHERE uid = '$username' ";
					$result = mysqli_query($conn, $profilepicsql);
					$resultCount = mysqli_num_rows($result);
					if($resultCount > 0){
						// profile pic exist
						echo '<img src="profileUploads/'.$username.'.jpg" class="img-responsive img-circle">';
					}else{
						// profile pic does not exist
						echo '<img src="image/default_profile_pic.jpg" class="img-responsive img-circle">';
					}
					
				?>
				
			</div>
		</div>
		<div id="profile-page-content">
			<div id="show-status">
				<?php
					$msg = "";
					if(isset($_GET['status'])){
						if($_GET['status']=="emptypwd"){
							$msg = "<i style='color:red;'>All fields are required !</i>";
						}else if($_GET['status']=="pwdlessthan6"){
							$msg = "<i style='color:red;'>password length should be at least 6 character long !</i>";
						}else if($_GET['status']=="pwdUpdated"){
							$msg = "<i style='color:green;'>Password updated successfully </i>";
						}else if($_GET['status']=="pwdnconfirmpwdnotmatch"){
							$msg = "<i style='color:red;'>Both password field are not matching !</i>";
						}else if($_GET['status']=="oldpwdnotmatch"){
							$msg = "<i style='color:red;'>Old Password is incorrect</i>";
						}else if($_GET['status']=="emptyconfession"){
							$msg = "<i style='color:red;'>Confession field can not be empty !</i>";
						}else if($_GET['status']=="confessionadded"){
							$msg = "<i style='color:green;'>Confession added</i>";
						}else if($_GET['status']=="emptymsg"){
							$msg = "<i style='color:red;'>Empty Message !</i>";
						}else if($_GET['status']=="msgsendsuccess"){
							$msg = "<i style='color:green;'>Message send successfully</i>";
						}else if($_GET['status']=="emptypost"){
							$msg = "<i style='color:red;'>all fields are required !</i>";
						}
					}
					if(isset($_GET['istatus'])){
						if($_GET['istatus']=="uploadSuccess"){
							$msg = "<i style='color:green;'>profile photo uploaded successfully</i>";
						}else if($_GET['istatus']=="uploadFail"){
							$msg = "<i style='color:red;'>upload fail!</i>";
						}else if($_GET['istatus']=="largefile"){
							$msg = "<i style='color:red;'>file is too large </i>";
						}else if($_GET['istatus']=="uploadingError"){
							$msg = "<i style='color:red;'>uploading error</i>";
						}else if($_GET['istatus']=="invalidExtension"){
							$msg = "<i style='color:red;'>invalid extension !</i>";
						}
					}

					if(isset($_GET['rstatus'])){
						if($_GET['rstatus']=="uploadSuccess"){
							$msg = "<i style='color:green;'>Resume upload success</i>";
						}else if($_GET['rstatus']=="uploadFail"){
							$msg = "<i style='color:red;'>upload fail</i>";
						}else if($_GET['rstatus']=="largefile"){
							$msg = "<i style='color:red;'>File is too large</i>";
						}else if($_GET['rstatus']=="uploadingError"){
							$msg = "<i style='color:red;'>Uploading error</i>";
						}else if($_GET['rstatus']=="invalidExtension"){
							$msg = "<i style='color:red;'>Invalid extension !</i>";
						}
					}
					echo $msg;
				?>
			</div>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#dashboard-content" data-toggle="tab" area-expended="true">Dashboard</a></li>
				<li><a href="#edit-profile-content" data-toggle="tab" area-expended="true">Edit Profile</a></li>
				<li><a href="#members-content" data-toggle="tab" area-expended="true">Members</a></li>
				<li><a href="#confession-content" data-toggle="tab" area-expended="true">Confession</a></li>
				<li><a href="#share-content" data-toggle="tab" area-expended="true">Share</a></li>
				<li><a href="#inbox-content" data-toggle="tab" area-expended="true">Inbox</a></li>
				<li><a href="#groupchat-content" data-toggle="tab" area-expended="true">Group Chat</a></li>
				<li><a href="#chage-pwd-content" data-toggle="tab" area-expended="true">Change password</a></li>
			</ul>
			<div class="tab-content">
				<div id="dashboard-content" class="active tab-pane fade in">
					<?php  include_once 'dashboard.php' ?>
				</div>
				<div id="edit-profile-content" class="tab-pane fade">
					<?php  include_once 'editprofile.php' ?>
				</div>
				<div id="members-content" class="tab-pane fade">
					<?php  include_once 'members.php' ?>
				</div>
				<div id="confession-content" class="tab-pane fade">
					<?php  include_once 'confession.php' ?>
				</div>
				<div id="share-content" class="tab-pane fade">
					<?php  include_once 'share.php' ?>
				</div>
				<div id="inbox-content" class="tab-pane fade">
					<?php  include_once 'inbox.php' ?>
				</div>
				<div id="groupchat-content" class="tab-pane fade">
					<?php  include_once 'groupchat.php' ?>
				</div>
				<div id="chage-pwd-content" class="tab-pane fade">
					<?php  include_once 'changepwd.php' ?>
				</div>
			</div>
		</div>
	</div>
<!-- end of the code for this page -->

<!-- style for this page -->
<style type='text/css'>
#myaccount_page_content{
	min-height: 800px;
	background: radial-gradient(circle, #f2f2f2, #00aaff);
	padding: 10px 40px 30px 40px;
}
#profile-pic-content{
	height: 150px;
}

#profile-pic{
	height: 150px;
	width:150px;
	margin:auto;
	border-radius: 75px;
}

#profile-page-content{
	margin-top: 40px;
}
#profile-page-content ul li a{
	color: #000;
	font-size: 16px;
}
</style>

<!-- inlcude footer -->
<?php require_once 'footer.php'; ?>