<?php
/* Log out process, unsets and destroys session variables */
session_start();
unset($_SESSION['email']);
unset($_SESSION['full_name']);
unset($_SESSION['user_type']);
unset($_SESSION['logged_in']);
    header("location: index.php");
    
?>
