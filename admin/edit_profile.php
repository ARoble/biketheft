<?php
ob_start();
session_start();
// Database connection
include ("config.php");
include("check_login.php");

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
                                <h4 class="mb-1 mt-0">Edit Profile</h4>
                            </div>
                        </div>


               
                
                        <!-- products -->
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
									<?php 
 //if theres error message display
   if( isset($_SESSION['error_message']) AND !empty($_SESSION['error_message']) ){
        echo $_SESSION['error_message'];  
unset( $_SESSION['error_message'] );		
	}

?><?php
						
$sql = "SELECT * FROM tb_admin WHERE email='$_SESSION[email]' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc()
		

?>	
									<form action=""  method=POST enctype="multipart/form-data">
										<br>
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Full name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name" name="full_name" value="<?php echo$row["full_name"] ?>">
                                            </div>
											<div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address" name="email" value="<?php echo$row["email"] ?>" readonly disabled>
                                            </div>
											<div class="form-group">
                                                <label for="exampleInputEmail1">Badge Number</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Badge Number" name="badge_no" value="<?php echo$row["badge_no"] ?>">
                                            </div>
											<button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
											</form>
<?php } ?>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                <?php
				if(isset($_POST["submit"])){
					if( empty($_POST['full_name']) || empty($_POST['badge_no']) ){
	 $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> Please Fill out all Required Fields</p>
          </div>
";
header("location:edit_profile.php");
}else{
	$full_name = $mysqli->escape_string($_POST['full_name']);
	$badge_no = $mysqli->escape_string($_POST['badge_no']);
	//update user 
	$sql="UPDATE tb_admin SET full_name='$full_name', badge_no='$badge_no' WHERE email='$_SESSION[email]'";
	
		 if ( $mysqli->query($sql) ){
			 //update sessions
$_SESSION['admin_full_name'] = $full_name;
$_SESSION['badge_no'] = $badge_no;
 $_SESSION['error_message'] = '  <div class="alert alert-success" role="alert">
            <strong>Success!</strong>  We have updated your profile.
          </div>
';
	 header("location: edit_profile.php");
} 
else{
	  $_SESSION['error_message'] = '  <div class="alert alert-danger" role="alert">
            <strong>Ooops!</strong> There seems to be an error while updating your profile.
          </div>
';
	 header("location: edit_profile.php");
	 
	 
}
}

				}
				?>

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