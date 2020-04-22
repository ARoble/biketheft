<?php
ob_start();
session_start();
// Database connection
include ("config.php");

if(isset($_SESSION['logged_in'])){
	
	header("location:profile.php");
}


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
 <h2>Register</h2>
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
 <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="full_name" placeholder="Full Name">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Password">
  </div>

<button name="register"  class="blue-btn btn" style="float:right">Register</button>
</form>


</div>
</div>

<?php

if(isset($_POST["register"])){
	// if user doesnt fill out all required feilds
	if( empty($_POST['full_name']) || empty($_POST['email']) || empty($_POST['password'])){
	 $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> Please Fill out all Required Fields</p>
          </div>
";
header("location:register.php");
}else{
	//Register user to database
$full_name = $mysqli->escape_string($_POST['full_name']);
$email = $mysqli->escape_string($_POST['email']);
$user_type = 'public';
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM tb_users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ($result->num_rows > 0 ) {
  
     $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> Seems like <span>$email</span>"
        . " is already taken!</p>
          </div>
";
header("location:register.php");


}else{ // Email doesn't already exist in a database, proceed...
	//Check to see if email entered is an valid email format
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> Please check your email <strong>$email</strong>"
        . " This is not an Email Format!</p>
          </div>
";
header("location:register.php");


}else{
	// Add new user to database
	$date = date('Y-m-d H:i:s');
	// ID is autoincrement no need to add here 
    $sql = "INSERT INTO tb_users (full_name,email,user_type,password,hash,date) " 
            . "VALUES ('$full_name','$email','$user_type','$password', '$hash','$date')";
			 if ($mysqli->query($sql) ){
				 //make directory for user to update his/hers images 
			 mkdir("users/$email");
 $_SESSION['logged_in'] = true; // So we know the user has logged in 
 $_SESSION['email'] = $_POST['email'];
$_SESSION['full_name'] = $_POST['full_name'];
$_SESSION['user_type'] =  'public';
        header("location: index.php"); 
			 } else {
           $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> there seems to be a problem. Try Again.";
header("location: register.php");
    }

}
}
}
}

?>


</div>
</div>
</div>



<footer class="footer-area section-padding">
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