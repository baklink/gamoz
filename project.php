 <?php 
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php"); 
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

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gamoz Community</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="assets/ico/g.png">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript">
	  function showhide(id) {
       	var e = document.getElementById(id);
       	e.style.display = (e.style.display == 'block') ? 'none' : 'block';
     }
	</script> 
</head>

<body>

    <!-- Top menu -->
			<nav class="navbar navbar-inverse" role="navigation">
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
        	
            

    
    <!-- Navigation -->
   
     <?php
     
     //inserting to comment box
                include "storescripts/connect_to_mysql.php";
    if (isset($_GET['pid'])) {
    $pid=$_GET['pid'];
    if (!isset($_SESSION["user"])) {
    header("location:index.php"); 
   exit();
}
$userID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); 
$user = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["user"]); 


 $sql = mysql_query("SELECT * FROM post_project WHERE id='$pid' LIMIT 1");
    $productCount = mysql_num_rows($sql); 
    if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
             
	$pname = $row['pname'];					
        }
        
           
    } else {
	    echo "Sorry that doesnt exist.";
		exit();
    }


        if (isset($_POST['submit'])) {
     $comment = mysql_real_escape_string($_POST['comment']);
	   
                       
   
	$sql = mysql_query("INSERT INTO comment_box (pid,pname, user, comment) VALUES('$pid','$pname',   '$user','$comment')") or die (mysql_error());
	header("location:project.php?pid=$pid"); 
    exit();   
    }
    
    }
    
?>
     
 
    
     <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-sm-10 col-sm-offset-1" >
    
                
                
                
    
   <?php
   //displaying from post project
  if (isset($_GET['pid'])) {
    $pid=$_GET['pid'];
    $sql = mysql_query("SELECT * FROM post_project WHERE id=$pid LIMIT 1");
    $productCount = mysql_num_rows($sql); 
    if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
                        $cid= $row['cid'];
			$pname = $row['pname'];
			$pdesc = $row['pdesc'];
			$mdesc = $row['main_desc'];
                        $cfile=$row['file'];
                        $branch= $row['branch'];
			$cname = $row['cname'];
			
			?>
   
    
    
                <h2><a href=""><?php echo $pname;?></a></h2>

                <!-- Author -->
                <p >
                    by  <h3><a href=""><?php echo $cname;?></a></h3>
                </p>

                
      

                <hr>

                <!-- Post Content -->
                <p><b>Project overview:</b></br><?php echo $pdesc; ?></p>
                
                <p><h5></h5><?php echo $mdesc; ?></p>
				<hr>


<!-- Date/Time -->
                <p><span class="glyphicon glyphicon-download"></span> <?php
                 if (isset($_GET['pid'])) {
    $pid=$_GET['pid'];
                $raw_results = mysql_query("SELECT * FROM post_project WHERE id=$pid LIMIT 1") or die(mysql_error());

		if((mysql_num_rows($raw_results) > 0)){ // if one or more rows are returned do following
	
	while(($row=mysql_fetch_array($raw_results)))
	{
		echo '<tr>';
		
		echo "<td align=center><a title='Click here to download in file.' 
		     href='pdownload.php?id={$row['file']}'>{$row['file']} </a>"; 
		echo '</tr>';
		
	}
	echo '</table>';
	echo  '</tbody>';
	echo '<br/>';
	        }   
		
                
                 }    
                
                
               ?>Click here</a> to download file which contain Project Overview</p>

                <hr>
				<h3><b>Comments:</b></h3>

               

               
    
    
    
    
    
    
     <?php }
        
           
    } else {
	    echo "Sorry that doesnt exist.";
		exit();
    }
}
?>
    
    
           

                
                <?php
                  //displaying from comment box
  if (isset($_GET['pid'])) {
    $pid=$_GET['pid'];
    $sql = mysql_query("SELECT * FROM comment_box WHERE pid=$pid  ");
    $productCount = mysql_num_rows($sql); 
    if ($productCount >= 0) {
	    while($row = mysql_fetch_array($sql)){ 
                        $id=$row['pid'];
			$user = $row['user'];
			$comment=$row['comment']
			?>
   
                
                
                
                 <!-- Blog Comments -->
                <div class="media" >
                   
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $user;?>
                            
                        </h4>
                        <p><?php echo $comment; ?></p>
					</div>
				</div>
                 
                  <?php }
        
           
    } else {
	    echo "Sorry that doesnt exist.";
		exit();
    }
}
?>
    


	<!-- Comment -->
               
                 
                 
                 <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Suggestion:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <input type="text" name="comment" class="form-control" >
                        </div>
                        <button type="submit" name="submit" class="btn btn-link-1">Submit</button>
                    </form>
                </div>

                <hr>



                <!-- Side Widget Well -->
                

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        

    </div>
</div>
	
    <!-- /.container -->
	<?php
	include "footer.php"
	?>

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/scripts.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
