<html>
  <!-- Nav Bar -->

  <nav class="z-depth-0">
    <div class="nav-wrapper">
      <a id="logo-container" href="Home.php" class="brand-logo"><img src="images/eventcrunch1.png" height="65" class="brand-logo"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="Home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php
          if(isset($_SESSION['logged_in'])) {
            echo '<li><a href="profile.php">Profile</a></li>';
            echo '<li><a href="include/logout.inc.php">Logout</a></li>';
          } else {
            echo '<li><a href="login.php">Login</a></li>';
          }
        ?>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="Home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php
          if(isset($_SESSION['logged_in'])) {
            echo '<li><a href="profile.php">Profile</a></li>';
            echo '<li><a href="include/logout.inc.php">Logout</a></li>';
          } else {
            echo '<li><a href="login.php">Login</a></li>';
          }


        ?>
      </ul>
    </div>
  </nav>
</html>


