<?php
ob_start();
session_start();
// Database connection
include ("config.php");
include("check_login.php");


// make sure the report exsists in database which belongs to current user
$sql = "SELECT * FROM tb_report_bike WHERE report_id='$_GET[report_id]' and user_email='$_SESSION[email]' ";
$result = $conn->query($sql);

if(empty($_GET["report_id"]) || $result->num_rows == 0){
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
 <h2>More Information on stolen bike</h2>
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
// display report where report ID = URL report ID and email = Current user
$sql = "SELECT * FROM tb_report_bike WHERE report_id='$_GET[report_id]' AND user_email='$_SESSION[email]' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc()
		

?>	
  <div class="form-group">
    <label for="exampleInputEmail1">Date Stolen</label>
	<input type="date" class="form-control" name="date" value="<?php echo$row["date_stolen"] ?>">
  </div>
 

   <div class="form-group">
    <label for="exampleInputEmail1">Choose Location Where its was stolen</label>
	<input id="pac-input" class="controls" type="text"
                    placeholder="Enter a location">
                <div id="type-selector" class="controls">
                  <input type="radio" name="type" id="changetype-all" checked="checked">
                  <label for="changetype-all">All</label>
                </div>
   <div id="map" style="height: 300px;width: 540px"></div>
                <br>
                <input type="hidden" name="lat" id="lat" value="<?php echo$row["lat"] ?>">
                <input type="hidden" name="lng" id="lng" value="<?php echo$row["lng"] ?>">
                <input type="hidden" name="location" id="location" value="<?php echo$row["location"] ?>">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Any additional information</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="info" placeholder="More Info"><?php echo$row["info"] ?></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit Report</button>
</form>

<?php } ?>
</div>
</div>
<?php
    if(isset($_POST['submit']))
    {
		//uncomment block below when google maps API is done
		/*
		$date = $mysqli->escape_string($_POST['date']);
		$info = $mysqli->escape_string($_POST['info']);
		$lat = $mysqli->escape_string($_POST['lat']);
		$lng = $mysqli->escape_string($_POST['lng']);
		$location = $mysqli->escape_string($_POST['location']);
		*/
		
		//use this till above is done. comment when API is ready
		$date = $mysqli->escape_string($_POST['date']);
		$info = $mysqli->escape_string($_POST['info']);
		$lat = "51.5523875";
		$lng = "-0.2783909";
		$location = " 28 Tudor Ct N Wembley, England";
		
		// Update
		$sql="UPDATE tb_report_bike SET date_stolen='$date',location='$location',lat='$lat',lng='$lng',info='$info' WHERE report_id='$_GET[report_id]'";
		
		
        if($mysqli->query($sql)){
       	$_SESSION['message'] = '  <div class="alert alert-success" role="alert">
        <strong>Sucess!</strong> You have sucessfully updated the report your stolen bike.
        </div>';
		header("location: reported_bikes.php");
		}else{
		$_SESSION['message'] = '  <div class="alert alert-danger" role="alert">
        <strong>Ooops!</strong> unsucessfully in updating the report your stolen bike.
        </div>';
		header("location: report.php");
		}
    }
?>


</div>
</div>
</div>

<?php
if(isset($_POST["submit"])){

}
?>

<footer class="footer-area section-padding">
<!-- Footer -->
<?php include("footer.php"); ?>
</footer>

 <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">


      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {
            lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();

          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
var item_Lat =place.geometry.location.lat()
var item_Lng= place.geometry.location.lng()
var item_Location = place.formatted_address;
//alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"_____Location="+item_Location);
        $("#lat").val(item_Lat);
        $("#lng").val(item_Lng);
        $("#location").val(item_Location);
          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXt0vSn81Gtzwgk3Ul_DfFs4gj_NROCZs&libraries=places&callback=initMap"
        async defer></script>

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

  <style>
    
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
    </style>