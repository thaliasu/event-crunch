<?php
  session_start();

  if(isset($_POST['submit'])) {
    include 'connect.inc.php';
    $user = $_POST['uid'];
    $pass = $_POST['pwd'];

    //Error handlers
    //Check if inputs are empty
    if(empty($user) || empty($pass)) {
      header("Location: ../login.php?login=empty");
      exit();
    } else {
      //Prevent accepting invalid code
      if(!preg_match("/^\S{4,20}$/", $user) || !preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d])([^\s]){8,16}$/", $pass)) {
        header("Location: ../login.php?signup=invalid");
        exit();
      }
      $sql = "SELECT * FROM users WHERE username='$user'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);  //Checks # of rows matching search parameters
      if($resultCheck < 1) {
        header("Location: ../login.php?login=error");  //nonspecific message prevents user from guessing user/pass combos
        exit();
      } else {
        //Insert results into array
        if($row=mysqli_fetch_assoc($result)) {
          //Dehash
          $hashedPwdCheck = PASSWORD_VERIFY($pass, $row['password']);
          if($hashedPwdCheck==false) {
            header("Location: ../login.php?login=invalidpass");
            exit();
          } elseif ($hashedPwdCheck==true) {
            //else if is done to be extra sure user only logs in if password matches
            $_SESSION['logged_in'] = $row['id'];
            $_SESSION['first'] = $row['firstName'];
            $_SESSION['last'] = $row['lastName'];
            $_SESSION['user'] = $row['username'];
            $_SESSION['pass'] = $pass;
            $_SESSION['email'] = $row['email'];
            //redirect to profile
            header("Location: ../profile.php");
            exit();
          }
        }
      }
    }
  } else {
    header("Location: ../login.php");
    exit();
  }
?>
