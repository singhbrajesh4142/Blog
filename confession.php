<?php 
	
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>
<div class="col-lg-3 col-md-3 col-sm-2"></div>
<div id="confession-page" class="col-lg-6 col-md-6 col-sm-8">
	<h4>Confession</h4><hr/>
	<form action="code/code.confession.php" method="POST">
		<div class="form-group">
			<label for="confession-msg">Message: </label>
			<textarea name="confession-msg" rows="8" class="form-control" placeholder="Put Your message Here..."></textarea>
		</div>
		<button type="submit" name="submit-confession" class="btn btn-primary">Share</button>
	</form>
</div>
<style type="text/css">
	#confession-page{
		padding-top: 20px;
	}
	#confession-page h4{
		text-align: center;
	}
	#confession-page form{
		margin-top: 40px;
	}
</style>