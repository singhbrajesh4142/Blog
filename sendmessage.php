
<!-- include head -->
<?php require_once 'head.php'; ?>
    
<!-- include navigation header -->
<?php require_once 'navigation-header.php'; ?>
    
<?php 
  
  if(!isset($_SESSION['u_id'])){
    header('Location: index.php?error');
    exit();
  }
?>
<!-- main content for this page goes here -->
<div id="send-message-page-content" class="container">
  <div class="col-lg-3 col-md-3 col-sm-2"></div>
  <div class="col-lg-6 col-md-6 col-sm-8">
  	<h4>Send message to : <?php if(isset($_GET['to'])){echo $_GET['to'];} ?></h4><hr/>
  	<form action="code/code.sendmessage.php" method="POST">
  		<div class="form-group">
  			<input type="hidden" name="hiddenusername" value="<?php if(isset($_GET['to'])){echo $_GET['to'];} ?>">
  			<label for="message">Message : </label>
  			<textarea rows="5" class="form-control" name="message" placeholder="Message"></textarea>
  		</div>
  		<button type="submit" name="btn-send-msg" class="btn btn-primary">Send</button>
  	</form>
  </div>
</div>
<!-- end of the code for this page -->

<style type="text/css">
	/* send message */
#send-message-page-content{
	min-height: 700px;
}
#send-message-page-content h4{
	text-align: center;
}
</style>

<!-- inlcude footer -->
<?php require_once 'footer.php'; ?>