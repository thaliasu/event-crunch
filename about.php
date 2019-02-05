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
      <style>
      	.parallax img {
      		height: auto;
      		width: 100%;
      	}
      	.parallax-container {
      		min-height: 500px;
      	}
      	.card p {
      		color: black;
      	}
      	h4 {
      		font-family: 'Nobile', sans-serif
      		font-size: 70px;
      	}

        @media only screen and (max-width : 992px) {
        .parallax-container .section {
            position: absolute;
            top: 40%;
        }
            #index-banner .section {
            top: 10%;
            }
        }

        @media only screen and (max-width : 600px) {
            #index-banner .section {
                top: 0;
            }
        }


      </style>
    </head>

<body>
  <!-- nav bar -->
  <?php include_once 'include/nav.inc.php'; ?>

		<!-- About Us Section -->

	   <!--<div class="container row">
	   	<h5>About Us</h5>
	   </div>-->


		 <div class="parallax-container">
                <div class="container row">
                </div>
                <div class="parallax"><img src="images/music.jpg"></div>

            </div>
            <br>
            <br>
            <br>

		<div class="container row">
                <div class="row">
                    	<h3 class="center">About Us</h3>
                </div>
                <div class="row">
                    <p class="flow-text">Input the band and city you want and will give you the details and map out your destination. At EventCrunch we strive to give you the most up to date information. Visit our contact page for any questions or concerns you may have. You can also scroll down to meet the team that created EventCrunch. </p>
                </div>
            </div>

           <div class="container row">
            <div class="divider"></div>
            </div>
            <br>
            <br>
           <div class="container row">
                <div class="row">
                  <h4 class="section-header white-text">Our Team</h4>
                  <div class="card-container">

					<div class="col s12 m4">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="images/quinten.jpg">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Quinten O'Neal<i class="material-icons right">more_vert</i></span>

			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4">Quinten O'Neal<i class="material-icons right">close</i></span>
			      <p>I'm a web designer and developer based in Orlando, Florida. As both a musician and a web developer I embrace the importance of being a content creator.</p>
			    </div>
			</div>
		</div>




				<div class="col s12 m4">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="images/nicole.jpg">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Nicole Bitner<i class="material-icons right">more_vert</i></span>

			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4">Nicole Bitner<i class="material-icons right">close</i></span>
			      <p>I'm a web design student at the University of Central Florida who loves learning new things. I also enjoy photography, reading, fighting (krav Maga) and hammoking in my spare time. </p>
			    </div>
			</div>
		</div>



				<div class="col s12 m4">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="images/thalia1.jpg">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Thalia Su<i class="material-icons right">more_vert</i></span>

			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4">Thalia Su<i class="material-icons right">close</i></span>
			      <p>I'm a senior web design student at the University of Central Florida and my specialties lie in front-end web design and creating digital graphics. In my spare time you can find me fencing or drawing anime. </p>
			    </div>
			</div>
		</div>


	<br>

	<br>


				<div class="col s12 m4">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="images/tanisha.jpg">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Tanisha Calixte<i class="material-icons right">more_vert</i></span>

			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4">Tanisha Calixte<i class="material-icons right">close</i></span>
			      <p>I am a senior at the University of Central Florida, studying web design. I plan on graduating in the Fall of 2018. I do front end web development and also do graphic design.</p>
			    </div>
			</div>
		</div>




				<div class="col s12 m4">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="images/max1.png">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Max Armstrong<i class="material-icons right">more_vert</i></span>

			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4">Max Armstrong<i class="material-icons right">close</i></span>
			      <p>I am a web developer based in Orlando, Florida. I'm currently a student at the University of Central Florida. When I'm not working on websites you can find me fencing or working on video game projects.</p>
			    </div>
			</div>
		</div>




				<div class="col s12 m4">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="images/suhany1.jpg">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Suhany Granda-Ruiz<i class="material-icons right">more_vert</i></span>

			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4">Suhany Granda-Ruiz<i class="material-icons right">close</i></span>
			      <p>I'm a web design student who's passionate about creating clean and elegant designs. I like to spend time traveling, taking photos and going to the beach. I would love to share my art to other people and get inspired by other artists.</p>
			    </div>
			</div>
		</div>



	<br>

			<div class="row">
				<div class="col s12 m4">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="images/nicholas.jpg">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Nicholas Vo<i class="material-icons right">more_vert</i></span>

			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4">Nicholas Vo<i class="material-icons right">close</i></span>
			      <p>I am a senior web design student at the University of Central Florida who is passionate about design and music.</p>
			    </div>
			</div>
		</div>
	</div>


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
