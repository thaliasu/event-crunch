<?php
  session_start();
  include 'include/connect.inc.php';
  //if session has expired, redirect to login page
  if(!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
  }

  $userName = $_SESSION['user'];

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
      <style>
      </style>
    </head>

<body>
  <!-- nav bar -->
  <?php include_once 'include/nav.inc.php'; ?>

	<br><br>
  <div class="container row">
  	<div class="col s12 m5 l5 center">
  		<img class="circle z-depth-2" src="images/profile.jpg" alt="profile" width="50%" height="50%">
  	</div>
  	<div class="col s12 m7 l7 center">
  		<h2 id = "profile_welcome">Welcome, <?php echo $_SESSION['first'] . ' ' . $_SESSION['last'] . '!'?></h2>
      <!--form class="center" action="include/logout.inc.php" method="POST">
        <button class="btn waves-effect waves-light" type="submit" name="submit">Log Out</button>
      </form-->
  	</div>
   </div>
	<br><br>
    <div class="container row">
    	<div class="row">
    		<div id="profile-info" class="col s12">
  				<section><h4 class="center-align">Profile Info</h4>
    				<div class="center-align" id="profile_user_error">
              <?php
              if (isset($_SESSION['user_error'])) {
                echo $_SESSION['user_error'];
                unset($_SESSION['user_error']);
              }
              ?>
            <span id = "profile_user_success">
              <?php
              if (isset($_SESSION['user_success'])) {
                echo $_SESSION['user_success'];
                unset($_SESSION['user_success']);
              }
              ?>
            </span>
            </div><br>
            <form action="include/update.inc.php" method="POST">
              <div class="input-field col s12 l6">
        				<h5>First Name</h5>
        				<input placeholder="<?php echo $_SESSION['first']?>" value="<?php echo $_SESSION['first']?>" name="fname" type="text" class="validate" maxlength="20">
              </div>
              <div class="input-field col s12 l6">
                <h5>Last Name</h5>
        				<input placeholder="<?php echo $_SESSION['last']?>" value="<?php echo $_SESSION['last']?>" name="lname" type="text" class="validate" maxlength="20">
              </div>
              <div class="input-field col s12 l6">
        				<h5>Username</h5>
        				<input placeholder="<?php echo $_SESSION['user']?>" value="<?php echo $_SESSION['user']?>" name="uid" type="text" class="validate" maxlength="20">
              </div>
              <div class="input-field col s12 l6">
        				<h5>Password</h5>
        				<input placeholder="<?php echo $_SESSION['pass']?>" value="<?php echo $_SESSION['pass']?>" name="pwd" type="password" class="validate" maxlength="20">
              </div>
              <div class="input-field col s12">
        				<h5>Email</h5>
        				<input placeholder="<?php echo $_SESSION['email']?>" value="<?php echo $_SESSION['email']?>" name="email" type="email" class="validate" maxlength="35">
              </div>
              <div class="input-field col s12 center">
        				<button class="waves-effect waves-light btn" type="submit" id="profile" name="update">save profile changes</button>
              </div>
            </form>
  				</section>
			   </div>
       </div>
       <br>

        <div class="row s12">
        		<h4 class="center-align">Events</h4>
        </div>
      		<div class="row">
        		<?php
        			//for each row in the database make a new card with the info
        			$sql = "SELECT * FROM events WHERE username = '$userName'";
        			$results = mysqli_query($conn, $sql);

        			while ($row = $results->fetch_object()) {
        				echo '<div class="col s12 m4 l4">
        			<section>
           			<br>
        				<div class="card">
        					<div class="card-image waves-effect waves-block waves-light">
        						<img class="activator" src="' . $row->thumbail . '" alt="event image">
        					</div>
        					<div class="card-content">
        						<span class="card-title activator grey-text text-darken-4">' . $row->artist . '<i class="material-icons right">more_vert</i></span>
        						<p class="grey-text text-darken-4">'. $row->date . '</p>
        						<a id="removeEvent">Delete Event</a>
        					</div>
        					<div class="card-reveal">
        						<span class="card-title grey-text text-darken-4">' . $row->artist . '<i class="material-icons right">close</i></span>
        						<p class="grey-text text-darken-4">'. $row->date . '</p>
        						<p class="grey-text text-darken-4">' . $row->venue . '</p>
        						<a  id="removeEvent">Delete Event</a>
        					</div>
        				</div>
        			</section>
        		</div>

    	</div>';
    } if (!$results) {
    	echo "<h1>No saved events</h1>";
    }


    	?>




<!--
		    				echo '<tr>';
		    					echo '<td>' . $row['artist'] . '</td>';
		    					echo '<td>' . $row['thumbail'] . '</td>';
		    				echo '</tr>';

        			}
        			else if(mysqli_num_rows($results) > 1) {

        				while($row = mysqli_fetch_array($results)){
		    				echo '<tr>';
		    					foreach($row as $field) {
		       						echo '<td>' . htmlspecialchars($field['artist']) . '</td>';
		    						echo '<td>' . htmlspecialchars($field['thumbail']) . '</td>';
		    				}

		    				echo '</tr>';
						}

        			}
        			else  {
        				echo "<h1>No data</h1>";
        			} -->





<!--
      //   			if(!empty($results)) {
      //   				while ($row = mysqli_fetch_array($results)) {
		    // 				echo '<tr>';
		    // 				foreach($row as $field) {
		    //     				echo '<td>' . htmlspecialchars($field) . '</td>';
		    // 				}
		    // 				echo '</tr>';
						// }
      //   			} else {
      //   				echo "<h1>No data</h1>";
      //   			}






					mysqli_close($conn);

        		?> -->



        		<!-- <div class="col s12 m4 l4">
        			<section>
           			<br>
        				<div class="card">
        					<div class="card-image waves-effect waves-block waves-light">
        						<img class="activator" src="images/audience.jpg" alt="event image">
        					</div>
        					<div class="card-content">
        						<span class="card-title activator grey-text text-darken-4">Battle Of The Bands<i class="material-icons right">more_vert</i></span>
        						<p class="grey-text text-darken-4">4/21/18</p>
        						<a href="#">Delete Event</a>
        					</div>
        					<div class="card-reveal">
        						<span class="card-title grey-text text-darken-4">Battle of the Bands<i class="material-icons right">close</i></span>
        						<p class="grey-text text-darken-4">4/21/18</p>
        						<p class="grey-text text-darken-4">The Hole In The Wall</p>
        						<p class="grey-text text-darken-4">123 Apple St. Orlando, FL 32817</p>
        						<p class="grey-text text-darken-4">Doors open: 7:00 pm</p>
        						<p class="grey-text text-darken-4">Event starts: 8:00 pm</p>
        						<a href="#">Delete Event</a>
        					</div>
        				</div>
        			</section>
        		</div>

    	</div> -->
    </div>
    <br>

   




	<footer class="page-footer">
	          <div class="footer-copyright">
	            <div class="white-text container">
	             2018 Copyright EventCrunch
	            </div>
	          </div>
    </footer>



    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
