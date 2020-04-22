<?php
/* Log out process, unsets and destroys session variables */
session_start();
unset($_SESSION['admin_email']);
unset($_SESSION['admin_full_name']);
unset($_SESSION['badge_no']);
unset( $_SESSION['admin_logged_in']);
 
    header("location: index.php");
    
?>
