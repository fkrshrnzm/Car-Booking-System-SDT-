<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KarHub</title>
<!--
Holiday Template
http://www.templatemo.com/tm-475-holiday
-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
  <link href="css/flexslider.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


<style>
	.center {
  padding: 70px 0;
  text-align: center;
}
	</style>

  </head>

  

  <body class="tm-gray-bg">
  <?php include 'headermain.php'; ?>
  	<!-- Header -->
	
	<!-- Banner -->
	<section class="tm-banner">
		<!-- Flexslider -->
		<div class="flexslider flexslider-banner">
		  <ul class="slides">
		  <li>
				<img src="about.jpg" alt="Image" />	
		  </li>
		  </ul>
		</div>	
	</section>

    <section class="tm-black-bg section-padding-bottom">
		<div class="container">

		<div>
		<div class="center">
  		<br>
  		<h2 class="text-light" style="font-size:40px">About <strong class="text-light">KAR</strong><strong class="text-warning">HUB</strong></h2>
        <p class="text-light">Welcome to KarHub, where we make car rental seamless and convenient. With our user-friendly platform, you can book a car from the comfort of your own home. At KarHub, we understand the importance of reliable and efficient transportation. That's why we've created a car rental platform that offers a wide range of vehicles to choose from. We're proud to be the go-to choice for travelers and car rental needs. With KarHub, you can expect excellent customer service, competitive prices, and a hassle-free booking experience. Our mission at KarHub is to provide a seamless and affordable car rental solution. From city trips to road trips, we have the perfect vehicle for every journey. Join the thousands of satisfied customers who have chosen KarHub for their car rental needs. Book with us today and see why we're the preferred choice for travelers everywhere.<p>
  		<br>
  		<a class="btn btn-warning btn-lg" href="register.php">Register Here</a>
		</div>
		</div>


		</div>
	</section>


<?php include 'footer.php'; ?>

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
  <script type="text/javascript" src="js/moment.js"></script>							<!-- moment.js -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>					<!-- bootstrap js -->
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>	<!-- bootstrap date time picker js, http://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<!--
<script src="js/froogaloop.js"></script>
<script src="js/jquery.fitvid.js"></script>
-->
   <script type="text/javascript" src="js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
<script>
    // HTML document is loaded. DOM is ready.
    $(function() {

        $('#hotelCarTabs a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        })

        $('.date').datetimepicker({
            format: 'MM/DD/YYYY'
        });
        $('.date-time').datetimepicker();

        // https://css-tricks.com/snippets/jquery/smooth-scrolling/
          $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
          });
    });
    
    // Load Flexslider when everything is loaded.
    $(window).load(function() {	  		
        // Vimeo API nonsense

/*
          var player = document.getElementById('player_1');
          $f(player).addEvent('ready', ready);
         
          function addEvent(element, eventName, callback) {
            if (element.addEventListener) {
              element.addEventListener(eventName, callback, false)
            } else {
              element.attachEvent(eventName, callback, false);
            }
          }
         
          function ready(player_id) {
            var froogaloop = $f(player_id);
            froogaloop.addEvent('play', function(data) {
              $('.flexslider').flexslider("pause");
            });
            froogaloop.addEvent('pause', function(data) {
              $('.flexslider').flexslider("play");
            });
          }
*/

         
         
          // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
/*

          $(".flexslider")
            .fitVids()
            .flexslider({
              animation: "slide",
              useCSS: false,
              animationLoop: false,
              smoothHeight: true,
              controlNav: false,
              before: function(slider){
                $f(player).api('pause');
              }
          });
*/


          

//	For images only
        $('.flexslider').flexslider({
            controlNav: false
        });


      });
</script>
</body>
</html>