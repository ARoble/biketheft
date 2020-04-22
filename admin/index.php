<?php
ob_start();
session_start();
// Database connection

include ("config.php");


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
                                <h4 class="mb-1 mt-0">Dashboard</h4>
                            </div>
                        </div>

                        <!-- content -->
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Stolen Bikes</span>
                                                <h2 class="mb-0"><?php  
$sql="SELECT * FROM tb_report_bike  ";

if ($result=$conn->query($sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf($rowcount);
  // Free result set
  mysqli_free_result($result);
  }


?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Resolved Investigations</span>
                                                <h2 class="mb-0"><?php  
$sql="SELECT * FROM tb_report_bike WHERE status='resolved'  ";

if ($result=$conn->query($sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf($rowcount);
  // Free result set
  mysqli_free_result($result);
  }


?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Ongoing Investigations</span>
                                                <h2 class="mb-0"><?php  
$sql="SELECT * FROM tb_report_bike WHERE status='under investigation'  ";

if ($result=$conn->query($sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf($rowcount);
  // Free result set
  mysqli_free_result($result);
  }


?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Users</span>
                                                <h2 class="mb-0"><?php  
$sql="SELECT * FROM tb_users  ";

if ($result=$conn->query($sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf($rowcount);
  // Free result set
  mysqli_free_result($result);
  }


?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

               
                
                        <!-- products -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mt-0 mb-0 header-title">Recent Bike Theft</h5>

                                        <div class="table-responsive mt-4">
                                            <table class="table table-hover table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Location Stolen</th>
                                                        <th scope="col">Bike Brand</th>
                                                        <th scope="col">Reported Date</th>
														<th scope="col">View</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												  <?php
$sql = "SELECT * FROM tb_register_bike,tb_report_bike where tb_register_bike.email= tb_report_bike.user_email AND tb_register_bike.id=tb_report_bike.bike_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
                                                    <tr>
                                                        <td>#<?php echo$row["report_id"]; ?></td>
                                                        <td><?php echo$row["location"]; ?></td>
                                                        <td><?php echo$row["brand"]; ?></td>
                                                        <td><?php echo$row["reported_date"]; ?></td>
															<td><a href="details.php?bike_id=<?php echo$row["id"]; ?>&report_id=<?php echo$row["report_id"]; ?>"><button type="submit" class="btn btn-primary">View</button></a></td>
                                                    </tr>
<?php }}else{ ?>
<td COLSPAN=5><center>None Found</center></td>
<?php } ?>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                   <!-- products -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mt-0 mb-0 header-title">Matches Online</h5>

                                        <div class="table-responsive mt-4">
                                            <table class="table table-hover table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Location Stolen</th>
                                                        <th scope="col">Bike Brand</th>
                                                        <th scope="col">Reported Date</th>
                                                        <th scope="col">Status</th>
														<th scope="col">Update</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												  
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
														<td></td>
															<td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
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