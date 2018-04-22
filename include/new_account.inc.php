<?php
  session_start();

  //insert data into table when user creates new account
  include_once 'connect.inc.php';

    //PHP can only reference names and not IDs
    //Check if submit button has been clicked
    if(isset($_POST['submit'])) {
      //Use prepared statements; running into error with mysqli_real_string_escape, for some reason
      $first = $_POST['fname'];
      $last = $_POST['lname'];
      $user = $_POST['uid'];
      $pass = $_POST['pwd'];
      $email = $_POST['email'];

      /*echo $first;
      echo $last;
      echo $user;
      echo $pass;
      echo $email;*/

      //error handlers
      //check for empty fields
      if(empty($first) || empty($last) || empty($user) || empty($pass) || empty($email)) {
        header("Location: ../create.php?signup=empty");
        exit();
      }else {
          //check if input is valid; code may not be neccessary once I figure submit event out
          if(!preg_match("/^[a-zA-Z]{1,20}$/", $first) || !preg_match("/^[a-zA-Z]{1,20}$/", $last) || !preg_match("/^\S{4,20}$/", $user)
            || !preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d])([^\s]){8,16}$/", $pass)) {
            header("Location: ../create.php?signup=invalid");
            exit();
          } else {
            //filter_var checks for a specific string
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              header("Location: ../create.php?signup=emailinvalid");
              exit();
            } else {
              //check if username is taken
              $sql = "SELECT * FROM users WHERE username='$user'";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);

              if($resultCheck > 0) {
                header("Location: ../create.php?signup=usertaken");
                exit();
              } else {
                //Hashing the password
                $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
                //Insert user into db
                $sql = "INSERT INTO users(firstName, lastName, username, password, email) VALUES ('$first', '$last', '$user', '$hashedPwd', '$email')";
                mysqli_query($conn, $sql);
                header("Location: ../create.php?signup=success");
                //header("Refresh: 5; url:login.html");
                exit();
              }
            }
          }
        }
      } else {
            //if user enters form url into browser, redirect
            header("Location: ../create.php");
            exit();
      }

  //check if data was inserted
  /*if (mysqli_query($conn, $sql)==true) {
    $_SESSION['logged_in'];
    echo "Account successfully created!<br>Redirecting in 5 seconds...";
    header("Refresh: 5; url:profile.php");  //profile page not yet created
  }
  else {
    echo "We encountered an error creating your account.<br>This page will refresh so you can try again."
    header("Refresh: 5");
  }*/
?>
