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
<div class="col-xs-12 text">
<div class="page-title">
 <h2>Welcome, <?php echo $_SESSION['full_name']?></h2>
</div>
</div>

<div class="col-xs-12 col-md-12 wow fadeIn" data-wow-delay="0.3s">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Navigate across site</li>
  </ol>
</nav>
 <?php 
 //if theres error message display
   if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ){
        echo $_SESSION['message'];  
unset( $_SESSION['message'] );		
	}

?>
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Change Profile details</h5>
        <center><a href="change_profile.php" class="btn btn-primary">Go</a></center>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Register new bike</h5>
        <center><a href="register_bike.php" class="btn btn-primary">Go</a></center>
      </div>
    </div>
  </div>
    <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Report stolen bike</h5>
        <center><a href="report.php" class="btn btn-primary">Go</a></center>
      </div>
    </div>
  </div>
    <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Change Password</h5>
        <center><a href="change_password.php" class="btn btn-primary">Go</a></center>
      </div>
    </div>
  </div>
</div>


<div class="row">
<div class="col-sm-12" style="margin-top:30px">
<div>
<h4>Registed Bikes</h4>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
	  <th scope="col">Image</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Color</th>
	  <th scope="col">Gears</th>
	  <th scope="col">Suspension</th>
	  <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php
  // Display all users bikes
$sql = "SELECT * FROM tb_register_bike where email='$_SESSION[email]' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
    <tr>
      <th scope="row"><?php echo$row["id"]; ?></th>
	  <td><img src="<?php echo$row["image"]; ?>" style="max-height:60px"></td>
      <td><?php echo$row["brand"]; ?></td>
      <td><?php echo$row["model"]; ?></td>
      <td><?php echo$row["color"]; ?></td>
	  <td><?php echo$row["gears"]; ?></td>
      <td><?php echo$row["suspension"]; ?></td>
      <td><a href="edit_bike.php?bike_id=<?php echo $row["id"]?>"><button type="button" class="btn btn-primary btn-sm">Edit</button></a></td>
    </tr>
<?php }}else{ ?>
	<tr>
	<td COLSPAN=8><center>No bike avaliable to report at the moment </center></td>
	</tr>

<?php } ?>
  </tbody>
</table>
</div>
</div>
</div>



</div>
</div>
</div>

<?php
if(isset($_POST["submit"])){
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
	
		$sql="INSERT INTO tb_register_bike (mpn,brand,model,type,wheel,color,gears,brake,suspension,
	                          gender,age,image,date)" 
                    . "VALUES ('$mpn','$brand','$model','$type','$wheel','$color','$gears'
					           ,'$brake','$suspension','$gender','$age','$filepath','$date')";
							   
		$mysqli->query($sql);
       	$_SESSION['message'] = '  <div class="alert alert-success" role="alert">
        <strong>Success!</strong>  We have registered your bike.
        </div>';
		header("location: profile.php");
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

