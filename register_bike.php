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
 <h2>Register Bike</h2>
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
    <label for="exampleInputEmail1">Manufacturer part number (MPN)</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="mpn" placeholder="MPN Number">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Brand</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="brand" placeholder="Brand Name">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Model</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="model" placeholder="Model">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Type</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="type" placeholder="Bike Type">
  </div> <div class="form-group">
    <label for="exampleInputEmail1">Wheel Size</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="wheel" placeholder="Wheel Size">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Color</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="color" placeholder="Color">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Number of gears</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="gears" placeholder="No. Gears">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Brake Type</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="brake" placeholder="Brake Type">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Suspension</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="suspension" placeholder="Suspension">
  </div>
   <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" id="exampleFormControlSelect1" name="gender">
      <option>Male</option>
      <option>Female</option>
      <option>Unisex</option>
    </select>
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Age Group</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="age" placeholder="Age Group">
  </div>
  <div class="custom-file">
  <input type="file" name="image" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>


</div>
</div>



</div>
</div>
</div>

<footer class="footer-area section-padding">
<!-- Footer -->
<?php include("footer.php"); ?>
</footer>

<?php
if(isset($_POST["submit"])){
	// Make sure user doesnt leave any required fields empty
	if(empty($_POST['mpn']) || empty($_POST['brand']) || empty($_POST['model']) || empty($_POST['type']) || empty($_POST['wheel']) || empty($_POST['color']) || empty($_POST['gears'])
		|| empty($_POST['brake']) || empty($_POST['suspension']) || empty($_POST['gender']) || empty($_POST['age'])){
		 $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> Please Fill out all Required Fields</p>
          </div>
";
	}else{
$mpn = $mysqli->escape_string($_POST['mpn']);
$brand = $mysqli->escape_string($_POST['brand']);
$model = $mysqli->escape_string($_POST['model']);
$type = $mysqli->escape_string($_POST['type']);
$wheel = $mysqli->escape_string($_POST['wheel']);
$color = $mysqli->escape_string($_POST['color']);
$gears = $mysqli->escape_string($_POST['gears']);
$brake = $mysqli->escape_string($_POST['brake']);
$suspension = $mysqli->escape_string($_POST['suspension']);
$gender = $mysqli->escape_string($_POST['gender']);
$age = $mysqli->escape_string($_POST['age']);
$date=  date("Y-m-d H:i:s"); 
//Upload Image
if ($_FILES['image']['tmp_name'] == "")
	{
			$filepath="images/bike.png";
	}
	else
	{
		$filetemp=$_FILES['image']['tmp_name'];
		$filename=$_FILES['image']['name'];
		$filetype=$_FILES['image']['type'];
		$filepath="users/$_SESSION[email]/".$filename;
	    move_uploaded_file($filetemp,$filepath);
	}
	}
	//insert new bike
		$sql="INSERT INTO tb_register_bike (email,mpn,brand,model,type,wheel,color,gears,brake,suspension,
	                          gender,age,image,date)" 
                    . "VALUES ('$_SESSION[email]','$mpn','$brand','$model','$type','$wheel','$color','$gears'
					           ,'$brake','$suspension','$gender','$age','$filepath','$date')";
							   
		$mysqli->query($sql);
       	$_SESSION['message'] = '  <div class="alert alert-success" role="alert">
        <strong>Success!</strong>  We have registered your bike.
        </div>';
		header("location: profile.php");
}
?>


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