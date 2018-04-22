<?php
  session_start();  //idk if this is necessary on this page or not

  //connects to Event Crunch's database
  $username = "root";
  $password = "";
  $dbname = "th402780";

  //  $username = "th402780";
  // $password = "midKnight6^";
  // $dbname = "th402780";

  $conn = mysqli_connect("localhost", "$username", "$password", "$dbname") or die(mysqli_error());

  /*Test connection, if doubtful:
  Test to insert data into table using connect.inc.php successful
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }
    echo "Connected successfully";*/
?>
