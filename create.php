<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>


  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <!--<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
  <link href="css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>






    <div id="container">

      <div id="form_box2">
        <form class="create" action="include/new_account.inc.php" method="POST">
          <p id="form_heading2">Create Account</p>
          <div id = "user_error2">
            <?php
              if (isset($_SESSION['user_error'])) {
                echo $_SESSION['user_error'];
                unset($_SESSION['user_error']);
              }
            ?>
          </div>
          <input type="name" name = "fname" id = "fname" placeholder="First Name" maxlength="20" value="<?php if(isset($_SESSION['temp_first'])){echo $_SESSION['temp_first'];unset($_SESSION['temp_first']);}?>">
          <div id = "fname_error"></div><br />
          <input type="name" name = "lname" id = "lname" placeholder="Last Name" maxlength="20" value="<?php if(isset($_SESSION['temp_last'])){echo $_SESSION['temp_last'];unset($_SESSION['temp_last']);}?>">
          <div id = "lname_error"></div><br />


          <input type="name" name = "uid" id = "uid" placeholder="Username" maxlength="20" value="<?php if(isset($_SESSION['temp_user'])){echo $_SESSION['temp_user'];unset($_SESSION['temp_user']);}?>">
          <div id = "uid_error"></div><br />
          <input type="password" name = "pwd" id = "pwd" placeholder="Password" maxlength="20" value="<?php if(isset($_SESSION['temp_pass'])){echo $_SESSION['temp_pass'];unset($_SESSION['temp_pass']);}?>">
          <div id = "pwd_error"></div><br />
          <input type="name" name = "email" id = "email" placeholder="Email" maxlength="35" value="<?php if(isset($_SESSION['temp_email'])){echo $_SESSION['temp_email'];unset($_SESSION['temp_email']);}?>">
          <div id = "email_error"></div><br />
          <input type="submit" name = "submit" id = "submit" value="Submit"><br />
          <p class="message" id="font_21">Already have an account?
              <a href="login.php" id="font_20">Sign In</a></p><br /><br />
        </form>
        </div>
    </div>


 <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/script.js"></script>
  <script src="js/validate.js"></script>
  </body>
</html>
