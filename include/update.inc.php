<?php
  session_start();

  //insert data into table when user creates new account
  include_once 'connect.inc.php';

    //PHP can only reference names and not IDs
    //Check if 'save profile changes' button has been clicked
    if(isset($_POST['update'])) {
      //Use prepared statements; running into error with mysqli_real_string_escape, for some reason
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
        header("Location: ../profile.php?signup=empty");
        exit();
      }else {
          //check if input is valid; code may not be neccessary once I figure submit event out
          if(!preg_match("/^[a-zA-Z]{1,20}$/", $first) || !preg_match("/^[a-zA-Z]{1,20}$/", $last) || !preg_match("/^\S{4,20}$/", $user)
            || !preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d])([^\s]){8,16}$/", $pass)) {
            header("Location: ../profile.php?signup=invalid");
            exit();
          } else {
            //filter_var checks for a specific string
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              header("Location: ../profile.php?signup=emailinvalid");
              exit();
            } else {
              //check if username is taken
              $sql = "SELECT * FROM users WHERE username='$user'";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);

              if( (!$currentUser) && $resultCheck > 0) {
                header("Location: ../profile.php?signup=usertaken");
                exit();
              } else {
                //Hashing the password
                $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
                header("Location: ../profile.php?signup=update");
                //Update user in db
                $sql = "UPDATE users
                  SET firstName = $first, lastName = $last, username = $user, password = $hashedPwd, email = $email
                  WHERE id = $id";
                mysqli_query($conn, $sql);

                //overwrite session variables
                /*$_SESSION['first'] = $row['firstName'];
                $_SESSION['last'] = $row['lastName'];
                $_SESSION['user'] = $row['username'];
                $_SESSION['pass'] = $pass;
                $_SESSION['email'] = $row['email'];
                header("Location: ../profile.php");
                exit();*/
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
