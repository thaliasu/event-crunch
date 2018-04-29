<?php
  session_start();

  //insert data into table when user creates new account
  include_once 'connect.inc.php';

    //PHP can only reference names and not IDs
    //Check if 'save profile changes' button has been clicked
    if(isset($_POST['update'])) {
      $first = $_POST['fname'];
      $last = $_POST['lname'];
      $user = $_POST['uid'];
      $pass = $_POST['pwd'];
      $email = $_POST['email'];
      $currentUser = $_SESSION['user'];  //variable later checks if updated username matches current one
      $id = $_SESSION['logged_in'];  //since session doesn't seem to be working in update statement

      //error handlers
      //check for empty fields
      if(empty($first) || empty($last) || empty($user) || empty($pass) || empty($email)) {
        header("Location: ../profile.php?update=empty");
        $_SESSION['user_error'] = "Please fill out all the fields.";
        exit();
      }else {
          //check if input is valid; code may not be neccessary once I figure submit event out
          if(!preg_match("/^([a-zA-Z]'* ?){1,20}$/", $first) || !preg_match("/^([a-zA-Z]'* ?){1,20}$/", $last) || !preg_match("/^\S{4,20}$/", $user)
            || !preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d])([^\s]){8,16}$/", $pass)) {
            header("Location: ../profile.php?update=invalid");
            $_SESSION['user_error'] = "Double-check to see if all inputs are valid. Usernames must be 4-20 characters long. Passwords should include
            1 uppercase and lowercase letter, 1 number, and be 8-20 characters long.";
            exit();
          } else {
            //filter_var checks for a specific string
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              header("Location: ../profile.php?update=emailinvalid");
              $_SESSION['user_error'] = "Please enter a valid email.";
              exit();
            } else {
              //check if username is taken
              $sql = "SELECT * FROM users WHERE username='$user' LIMIT 1";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);
              $row = mysqli_fetch_array($result);
              $userCheck = $row['username'];

              if( $userCheck != $currentUser && $resultCheck > 0 ) {
                header("Location: ../profile.php?update=usertaken");
                echo $userCheck;
                $_SESSION['user_error'] = "The username you submitted is taken.";
                exit();
              } else {
                //Hashing the password
                $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

                //Update user in db
                $sql = "UPDATE users
                  SET firstName = '$first', lastName = '$last', username = '$user', password = '$hashedPwd', email = '$email'
                  WHERE id = $id";
                if(mysqli_query($conn, $sql)) {
                  //overwrite session variables
                  $_SESSION['first'] = $first;
                  $_SESSION['last'] = $last;
                  $_SESSION['user'] = $user;
                  $_SESSION['pass'] = $pass;
                  $_SESSION['email'] = $email;

                  header("Location: ../profile.php?update=success");
                  $_SESSION['user_success'] = "Profile successfully updated.";
                  exit();
                } else {
                  header("Location: ../profile.php?update=failure");
                  $_SESSION['user_error'] = "Unable to update profile.";
                  exit();
                }
              }
            }
          }
        }
      } else {
            //if user enters form url into browser, redirect
            header("Location: ../profile.php");
            exit();
      }
?>
