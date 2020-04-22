<?php
// check if user is logged in if not then reroute to login page
if(!isset($_SESSION['admin_logged_in'])){
		 $_SESSION['error_message'] = "  <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong>  Please login first!
          </div>
";
	header("location:login.php");
}

?>