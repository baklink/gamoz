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
</head>

<body>
    
    
    
    
    

    <!-- Navigation -->
    <?php
	include "header.php"
	?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

		<h1 class="page-header" style="font-weight:300;">
                    Community Posts
					<br><p class="lead"> Share your ideas</p>
                    
                </h1>

            <!-- Blog Entries Column -->
            <div class="col-md-8">
			<h2 class="page-header">Recent Posts</h2>


                
 
    
    <?php 

if (isset($_SESSION["id"])) {
	$targetID = $_SESSION["id"];
    $sql = mysql_query("SELECT * FROM post_project ORDER BY id DESC");
    $productCount = mysql_num_rows($sql); 
    if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
                        $id=$row['id'];
			$pname = $row['pname'];
			$pdesc = $row['pdesc'];
			$mdesc = $row['main_desc'];
                        $cfile=$row['file'];
			$cname = $row['cname'];
			$branch= $row['branch'];
			?>
  <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
    
     <h2>
        
                    <?php 
                    
                     echo"<td><a href='project.php?pid=$id'>$pname</a></td>";
                   
                    ?></a>
                </h2>
                <p class="lead">
                    by <a href=""><?php echo $cname; ?></a>
                </p>
                <p><?php echo $pdesc; ?></p>
                <a class="btn btn-link-1" <?php echo"<a href='project.php?pid=$id'>" ?>Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

               
            </div>
        </div>
  </div>
    <hr>
		
       <?php }
        
           
    } else {
	    echo "Sorry that doesnt exist.";
		exit();
    }
}
?>

    
    

   				

              
               
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
              

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Project Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href=CSE.php>Computer Science</a>
                                </li>
                                <li><a href="ME.php">Mechanical</a>
                                </li>
                                <li><a href="CE.php">Civil</a>
                                </li>
                                <li><a href="EEE.php">Electrical</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="EC.php">Electronics</a>
                                </li>
                                <li><a href="Applied.php">Applied Science</a>
                                </li>
                                <li><a href="Arch.php">Architecture</a>
                                </li>
                                <li><a href="community.php">All Branches</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        

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
