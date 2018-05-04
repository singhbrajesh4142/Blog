<?php 
	
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>
<div class="col-lg-3 col-md-3 col-sm-2"></div>
<div id="chatbox-div" class="col-lg-6 col-md-6 col-sm-8">
			<div id="groupchat-content">
					<h4><i>Welcome <?php echo $_SESSION['user_name']; ?> </i></h4>
					<hr/>
					<div id="group-chat">
						<div id="show-chat">
							<!-- chat content will be displayed here  -->
							Loading Chatlog...
						</div>
						<form name="chatform">
							<div class="input-group">
								<input type="text" name="msg" class="form-control" placeholder="Enter your message here..." />
								<span class="input-group-btn"><a href="#" type="button" class="btn btn-default" onclick="submitChat()">Send</a>
								</span>
							</div>
						</form>
					</div>

			</div>
</div>
<style type="text/css">
	#groupchat-content{
		padding-top: 10px;
	}
	#group-chat{
		border: 1px solid #f2f2f2;
		border-radius: 3px;
	}
	#show-chat{
		min-height: 400px;
		background-color: #fff;
		padding: 15px;
		font-family: serif;
    	font-style: italic;
    	font-size: 1em;
	}
</style>

<script type="text/javascript">

function submitChat() {
	if(chatform.msg.value == '') {
		alert("message field is empty!");
		return;
	}
	var msg = chatform.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('show-chat').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insertChat.php?msg='+msg,true);
	xmlhttp.send();

}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: true
	});
	setInterval( function(){ $('#show-chat').load('chatLogs.php'); }, 2000 );
});

</script>
