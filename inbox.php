<?php 
	
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>
<div class="col-lg-3 col-md-3 col-sm-2"></div>
<div id="inbox-div" class="col-lg-6 col-md-6 col-sm-8">
	<?php
	// make connection with database
	require_once 'connection/db.connection.php';
	$username = $_SESSION['user_name'];
	$inboxSql = "SELECT * FROM message WHERE msgto = '$username' ORDER BY id DESC";
	$result = mysqli_query($conn, $inboxSql);

	$resultCount = mysqli_num_rows($result);
	if($resultCount > 0){
		// there are some message for you
		while($row = mysqli_fetch_assoc($result)){
			$msg_date = $row['msg_create_time'];
			$msg_from = $row['msgfrom'];
			$msg = $row['msg'];
			echo '<div id="msg-div"><b>'.$msg_from.'</b><small><i> sent on '.$msg_date.'</i></small><br/>';
			echo $msg.'<br/><a href="sendmessage.php?to='.$msg_from.'&" class="btn btn-primary"> Reply to message</a> </div>';
		}
	}else{
		// there are no message for you
		echo '<h4><b>There are No message for you!</b></h4>';
	}
	
?>
</div>
<style type="text/css">
	#inbox-div{
		padding: 30px 15px 30px 15px;
	}
	#msg-div{
		margin: 5px;
		background-color: #fff;
		padding: 15px;
		border-radius: 4px;
	}
</style>