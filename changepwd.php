<?php 
	
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>
<div class="col-lg-3 col-md-3 col-sm-2"></div>
<div id="changepwd-div" class="col-lg-6 col-md-6 col-sm-8">
	
	<form action="code/code.changepwd.php" method="POST">
		<div class="form-group">
			<label for="oldpwd">Old Password : </label>
			<input type="text" class="form-control" name="oldpwd" placeholder="Old Password"/>
		</div>
		<div class="form-group">
			<label for="newpwd">New Password : </label>
			<input type="text" class="form-control" name="newpwd" placeholder="New Password"/>
		</div>
		<div class="form-group">
			<label for="confirmnewpwd">Confirm New Password : </label>
			<input type="text" class="form-control" name="confirmnewpwd" placeholder="Confirm new Password"/>
		</div>
		<button class="btn btn-primary" type='submit' name="submit-change-pwd">Save</button>
	</form>
</div>
<style type="text/css">
	#changepwd-div{
		margin-top: 40px;
	}
</style>