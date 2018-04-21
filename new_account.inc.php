<?php
  //insert data into table when user creates new account
  include 'connect.inc.php';
  //redacted code has less security
  /*$first = $_POST['fname'];
  $last = $_POST['lname'];
  $user = $_POST['uid'];
  $pass = $_POST['pwd'];
  $email = $_POST['email'];
  //insert user's info into table called "users"
  $sql = "
  INSERT INTO users(firstName, lastName, username, password, email) VALUES ('$first', '$last', '$user', '$pass', '$email')";*/

  $conn = mysqli_connect("localhost", "$username", "$password", "$dbname") or die(mysqli_error());




  //check if submit button has been clicked
  if(isset($_POST['submit'])) {
    $first = mysqli_real_string_escape($conn, $_POST['fname']);
    $last = mysqli_real_string_escape($conn, $_POST['lname']);
    $user = mysqli_real_string_escape($conn, $_POST['uid']);
    $pass = mysqli_real_string_escape($conn, $_POST['pwd']);
    $email = mysqli_real_string_escape($conn, $_POST['email']);

    //filter_var checks for a specific string
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location:new_account.php?signup=email");
      exit();
    } else {
      //check if username is taken
      $sql = "SELECT * FROM users WHERE username='$user'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if($resultCheck > 0) {
        header("Location:new_account.php?signup=usertaken");
        exit();
      } else {
        //Hashing the password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        //Insert user into db
        $sql = "INSERT INTO users(firstName, lastName, username, password, email) VALUES ('$first', '$last', '$uid', '$hashedPwd', '$email')";
        mysqli_query($conn, $sql);
        header("Refresh: 5; url:login.html");
      }
    }
  }

  //check if data was inserted
  /*if mysqli_query($conn, $sql) {
    $_SESSION['logged_in'];
    echo "Account successfully created!<br>Redirecting in 5 seconds...";
    header("Refresh: 5; url:profile.php");  //profile page not yet created
  }
  else {
    echo "We encountered an error creating your account.<br>This page will refresh so you can try again."
    header("Refresh: 5");
  }*/
?>
