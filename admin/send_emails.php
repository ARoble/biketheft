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
                                <h4 class="mb-1 mt-0">Send Bulk Email</h4>
                            </div>
                        </div>


               
                
                        <!-- products -->
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
									<?php 
 //if theres error message display
   if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ){
        echo $_SESSION['message'];  
unset( $_SESSION['message'] );		
	}

?>
									<form action=""  method=POST enctype="multipart/form-data">
										<br>
										<div class="alert alert-info" role="alert">
										This Email will be sent to all users
										</div>
										<div class="form-group">
                                                <label for="exampleInputEmail1">Subject Header</label>
                                                <input type="text" class="form-control" placeholder="Email Subject Header" name="subject_header" >
                                            </div>
											<div class="form-group">
                                                <label for="exampleInputEmail1">Email Message</label>
                                               <textarea class="form-control" rows="5" id="example-textarea" name="message"></textarea>
                                            </div>
											<button type="submit" name="submit" class="btn btn-primary">Send Email</button>
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
$subject_header = $mysqli->escape_string($_POST['subject_header']);
$message = $mysqli->escape_string($_POST['message']);

$sql = "SELECT * FROM tb_users";
$result = $conn->query($sql);
//Loop users and send emails
while($users = mysqli_fetch_assoc($result)){
    $email = $users['email'];
	$full_name = $users['full_name'];
   
   // SEND Email
   
      $to      = $email;
            $email_from = 'info@police.com';
        $subject = $subject_header;
    $headers = 'From: info@police.com' . "\r\n" .
   'Reply-To: noreply@police.com' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();
         $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
                $message_body='<div style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;">
   
            <table style="padding: 10px;font-size:14px; width:100%;">
              <tr>
                <td style="padding:10px;font-size:14px; width:100%;">
                    <p>Hello '.$full_name.',</p>
                    
                    
                    
                    <p> '.$message.'</p>
                    
                    
                    <p>Witnessed Bike Theft?<br /> Please contact us it info@police.com</p>
                    <p>Your Local Police Department</p>
                  <!-- /Callout Panel -->
                  <!-- FOOTER -->
                 </td>
              </tr>
			  <tr>
			  <td>
				 <div align="center" style="font-size:12px; margin-top:20px; padding:5px; width:100%; background:#eee;">
                    © 2020 <a href="#" target="_blank" style="color:#333; text-decoration: none;">Anti Bike Theft Platform</a>
                  </div>
                </td>
			  </tr>
            </table>
          </div>';
      
        mail($to, $subject, $message_body , $headers);
}


     $_SESSION['message']=  '  <div class="alert alert-success" role="alert">
            <strong>Success!</strong>  Emails have been send .
          </div>
';
	   header("location:send_emails.php");
    

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

















