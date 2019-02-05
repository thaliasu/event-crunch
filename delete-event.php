<?php
	include 'include/connect.inc.php';
	session_start();

	$isClicked = $_POST['deleteClicked'];
	$username = $_SESSION['user'];
	echo $username;
	if($isClicked == 1) {

		$sql = "DELETE FROM `events` WHERE `username` = '$username'";
		//mysqli_query("DELETE FROM `table` WHERE `id` = '$id' AND `username` = '$username'");

		mysqli_query ($conn, $sql);

		header('Location: '.$_SERVER['REQUEST_URI']);



	} else {
		header("Location: index.php");
    	exit();
	}





?>
