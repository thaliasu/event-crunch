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
      	h5 {
      		color: white;
      		font-family: times new roman;
      		font-size: 40px;
      	}
          .parallax img {
      		height: auto;
      		width: 100%;
      	}
      	.parallax-container {
      		min-height: 500px;
      	}
      	.row:after {
		    content: "";
		    display: table;
		    clear: both;
		}
		.column {
		    float: left;
		    width: 33.33%;
		    padding: 10px;
		    height: 300px;
		}
		section {
		  float: left;
		  margin: 0 1.5%;
		  width: 30%;
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


<div class="parallax-container">
                <div class="container row">
                </div>
                <div class="parallax"><img src="images/img6.jpg"></div>

            </div>

   <div class="container row">
   	<h3 class="center">Contact Us</h3>
   </div>

    <div class="container row">
    	<div class="row">
    		<div class="column1">
    			<section><p>Front-End Designers</p>
    			<br>
    			<p>Nicole Bitner</p>
    			<p>123-4567</p>
    			<p>nb65@gmail.com</p>

    			<br>
    			<p>Tanisha Calixte</p>
    			<p>768-9943</p>
    			<p>tc456@yahoo.com</p>


    			<br>
    			<p>Suhany Granda-Ruiz</p>
    			<p>449-3345</p>
    			<p>sgr19@yahoo.com</p></section>


    		</div>
    		<div class="column2">
    			<section><p>Back-End Developers</p>
    			<br>
    			<p>Quinten O'Neal</p>
    			<p>555-9945</p>
    			<p>qon5@gmail.com</p>


    			<br>
    			<p>Thalia Su</p>
    			<p>876-0067</p>
    			<p>ts483@gmail.com</p>


    			<br>
    			<p>Max Armstrong</p>
    			<p>344-0087</p>
    			<p>ma34@gmail.com</p>
    			</section>

    		</div>
    		<div class="column3">
    			<section><p>Miscellaneous</p>
    			<br>
    			<p>EventCrunch Email: eventcrunch@yahoo.com</p>
    			<p>EventCrunch Phone: 555-9978</p>


    			</section>
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
