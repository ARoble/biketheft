<?php
ob_start();
session_start();
// Database connection
include ("config.php");
include("check_login.php");
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
<link href="css/plugin.css" rel="stylesheet">

<link rel="shortcut icon" type="image/ico" href="#" />

<link href="style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<script src="js/vendor/modernizr-2.8.3.min.js" type="ae3b2284b2280d803af4e1d4-text/javascript"></script>

</head>
<body class="contact-page">


<div class="preloader">
<div class="spinner"></div>
</div>

<header class="header-area">
<!-- Navigation -->
<?php include("navigation.php"); ?>



</header>


<div class="contact-area section-padding">
<div class="container">
<div class="row">
<div class="col-xs-12 text-center">
<div class="page-title">
 <h2>Change Password</h2>
</div>
</div>
<div class="col-xs-12 col-md-3 wow fadeIn" data-wow-delay="0.3s">
</div>
<div class="col-xs-12 col-md-6 wow fadeIn" data-wow-delay="0.3s">
<div class="contact-form">

  <form action="" method=POST enctype="multipart/form-data">
 <?php 
 //if theres error message display
   if( isset($_SESSION['error_message']) AND !empty($_SESSION['error_message']) ){
        echo $_SESSION['error_message'];  
unset( $_SESSION['error_message'] );		
	}

?>
<?php
						
$sql = "SELECT * FROM tb_users WHERE email='$_SESSION[email]' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc()
		

?>	
 <div class="form-group">
    <label for="exampleInputEmail1">Old Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="oldpassword" placeholder="Old Password"  >
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">New Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="newpassword" placeholder="New Password" >
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Confirm New Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="confirmpassword" placeholder="Confirm New Password">
  </div>
<?php }?>

<button name="change"  class="blue-btn btn" style="float:right">Change password</button>
</form>


</div>
</div>

<?php

if(isset($_POST["change"])){
	/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$oldpassword = $mysqli->escape_string($_POST['oldpassword']);
$newpassword = $mysqli->escape_string($_POST['newpassword']);

// Checks current user in database
$result = $mysqli->query("SELECT * FROM tb_users WHERE email='$_SESSION[email]'");

//checks to see if new password and confirm new password are the same
if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 
    $user = $result->fetch_assoc();
//checks to see if old password and the one in database is same
    if ( password_verify($_POST['oldpassword'], $user['password']) ) {
		$new = $mysqli->escape_string(password_hash($_POST['newpassword'], PASSWORD_BCRYPT));
       $sql = "UPDATE tb_users SET password='$new' WHERE email='$_SESSION[email]'"; 
       $mysqli->query($sql);
	   $_SESSION['message']=  '  <div class="alert alert-success" role="alert">
            <strong>Success!</strong>  Password successfully Changed.
          </div>
';
	   header("location:profile.php");
    }
    else {
    $_SESSION['error_message']= '  <div class="alert alert-danger" role="alert">
            <strong>Warning!</strong> Wrong old password
          </div>
';
	  header("location:change_password.php");
    }
}
else {
     $_SESSION['error_message']=  '  <div class="alert alert-danger" role="alert">
            <strong>Warning!</strong>  New passwords dont match.
          </div>
';
	   header("location:change_password.php");
    }

}

?>


<!--div class="col-xs-12 col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.9s">
<address class="address blue-bg">
<div class="single-info">
<a href="#"><span><i class="fa fa-globe"></i></span> www.example.com</a>
</div>
<div class="single-info">
<a href="#"><span><i class="fa fa-envelope"></i></span> <span class="__cf_email__" data-cfemail="b2dbdcd4ddf2d7cad3dfc2ded79cd1dddf">[email&#160;protected]</span></a>
</div>
<div class="single-info">
<a href="#"><span><i class="fa fa-phone"></i></span> +1 800 234 5678</a>
</div>
<div class="social-list text-center">
<a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a>
<a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a>
<a href="#" data-toggle="tooltip" title="Google plus"><i class="fa fa-google-plus"></i></a>
<a href="#" data-toggle="tooltip" title="Linkedin"><i class="fa fa-linkedin"></i></a>
</div>
</address>
<div class="address-title">
<h3>THANKS FOR VISITING OUR WEBSITE!!!</h3>
</div>
</div-->
</div>
</div>
</div>



<footer class="footer-area section-padding" >
<!-- Footer -->
<?php include("footer.php"); ?>
</footer>


<script data-cfasync="false" src="cloudflare-static/email-decode.min.js"></script><script src="js/vendor/jquery.min.js" type="ae3b2284b2280d803af4e1d4-text/javascript"></script>
<script src="js/vendor/bootstrap.min.js" type="ae3b2284b2280d803af4e1d4-text/javascript"></script>

<script src="js/jquery.circlechart.js" type="ae3b2284b2280d803af4e1d4-text/javascript"></script>
<script src="js/owl.carousel.min.js" type="ae3b2284b2280d803af4e1d4-text/javascript"></script>
<script src="js/scrollUp.min.js" type="ae3b2284b2280d803af4e1d4-text/javascript"></script>
<script src="js/plugin.js" type="ae3b2284b2280d803af4e1d4-text/javascript"></script>
<script src="js/contact-form.js" type="ae3b2284b2280d803af4e1d4-text/javascript"></script>

<script src="js/main.js" type="ae3b2284b2280d803af4e1d4-text/javascript"></script>
<script src="cloudflare-static/rocket-loader.min.js" data-cf-settings="ae3b2284b2280d803af4e1d4-|49" defer=""></script></body>


</html>