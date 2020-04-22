<?php
ob_start();
session_start();
// Database connection
include ("config.php");
include("check_login.php");

//check to see if this report and bike does exsist based on the URL incase someone modifies the URL
$sql = "SELECT * FROM tb_report_bike,tb_register_bike WHERE tb_register_bike.id='$_GET[bike_id]' AND tb_report_bike.report_id = '$_GET[report_id]'";
$result = $conn->query($sql);
//if the URL is modified and the bike and report doesnt exsist in database then reroute to 404 page
if(empty($_GET["report_id"]) || empty($_GET["bike_id"]) || $result->num_rows == 0){
	header("location:pages-404.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Control Panel" name="description" />
        <meta content="Anti Theft" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="#">

        <!-- plugins -->
        <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
 <?php include("topbar.php")?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("left_sidebar.php")?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Bike Theft Report List</h4>
                            </div>
                        </div>
							<?php 
 //if theres error message display
   if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ){
        echo $_SESSION['message'];  
unset( $_SESSION['message'] );		
	}

?>

         
 <div class="row" style="padding:10px">
 <div class="col-xl-12">
<?php
// Get report id from the URL and see if it exsists in database		
$sql = "SELECT * FROM tb_report_bike WHERE report_id=$_GET[report_id] ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc()
		

?>	
                                  <form class="form-inline" style="float:right"  action="" method=POST enctype="multipart/form-data">
								  <a style="margin:5px">Update status to:</a>
								  <?php
								  // Display buttons based on what the current status is		
								  if($row["status"] == 'under investigation' ){
								  ?>
                                            <button style="margin:5px" type="submit" name="resolved" class="btn btn-success">Case Resolved</button>
											<button style="margin:5px" type="submit" name="pending" class="btn btn-info">Pending</button>
								 <?php 
								  }else if($row["status"] == 'resolved' ){
								  ?>
											<button style="margin:5px" type="submit" name="investigation" class="btn btn-info">Under Investigation</button>
											<button style="margin:5px" type="submit" name="pending" class="btn btn-success">Pending</button>
								<?php 
                                  }else if($row["status"] == 'pending' ){
								  ?>
								  <button style="margin:5px" type="submit" name="investigation" class="btn btn-info">Under Investigation</button>
								  <button style="margin:5px" type="submit" name="resolved" class="btn btn-success">Case Resolved</button>
								  <?php
}}
								  ?>
                                        </form>

       </div></div>      

 <?php
// Get bike id from the URL and see if it exsists in database						
$sql = "SELECT * FROM tb_register_bike WHERE id=$_GET[bike_id] ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc()
		

?>	
                        <!-- products -->
                 <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mt-0 mb-0 header-title">Recent Bike Theft</h5>
                               <div class="table-responsive mt-4">
                                            <table class="table table-hover table-nowrap mb-0">
                                                <tbody>
			<tr>
          <th scope="col">Image</th>
            <td><img src="../<?php echo$row["image"] ?>" style="height:70px" ></td>
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
                                        </div> <!-- end table-responsive-->
<?php }?>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
							
							
							<div class="col-xl-8" >
							<div class="card">
                                    <div class="card-body">
<?php
// Get report id from the URL and display location stolen on google maps							
$sql = "SELECT * FROM tb_report_bike WHERE report_id=$_GET[report_id] ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc()
		

?>	

<div class="alert alert-info" role="alert">
 Location reported missing below on the <?php echo$row["date_stolen"] ?>
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
 </div>
 
 
 
                        </div>
                        <!-- end row -->

                

                <!-- Footer Start -->
               <?php include("footer.php")?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

      <?php
if(isset($_POST["resolved"])){
	//Change status based on which button is clicked above this will change status to resolved
	$sql = "UPDATE tb_report_bike SET status='resolved' WHERE report_id='$_GET[report_id]'"; 
       $mysqli->query($sql);
	   $_SESSION['message']=  '  <div class="alert alert-success" role="alert">
            <strong>Success!</strong>  Investigation status successfully updated to resolved.
          </div>
';
	   header("location:details.php?bike_id=$_GET[bike_id]&report_id=$_GET[report_id]");
	   
	   
}
?>	  

<?php
if(isset($_POST["investigation"])){
	//Change status based on which button is clicked above this will change status to under investigation
	$sql = "UPDATE tb_report_bike SET status='under investigation' WHERE report_id='$_GET[report_id]'"; 
       $mysqli->query($sql);
	   $_SESSION['message']=  '  <div class="alert alert-success" role="alert">
            <strong>Success!</strong>  Investigation status successfully updated to under investigation.
          </div>
';
	   header("location:details.php?bike_id=$_GET[bike_id]&report_id=$_GET[report_id]");
	   
	   
}
?>	  

<?php
if(isset($_POST["pending"])){
	//Change status based on which button is clicked above this will change status to pending
	$sql = "UPDATE tb_report_bike SET status='pending' WHERE report_id='$_GET[report_id]'"; 
       $mysqli->query($sql);
	   $_SESSION['message']=  '  <div class="alert alert-success" role="alert">
            <strong>Success!</strong>  Investigation status successfully updated to pending.
          </div>
';
	   header("location:details.php?bike_id=$_GET[bike_id]&report_id=$_GET[report_id]");
	   
	   
}
?>	 
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- optional plugins -->
        <script src="assets/libs/moment/moment.min.js"></script>
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
        <script src="assets/libs/flatpickr/flatpickr.min.js"></script>

        <!-- page js -->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>


    </body>

</html>