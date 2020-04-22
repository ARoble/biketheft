<?php
ob_start();
session_start();
// Database connection
include ("config.php");

?>
<!doctype html>

<html class="no-js" lang="zxx">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="" />
<meta name="keywords" content="Anti Theft" />
<meta name="author" content="Anti Theft" />

<title>Anti Bike Theft System</title>

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="touchTouch/touchTouch.css">
<link href="css/plugin.css" rel="stylesheet">

<link rel="shortcut icon" type="image/ico" href="#" />

<link href="style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<script src="js/vendor/modernizr-2.8.3.min.js" type="150a513f95f909052537b966-text/javascript"></script>

</head>
<body>

<header class="header-area">
<!-- Navigation -->
<?php include("navigation.php"); ?>

<div class="header-text-area">
<div class="header-text text-center">
<div class="header-text">
<div class="header-bg header-bg-1"></div>
<div class="header-single-text">
<h1>Report your bike theft <br />today</h1>
<?php if(!isset($_SESSION['logged_in'])){ ?>
<a href="register.php" class="btn default-button blue-btn" title="Register">Register</a>
<a href="login.php" class="btn default-button blue-btn" title="Login">Login</a>
<?php } ?>
</div>
</div>
</div>
</div>

</header>


<section class="about-area section-padding">
<div class="container">
<div class="row  wow fadeIn">
<div class="col-xs-12 text-center">
<div class="page-title">
<h2>Was your bike stolen?</h2>
 </div>
</div>
<div class="col-xs-12 col-sm-4 wow fadeInLeft" data-wow-delay="0.6s">
<div class="about-image">
<img src="images/crime.png" alt="">
</div>
</div>
<div class="col-xs-12 col-sm-8 wow fadeInRight" data-wow-delay="0.6s">
<div class="about-text">
<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque congue imperdiet quam, ac rutrum dui porta at. Morbi posuere mi vitae ultricies tempor. Praesent eget urna a magna ornare bibendum a id ligula. Nullam fermen ipsum imperdiet laoreet pretium. Donec quis leo augue. </p>
<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultric posuere cubilia Curae; Integer ac elit et elit malesuada int eget nec est. Pellentesque euismod dui purus, ac consequat nisl volutpat eu.</p>
<p>In nec semper nibh, in placerat ipsum. Nullam tempus gravida mi, et pellentesque arcu finibus id. Vivamus ut nibh vel le convallis lacinia id a nisi. Cras sit amet aliquam mi.</p>
<p>Fusce a fermentum velit. Vestibulum porttitor justo eget orci faucibus, sed ornare ligula volutpat. Phasellus in lectus el, mollis ante sed, pharetra nibh. Mauris iaculis ex vel iaculis tempor.</p>
<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
</div>
</div>
</div>
</div>
</section>





<section class="service-area section-padding text-center">
<div class="container">
<div class="row">
<div class="col-xs-12 text-center">
<div class="page-title">
<h2>How you can prevent youe bike being stolen</h2>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.3s">
<div class="single-service">
<div class="serivce-icon">
<i class="fa fa-balance-scale"></i>
</div>
<h3>Court</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
<div class="single-service">
<div class="serivce-icon">
<i class="fa fa-automobile"></i>
</div>
<h3>Police</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.9s">
<div class="single-service">
<div class="serivce-icon">
<i class="fa fa-expeditedssl"></i>
</div>
<h3>Lock</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="1.2s">
<div class="single-service">
<div class="serivce-icon">
<i class="fa fa-fa"></i>
</div>
<h3>Position</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
</div>
</div>
</div>
</section>


<section class="videos-area section-padding blue-bg">
<div class="container">
<div class="row">
<div class="col-xs-12 text-center">
<div class="page-title">
<h2>How we track your bike</h2>
</div>
</div>
<div class="col-xs-12 col-sm-6  wow fadeIn" data-wow-delay="0.6s">
<div class="video-text">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut aliquet augue. Cras eget tincidunt massa. Maecenas nisi metus, vehicula id vestibulum quis, aliquet a sapien. Cras aliquet mauris ut ultrices luctus.</p>
<p>Pellentesque fringilla sagittis nibh, et lacinia diam euismod bibendum. Quisque sit amet massa sem. Aenean id viverra lacus, sed tincidunt est. In et lacus condimentum magna tristique volutpat ac vitae velit. </p>
<p>Pellentesque varius et justo quis tempus. Nunc elementum ligula et tellus congue, et interdum risus iaculis. Vivamus scelerisque mi sollicitudin, fermentum risus et, porttitor ex. Donec blandit leo pulvinar condimentum ultricies. </p>
</div>
</div>
<div class="col-xs-12 col-sm-6  wow fadeIn" data-wow-delay="0.6s">
<div class="video-item video-overlay embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src=""></iframe>
</div>
</div>
</div>
</div>
</section>


<section class="newslatter-area section-padding text-center">
<div class="container">
<div class="row">
<div class="col-xs-12 text-center">
<div class="page-title">
<h2>Newsletter</h2>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2  wow fadeIn" data-wow-delay="0.6s">
<div class="newslatter">
 <div class="newslatter-text">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla laoreet dapibus felis sit amet consequat. Nulla nec sodales nibh. Phasellus vehicula ante sed dictum varius. Sed ullamcorper augue.</p>
</div>

<div class="subscribe-form">
<form action="#">
<input type="email" placeholder="Your Email Here...">
<input type="submit" class="btn red-btn" value="Subscribe" title="subscribe">
</form>
</div>

</div>
</div>
</div>
</div>
</section>


<footer class="footer-area section-padding">
<!-- Footer -->
<?php include("footer.php"); ?>
</footer>


<script data-cfasync="false" src="cloudflare-static/email-decode.min.js"></script><script src="js/vendor/jquery.min.js" type="150a513f95f909052537b966-text/javascript"></script>
<script src="js/vendor/bootstrap.min.js" type="150a513f95f909052537b966-text/javascript"></script>

<script src="js/jquery.circlechart.js" type="150a513f95f909052537b966-text/javascript"></script>
<script src="js/owl.carousel.min.js" type="150a513f95f909052537b966-text/javascript"></script>
<script src="touchTouch/touchTouch.jquery.js" type="150a513f95f909052537b966-text/javascript"></script>
<script src="js/scrollUp.min.js" type="150a513f95f909052537b966-text/javascript"></script>
<script src="js/plugin.js" type="150a513f95f909052537b966-text/javascript"></script>

<script src="js/main.js" type="150a513f95f909052537b966-text/javascript"></script>
<script src="cloudflare-static/rocket-loader.min.js" data-cf-settings="150a513f95f909052537b966-|49" defer=""></script></body>

</html>