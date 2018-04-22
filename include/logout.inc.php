<?php
  if(isset($_POST['submit'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../Home.php");
    exit();
  } else {
    header("Location: ../profile.php");
    exit();
  }
?>
