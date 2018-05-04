<?php 
	
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>
<div class="col-lg-3 col-md-3 col-sm-2"></div>
<div id="sharepost-page" class="col-lg-6 col-md-6 col-sm-8">
	<h4>Share post</h4><hr/>
	<form action="code/code.sharepost.php" method="POST">
		<div class="form-group">
			<label for="fullname">Your Name : </label>
			<input type="text" class="form-control" name="fullname" placeholder="your name" />
		</div>
		<div class="form-group">
			<label for="sharepost-msg">Message: </label>
			<textarea name="sharepost-msg" rows="8" class="form-control" placeholder="Write Here..."></textarea>
		</div>
		<button type="submit" name="submit-sharepost" class="btn btn-primary">Post </button>
	</form>
</div>
<style type="text/css">
	#sharepost-page{
		padding-top: 20px;
	}
	#sharepost-page h4{
		text-align: center;
	}
	#sharepost-page form{
		margin-top: 40px;
	}
</style>