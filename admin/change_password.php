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
                                <h4 class="mb-1 mt-0">Change Password</h4>
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

?>
									<form action=""  method=POST enctype="multipart/form-data">
										<br>
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Old Password</label>
                                                <input type="password" class="form-control" placeholder="Old Password" name="oldpassword" >
                                            </div>
											<div class="form-group">
                                                <label for="exampleInputEmail1">New Passowrd</label>
                                                <input type="password" class="form-control"  placeholder="New Password" name="newpassword" >
                                            </div>
											<div class="form-group">
                                                <label for="exampleInputEmail1">Confirm New Password</label>
                                                <input type="password" class="form-control"  placeholder="Confirm New Password" name="confirmpassword" >
                                            </div>
											<button type="submit" name="submit" class="btn btn-primary">Change Password</button>
											</form>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                <?php
				if(isset($_POST["submit"])){
						/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$oldpassword = $mysqli->escape_string($_POST['oldpassword']);
$newpassword = $mysqli->escape_string($_POST['newpassword']);

// Search for user with this current login details
$result = $mysqli->query("SELECT * FROM tb_admin WHERE email='$_SESSION[email]'");

//check to see if the new password and confirm new password both match
if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 
    $user = $result->fetch_assoc();
// verify if the old password is correct
    if ( password_verify($_POST['oldpassword'], $user['password']) ) {
		$new = $mysqli->escape_string(password_hash($_POST['newpassword'], PASSWORD_BCRYPT));
       $sql = "UPDATE tb_admin SET password='$new' WHERE email='$_SESSION[email]'"; 
       $mysqli->query($sql);
	   $_SESSION['error_message']=  '  <div class="alert alert-success" role="alert">
            <strong>Success!</strong>  Password successfully Changed.
          </div>
';
	   header("location:change_password.php");
    }
    else {
    $_SESSION['error_message']= '  <div class="alert alert-danger" role="alert">
            <strong>Warning!</strong> Wrong old password
          </div>
';
	  header("location:change_password.php");
    }
}
else {
     $_SESSION['error_message']=  '  <div class="alert alert-danger" role="alert">
            <strong>Warning!</strong>  New passwords dont match.
          </div>
';
	   header("location:change_password.php");
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