<?php
ob_start();
session_start();
// Database connection
include ("config.php");

if(isset($_SESSION['admin_logged_in'])){
	header("location:index.php");
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

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
        
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-12 p-5">

                                        <center><h6 class="h5 mb-0 mt-4">Admin!</h6></center>
									<?php 
 //if theres error message display
   if( isset($_SESSION['error_message']) AND !empty($_SESSION['error_message']) ){
        echo $_SESSION['error_message'];  
unset( $_SESSION['error_message'] );		
	}

?>
                                        <form  action=""  method=POST enctype="multipart/form-data" class="authentication-form">
                                            <div class="form-group">
                                                <label class="form-control-label">Email Address</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                                                </div>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Password</label>
                                              
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" id="password"
                                                        placeholder="Enter your password" name="password">
                                                </div>
                                            </div>
											
                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit" name="submit"> Log In
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
<?php
if(isset($_POST["submit"])){
/* User login process, checks if user exists and password is correct */
if(  empty($_POST['email']) || empty($_POST['password'])){
	 $_SESSION['error_message']= " <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong> Please Fill out all Required Fields</p>
          </div>
";
header("location:login.php");
}else{
// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM tb_admin WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist

	 $_SESSION['error_message'] = "  <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong>  User with that email doesn't exist!
          </div>
";
	header("location:login.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
		// add sessions
        $_SESSION['admin_email'] = $user['email'];
        $_SESSION['admin_full_name'] = $user['full_name'];
        $_SESSION['badge_no'] = $user['badge_no'];
        $_SESSION['admin_logged_in'] = true;
        header("location:index.php");
    }
    else {
		 $_SESSION['error_message'] = "  <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong>  You have entered wrong password, try again!
          </div>
";
	header("location:login.php");
    }
}


}

}

?>
                     
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>