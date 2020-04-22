<?php
// check to see if user is logged in if not then redirect to login page
if(!isset($_SESSION['logged_in'])){
		 $_SESSION['error_message'] = "  <div class='alert alert-danger' role='alert'>
            <strong>Ooops!</strong>  Please login first!
          </div>
";
	header("location:login.php");
}

?>