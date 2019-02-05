<?php
  //connects to Event Crunch's database
  /*$host = "ec2-54-83-17-151.compute-1.amazonaws.com";
  $username = "uqmzndwrlxrmnt";
  $password = "420f3dd0b88596486eb510637051e2b66706093b9dfb60add35a9e36883fd295";
  $dbname = "db1begjoogpmj9";*/

  //For local testing:
  /*$host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "event-crunch";*/

  $conn = pg_connect("host=ec2-54-83-17-151.compute-1.amazonaws.com port=5432 dbname=db1begjoogpmj9 user=uqmzndwrlxrmnt password=420f3dd0b88596486eb510637051e2b66706093b9dfb60add35a9e36883fd295") or die("Could not connect");

  /*Test connection, if doubtful:
  Test to insert data into table using connect.inc.php successful
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }
    echo "Connected successfully";*/
?>
