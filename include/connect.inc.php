<?php
  //connects to Event Crunch's database
  $host = "us-cdbr-iron-east-03.cleardb.net";
  $username = "b4df918d1e814d";
  $password = "d7985f81";
  $dbname = "heroku_3623d8589c0f549";

  //For local testing:
  /*$host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "event-crunch";*/

  $conn = mysqli_connect("$host", "$username", "$password", "$dbname") or die(mysqli_connect_error());

  /*Test connection, if doubtful:
  Test to insert data into table using connect.inc.php successful
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }
    echo "Connected successfully";*/
?>
