<?php
ob_start();
session_start();
// Database connection
include ("config.php");
include("check_login.php");


$sql = "SELECT * FROM tb_register_bike WHERE id='$_GET[bike_id]' and email='$_SESSION[email]' ";
$result = $conn->query($sql);

if(empty($_GET["bike_id"]) || $result->num_rows == 0){
	header("location:404.php");
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
 <h2>Edit Bike</h2>
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
// Search for bike to edit where email=current users and bike ID = URLS bike id		
$sql = "SELECT * FROM tb_register_bike WHERE email='$_SESSION[email]' and id='$_GET[bike_id]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc()
		

?>	
  <div class="form-group">
    <label for="exampleInputEmail1">Manufacturer part number (MPN)</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="mpn" value="<?php echo$row["mpn"]; ?>">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Brand</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="brand" value="<?php echo$row["brand"]; ?>">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Model</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="model" value="<?php echo$row["model"]; ?>">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Type</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="type" value="<?php echo$row["type"]; ?>">
  </div> <div class="form-group">
    <label for="exampleInputEmail1">Wheel Size</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="wheel" value="<?php echo$row["wheel"]; ?>">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Color</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="color" value="<?php echo$row["color"]; ?>">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Number of gears</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="gears" value="<?php echo$row["gears"]; ?>">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Brake Type</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="brake" value="<?php echo$row["brake"]; ?>">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Suspension</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="suspension" value="<?php echo$row["suspension"]; ?>">
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
    <input type="text" class="form-control" id="exampleInputEmail1" name="age" value="<?php echo$row["age"]; ?>">
  </div>
  <div class="custom-file">
  <input type="file" name="image" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
  <input type="hidden" name="notselected"  value="<?php echo$row["image"] ?>">
</div>

<?php } ?>
  <button type="submit" name="submit" class="btn btn-primary">Update</button>
</form>


</div>
</div>


</div>
</div>
</div>

<?php
if(isset($_POST["submit"])){
	//Make sure all required fields are not empty
	if(empty($_POST['mpn']) || empty($_POST['brand']) || empty($_POST['model']) || empty($_POST['type']) || empty($_POST['wheel']) || empty($_POST['color']) || empty($_POST['gears'])
		|| empty($_POST['brake']) || empty($_POST['suspension']) || empty($_POST['gender']) || empty($_POST['age'])){
		 $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> Please Fill out all Required Fields</p>
          </div>
";
header("location:edit_bike?bike_id=$_GET[bike_id]");
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
$notselected = $mysqli->escape_string($_POST['notselected']);
$date=  date("Y-m-d H:i:s"); 

//image upload
if ($_FILES['image']['tmp_name'] == "")
	{
			$filepath=$notselected;
	}
	else
	{
		$filetemp=$_FILES['image']['tmp_name'];
		$filename=$_FILES['image']['name'];
		$filetype=$_FILES['image']['type'];
		$filepath="users/$_SESSION[email]/".$filename;
	    move_uploaded_file($filetemp,$filepath);
	}
	//update bike information
		$sql="Update tb_register_bike SET mpn='$mpn',brand='$brand',model='$model',type='$type',wheel='$wheel',color='$color',gears='$gears',brake='$brake',suspension='$suspension'
		,gender='$gender',age='$age',image='$filepath' WHERE id='$_GET[bike_id]'";
		
							   
		if($mysqli->query($sql)){
       	$_SESSION['message'] = '  <div class="alert alert-success" role="alert">
        <strong>Success!</strong>  We have edited your bike.
        </div>';
		header("location: profile.php");
		}else{
			$_SESSION['message'] = '  <div class="alert alert-danger" role="alert">
        <strong>no!</strong>  We not edited your bike.
        </div>';
		header("location: profile.php");
		}
	}
}
?>

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