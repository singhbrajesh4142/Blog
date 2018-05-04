<?php 
	
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>
<div class="col-lg-3 col-md-3 col-sm-2"></div>
<div id="members-div" class="col-lg-6 col-md-6 col-sm-8">
	<h4>members</h4><hr/>
	<?php
		require_once 'connection/db.connection.php';
		$username = $_SESSION['user_name'];
		$usersql = "SELECT * FROM users WHERE user_name != '$username'";
		$resultuserlist = mysqli_query($conn, $usersql);
		$resultCount = mysqli_num_rows($resultuserlist);
		if($resultCount > 0){
			// more than one user exist into database
			while($row = mysqli_fetch_assoc($resultuserlist)){
				$user_name = $row['user_name'];
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$gender = $row['gender'];
				echo '<div id="member-list"><b>UserName :</b> '.$user_name.'<br/><b>Full Name : </b>'.$first_name.' '.$last_name.'<br/><b>Gender : </b>'.$gender.'<br/><a id="messagepopup" href="sendmessage.php?to='.$user_name.'" class="btn btn-primary" >Send Message</a></div>';
				echo '<div class="modal fade" id="message-modal" tabindex="-1">
                <div id="dialog-model-msg" class="modal-dialog">
                  <div class="modal-content" >
                    <div class="modal-header">
                      <button id="btnmsgcross" class="close" >&times;</button>
                      <h4 class="modal-title">Send Message</h4>
                    </div>

                    <div class="modal-body">
                      <form action="code/code.sendmessage.php" method="POST">
                        <div class="form-group">
                          <input type="hidden" name="hiddenusername" value="'.$user_name.'"/>
                          <textarea rows="7" class="form-control" name="msg" placeholder="Message "></textarea>
                        </div>
                        <button type="submit" name="btn-send-message" class="btn btn-primary form-control">Send Message</button>
                      </form>
                    </div>

                    <div class="modal-footer">
                    	<button id="btnmsgclose" class="btn btn-primary" >Close</button>
                    </div>
                  </div>
                </div>
              </div>';
			}
		}else{
			echo 'Sorry! No other user !';
		}
		
	?>
</div>
<style type="text/css">
	#members-div h4{
		text-align: center;
	}
	#member-list{
		margin: 10px;
		background-color: #fff;
		padding: 20px;
		border-radius: 4px;
	}
	a{
		margin-top: 5px;
	}
</style>
