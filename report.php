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
<div class="col-xs-6 text">
<div class="page-title">
 <h2>Report Stolen Bike</h2>
</div>
</div>
<div class="col-xs-3 text-center">
<div class="page-title">
<a href="reported_bikes.php"><button type="button" class="btn btn-primary">Investigation Progress</button></a>
</div>
</div>
<div class="col-xs-3 text-center">
<div class="page-title">
<a href="register_bike.php"><button type="button" class="btn btn-primary">Register New Bike</button></a>
</div>
</div>
<div class="col-xs-12 col-md-12 wow fadeIn" data-wow-delay="0.3s">

<div class="alert alert-info" role="alert">
 You can only report a previously registered bike and a not reported bike
</div>
 <?php 
 //if theres error message display
   if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ){
        echo $_SESSION['message'];  
unset( $_SESSION['message'] );		
	}

?>
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
	  <th scope="col">Report Stolen</th>
    </tr>
  </thead>
  <tbody>
  <?php
  //List all bikes that have not been reported that is owned by current user
$sql = "SELECT * FROM tb_register_bike,tb_report_bike where tb_register_bike.email='$_SESSION[email]' AND tb_report_bike.user_email = '$_SESSION[email]' AND tb_register_bike.id <> tb_report_bike.bike_id";
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
      <td><a href="report_details.php?bike_id=<?php echo $row["id"]?>"><button type="button" class="btn btn-primary btn-sm">Report</button></a></td>
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

