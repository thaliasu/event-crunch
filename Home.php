<?php
  session_start();
?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>EventCrunch</title>
      <!-- CSS  -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>

<body>
  <!-- nav bar -->
  <?php include_once 'include/nav.inc.php'; ?>

<!-- parallax banner -->

<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h2 class="header center">Find music events near you</h2>
        <br><br>

      <div class="row center input-form">
          <input type="text" name="artist-search" id="artist-search" placeholder="search for an artist...">
          <input type="text" name="location" id="location" placeholder="search for a city..."><span class="error"></span>
            <div class="wrap">
                <a class="button red" href="#" id="get-event">Crunch</a>
            </div>
        </div>
      </div>
    </div>


<!-- Video-->
<div class="parallax"><video autoplay loop id="video-background" muted plays-inline>
  <source src="images/koncert.mp4" type="video/mp4">
</video>
</div>

</div>



<!--Content-->

<div class="progress">
      <div class="indeterminate"></div>
  </div>


<div id="output" class="container">
  <div class="nodata"></div>
</div>



    <div class="divider"></div>

<footer class="page-footer">
          <div class="footer-copyright">
            <div class="white-text container">
            &#64; 2018 Copyright
            </div>
          </div>
    </footer>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <script src="js/script.js"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDp-6VY-wJJpRRi32-TmBXu6aOUbTJiouQ&callback=initMap">
    </script>




    </body>
  </html>
