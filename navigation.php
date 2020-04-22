
<div class="header-top-bar">
<div class="container">
<div class="row">
<div class="col-sm-4 col-xs-12 xs-center">
<div class="logo">
<a href="index.php" title="Home" >

<h4>Gloucestershire Constabulary</h4>
</a>
</div>
</div>
<div class="col-sm-8 xs-none text-right">
<div >
<div >
<?php // if user is not logged in display these buttons
if (!isset($_SESSION["logged_in"])){ ?>
<a href="register.php"><button class="blue-btn btn" style="float:right">Register</button></a>
<a href="login.php"><button class="blue-btn btn" style="float:right">Login</button></a>
<?php } ?>
</div>
<div >
<?php // if user is logged in display this button 
if (isset($_SESSION["logged_in"])){ ?>
<a href="logout.php"><button class="blue-btn btn" style="float:right">Log Out</button></a>
<?php }?>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="mainmenu-area">
<div class="container">
<div class="row">
<div class="mainmenu">
<div class="col-xs-12">
<nav class="navbar" id="navbar-example2">
<div class="navbar-header">
<button class="collapsed navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-scrollspy">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div class="collapse navbar-collapse bs-example-js-navbar-scrollspy">
<ul class="nav navbar-nav">
<li ><a href="index.php" title="Home">HOME</a></li>
<!--li><a href="about.php" title="About Us">ABOUT US</a></li-->
<!--li><a href="contact.php" title="Contact us">CONTACT US</a></li-->
<?php // if user is logged in display these navigations 
if (isset($_SESSION["logged_in"])){ ?>
<li><a href="report.php" title="Report">REPORT</a></li>
<li><a href="register_bike.php" title="Register Bike">REGISTER BIKE</a></li>
<li><a href="profile.php" title="Profile">PROFILE</a></li>
<?php }?>

</ul>
</div>
</nav>
</div>
</div>
</div>
</div>
</div>