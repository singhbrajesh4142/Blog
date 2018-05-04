<?php 
	session_start();
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
?>
<?php

	include 'connection/db.connection.php';

$sql = "SELECT * FROM chat ORDER BY id DESC LIMIT 15";
$result = mysqli_query($conn, $sql);

while($extract = mysqli_fetch_assoc($result)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
}

mysqli_close($conn);