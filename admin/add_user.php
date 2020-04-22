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
                                <h4 class="mb-1 mt-0">User List</h4>
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
                                                <label for="exampleInputEmail1">Full name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name" name="full_name">
                                            </div>
											<div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address" name="email">
                                            </div>
											<div class="form-group">
                                                <label for="exampleInputEmail1">Badge Number</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Badge Number" name="badge_no">
                                            </div>
											<div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" name="password">
                                            </div>
											<button type="submit" name="submit" class="btn btn-primary">Create User</button>
											</form>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                <?php
				if(isset($_POST["submit"])){
					if( empty($_POST['full_name']) || empty($_POST['email']) || empty($_POST['badge_no']) || empty($_POST['password'])){
	 $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> Please Fill out all Required Fields</p>
          </div>
";
header("location:add_user.php");
}else{

$full_name = $mysqli->escape_string($_POST['full_name']);
$email = $mysqli->escape_string($_POST['email']);
$badge_no = $mysqli->escape_string($_POST['badge_no']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));


// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM tb_admin WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ($result->num_rows > 0 ) {
  
     $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> Seems like <span>$email</span>"
        . " is already taken!</p>
          </div>
";
header("location:add_user.php");


}else{
//Check to see if email entered is an valid email format
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> Please check your email <strong>$email</strong>"
        . " This is not an Email Format!</p>
          </div>
";
header("location:add_user.php");


}else{
	// Add new user to database
	$date = date('Y-m-d H:i:s');
	// ID is autoincrement no need to add here 
    $sql = "INSERT INTO tb_admin (full_name,email,badge_no,password,date) " 
            . "VALUES ('$full_name','$email','$badge_no','$password','$date')";
			 if ($mysqli->query($sql) ){
            $_SESSION['error_message']= " <div class='alert alert-success' role='alert'>
            <strong>Success!</strong> New user has been created.";
        header("location: add_user.php"); 
			 } else {
           $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> there seems to be a problem. Try Again.";
header("location: add_user.php");
    }

}
	
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