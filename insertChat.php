<?php
session_start();
	if(!isset($_SESSION['u_id'])){
		header('Location: index.php?error');
		exit();
	}
$uname = $_SESSION['user_name'];
$msg = $_REQUEST['msg'];

include 'connection/db.connection.php';

$sql = "INSERT INTO chat (username, msg) VALUES ('$uname', '$msg')";
$result = mysqli_query($conn, $sql);


$sql1 = "SELECT * FROM chat ORDER BY id DESC LIMIT 15";
$result1 = mysqli_query($conn, $sql1);

while($extract = mysqli_fetch_assoc($result1)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
}

mysqli_close($conn);