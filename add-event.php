<?php
	include 'include/connect.inc.php';
	session_start();

	$artist = $_POST['artist'];
	$venue = $_POST['venue'];
	$url = $_POST['url'];
		if (empty($url)) {
			$url = "./images/default.jpg";
		}
	$date = $_POST['date'];
	$username = $_SESSION['user'];
	// echo $artist;
	// echo $venue;
	// echo $url;
	// echo $date;
	// echo $username;



	$dupesql = "SELECT * FROM events where (username = '$username' AND artist = '$artist' AND thumbail = '$url' AND date = '$date')";

	$duperaw = mysqli_query($conn, $dupesql);
	if (!$duperaw) die($conn->error);

	if (mysqli_num_rows($duperaw) > 0) {
		$duplicate = "Event already added";
		echo $duplicate;

	} else {
		$sql = "INSERT INTO events (username, artist, thumbail, date, venue) VALUES ('$username', '$artist', '$url', '$date', '$venue')";
		mysqli_query ($conn, $sql);
		$Added = "Added Event";
		echo $Added;
	}




	//DATABASE
		//USERS
			//STORES ID
		//EVENTS
			//STORES INFO
	//HOW TO LINK 2?



?>
