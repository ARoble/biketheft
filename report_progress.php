<?php
ob_start();
session_start();
// Database connection
include ("config.php");
include("check_login.php");

//Check to see if thsi report belongs to this user if it does user can view else redirect

$sql = "SELECT * FROM tb_report_bike,tb_register_bike WHERE tb_register_bike.id='$_GET[bike_id]' AND tb_report_bike.report_id = '$_GET[report_id]' 
AND tb_register_bike.email='$_SESSION[email]' AND tb_report_bike.user_email='$_SESSION[email]' ";
$result = $conn->query($sql);

if(empty($_GET["report_id"]) || empty($_GET["bike_id"]) || $result->num_rows == 0){
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
<div class="col-xs-6 text">
<div class="page-title">
 <h2>Report on stolen bike</h2>
</div>
</div>

<div class="col-xs-6 text-center">
<div class="page-title">

</div>
</div>
</div>
<div class="row">
<div class="col-xs-4" >

<?php
			// Display bike info where bike_id = URL bike id			
$sql = "SELECT * FROM tb_register_bike WHERE id=$_GET[bike_id] ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc()
		

?>	
<table class="table table-striped">
    <tbody>
        <tr>
          <th scope="col">Image</th>
            <td><img src="<?php echo$row["image"] ?>" style="height:70px" ></td>
        </tr>
        <tr>
          <th scope="col">MPN</th>
            <td><?php echo$row["mpn"] ?></td>
        </tr>
        <tr>
          <th scope="col">Brand</th>
            <td><?php echo$row["brand"] ?></td>
        </tr>
        <tr>
          <th scope="col">Model</th>
            <td><?php echo$row["model"] ?></td>
        </tr>
		<tr>
          <th scope="col">Type</th>
            <td><?php echo$row["type"] ?></td>
        </tr>
		<tr>
          <th scope="col">Wheel</th>
            <td><?php echo$row["wheel"] ?></td>
        </tr>
		<tr>
          <th scope="col">Color</th>
            <td><?php echo$row["color"] ?></td>
        </tr>
		<tr>
          <th scope="col">Gears</th>
            <td><?php echo$row["gears"] ?></td>
        </tr>
		<tr>
          <th scope="col">Brake</th>
            <td><?php echo$row["brake"] ?></td>
        </tr><tr>
          <th scope="col">Suspension</th>
            <td><?php echo$row["suspension"] ?></td>
        </tr>
		<tr>
          <th scope="col">Gender</th>
            <td><?php echo$row["gender"] ?></td>
        </tr>
		<tr>
          <th scope="col">Age</th>
            <td><?php echo$row["age"] ?></td>
        </tr>
    </tbody>
</table>
<?php } ?>

</div>

<div class="col-xs-8" >
<?php
// Display report details where report ID = URL report ID
$sql = "SELECT * FROM tb_report_bike WHERE report_id=$_GET[report_id] ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc()
		

?>	
<div class="alert alert-info" role="alert">
 Location reported missing below on the <?php echo$row["date_stolen"] ?><br>
 Investigation Status: <b><?php echo$row["status"] ?></b>
</div>
<iframe 
  width="100%" 
  height="400px" 
  frameborder="0" 
  scrolling="no" 
  marginheight="0" 
  marginwidth="0" 
  src="https://maps.google.com/maps?q=<?php echo$row["lat"] ?>,<?php echo$row["lng"] ?>&hl=es&z=14&amp;output=embed"
 >
 </iframe>
<?php }?>
 </div>
</div>
<div class="row">
<div class="col-xs-6" style="padding-bottom:30px">
<h4>Your report information</h4>
<?php echo$row["info"] ?>
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

