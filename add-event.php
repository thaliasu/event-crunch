<?php
	session_start();
	$artist = $_POST['artist'];
	$venue = $_POST['venue'];
	$url = $_POST['url'];
	$date = $_POST['date'];
	$username = $_SESSION['user'] ; 
	echo $artist;
	echo $venue;
	echo $url;
	echo $date;
	echo $username;

	
	




	$sql = "INSERT INTO events (username, artist, thumbnail, date, venue) VALUES ($username, $artist, $thumbnail, $date, $venue)";
	mysql_query ($sql);
	//DATABASE
		//USERS
			//STORES ID
		//EVENTS
			//STORES INFO
	//HOW TO LINK 2?



?>