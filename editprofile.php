<?php 
	
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>
<div class="col-lg-3 col-md-3 col-sm-2"></div>
<div id="editprofile-div" class="col-lg-6 col-md-6 col-sm-8">
	<form action="code/code.uploadprofilepic.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
							<td><input type="file" name="p-image"/></td>
							<td><small><i>Only .jpg and .jpeg</i></small> </td>
							<td><button type="submit" name="submit-profile-pic" class="btn btn-primary">
							Upload Profile Photo
							</button></td>
							
			</tr>
		</table>
		
		
	</form>
	<form action="code/code.uploadresume.php" method="POST" enctype="multipart/form-data">
		<table>
						<tr>
							<td><input type="file" name="resume"/></td>
							<td><small><i>Only .pdf and .docx</i></small> </td>
							<td><button type="submit" name="submit-resume" class="btn btn-primary">
							Upload your Resume
							</button></td>
							
						</tr>
		</table>
	</form>
</div>
<style type="text/css">
	#editprofile-div{
		margin-top: 40px;
	}
	#editprofile-div form{
		margin: 30px;
	}
</style>