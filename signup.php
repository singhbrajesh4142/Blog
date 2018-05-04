<!-- include head -->
<?php require_once 'head.php'; ?>
    
<!-- include navigation header -->
<?php require_once 'navigation-header.php'; ?>
    

<!-- signup content for this page goes here -->
<div id="signup-page-content" >
			<div class="col-lg-3 col-md-3 col-sm-2">

	</div>
  <div class="col-lg-6 col-md-6 col-sm-8">
  		<h2>Register here </h2>
  		<hr/>
  		<div id="signup-error-msg">
  			<?php
  				$msg = "";
  				if(isset($_GET['error'])){
  					if($_GET['error'] == "empty"){
  						$msg = "All fields are required !";
  					}if($_GET['error'] == "firstOrLast"){
  						$msg = "invalid characters in first name or in last name !";
  					}if($_GET['error'] == "not10"){
  						$msg = "Mobile no should be 10 digit long";
  					}if($_GET['error'] == "notdigit"){
  						$msg = "Only digits are allowed in mobile no.";
  					}if($_GET['error'] == "zerofirst"){
  						$msg = "Mobile no should not be start with Zero !";
  					}if($_GET['error'] == "invalidemail"){
  						$msg = "Invalid email format";
  					}if($_GET['error'] == "pwdnotmatch"){
  						$msg = "Password fields are not matched !";
  					}
  					if($_GET['error'] == "pwd6"){
  						$msg = "Password should be atleast 6 characters long !";
  					}if($_GET['error'] == "userexist"){
  						$msg = "Username already exist please choose another one !";
  					}
  					echo '<h5 style="color:red;">'.$msg.'</h5>';
  				}
  				
  				if(isset($_GET['status'])){
  					if($_GET['status'] == "success"){
  						$msg = "you are registered successfully .";
  					}
  					echo '<h5 style="color:green;"><b>'.$msg.'</b></h5>';
  				}
  				
  			?>
  		</div>
  		<form action="code/code.signup.php" method="POST">
  			<div class="form-group">
  				<label for="firstname">First name :  </label>
  				<input type="text" name="firstname" placeholder="First name" class="form-control"/>
  			</div>
  			<div class="form-group">
  				<label for="lastname">Last name :  </label>
  				<input type="text" name="lastname" placeholder="Last name" class="form-control"/>
  			</div>
  			<div class="form-group">
  				<label for="gender">Gender :  </label>
  				<input type="radio" name="gender" checked="checked" value="male" > Male
  				<input type="radio" name="gender" value="female" > Female
  			</div>
  			<div class="form-group">
  				<label for="mobile"> Mobile number : <small><i>+91</i></small></label>
  				<input type="text" name="mobile" placeholder="e.g. 9876543210" class="form-control"/>
  			</div>
  			<div class="form-group">
  				<label for="email"> Email : </label>
  				<input type="text" name="email" placeholder="yourname@domain.com" class="form-control"/>
  			</div>
  			<div class="form-group">
  				<label for="username"> User name : </label>
  				<input type="text" name="username" placeholder="Username" class="form-control"/>
  			</div>
  			<div class="form-group">
  				<label for="password"> Password : </label>
  				<input type="password" name="password" placeholder="Password" class="form-control"/>
  			</div>
  			<div class="form-group">
  				<label for="confirmpassword">Confirm Password : </label>
  				<input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control"/>
  			</div>
  			<button type='submit' name="btn-signup" class="btn btn-primary">Submit</button>
  		</form>
  
	</div>
</div>
<!-- end of the code for this page -->

<style type="text/css">
#signup-page-content{
	min-height: 700px;
	margin-bottom: 20px;
}
</style>

<!-- inlcude footer -->
<?php require_once 'footer.php'; ?>