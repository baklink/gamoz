	


<!DOCTYPE html>
<html lang="en" class="no-js">

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
	<link rel="stylesheet" type="text/css" href="assets/css/component.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="assets/ico/g.png">
	 <?php
	include "header.php"
	?>
        
        <?php
			if(!empty($_POST))
			{
				$con = mysql_connect("localhost","root","");
				if (!$con)
					echo('Could not connect: ' . mysql_error());
				else
				{
					
						move_uploaded_file($_FILES["file"]["tmp_name"],
						"upload/" . $_FILES["file"]["name"]) ;
						mysql_select_db("test2", $con);
                                             
                                                if (!isset($_SESSION["user"])) {
    header("location:index.php"); 
   exit();
}
$cid = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); 
$cname= preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["user"]); 

                                                
						$sql = "INSERT INTO post_project(pname,pdesc,main_desc,file,branch,cid,cname) VALUES ('" . $_POST["pname"] ."','" . $_POST["pdesc"] . "','" . $_POST["des"] . "','" . $_FILES["file"]["name"] ."','" . $_POST["branch"] ."','$cid','$cname')" or die (mysql_error());
						if (!mysql_query($sql,$con))
							echo('Error : ' . mysql_error());
						else
							echo '<script language="javascript">alert("Thank You!! Project Uploded")</script>';
						}
				
				mysql_close($con);
                        }
        ?>
		
        <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
        
</head>

<body>

    <!-- Navigation -->
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-sm-8 col-sm-offset-2" >

                <h1>Post a Project</h1>

                
                <hr>

                <!-- Date/Time -->
                

                <!-- Comments Form -->
                <div class="well">
                    
                    <form id="form3" enctype="multipart/form-data" method="post" action="post.php" name="project">
					
                        <div class="form-group">
						<h4>Project name:</h4>
                            <input type="text" name="pname" class="form-control" ></input>
                        </div>
						<div class="form-group">
						<h4>Project Description:</h4>
                                                			
													<textarea class="form-control" rows="3" name="pdesc"></textarea>												
                        </div>
						<div class="form-group">
						<h4>Main Description:</h4>
                                                
												<textarea class="form-control" rows="5" name="des"></textarea>
                        </div>
						<div class="form-group">
						<h4>Upload Files:</h4>                            
							 <div class="pricing-box-sign-up">
		                    	
								<input type="file" name="file" id="file-4" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" multiple />
								<label for="file-4"  class="btn btn-link-1 "><span style="position: relative;display: inline-block;margin: 0 5px;padding: 16px 20px 16px 20px;font-size: 16px;font-weight: 300;line-height: 16px;color: #fff;">Choose a file&hellip;</span></label>
								
		                    </div>
							

                        </div>
						<h4>Branch:</h4>
						<div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Branch</label>
			                        	<select name="branch" class="form-control" id="branch">
                                                            <option disabled="disabled" selected=""><?php echo $branch ; ?></option>
											<option value="CSE">CSE</option>
											<option value="ME">ME</option>
											<option value="CE">CE</option>
											<option value="EEE">EEE</option>
											<option value="EC">EC</option>
											<option value="Applied Science">Applied Science</option>
											<option value="Architecture">Architecture</option>
										</select>
			                        </div>
                        <button type="submit" name="submit" class="btn btn-link-1" onclick="javascript:return validateMyForm();">Post Project!</button>
                    </form>
                </div>

                <hr>

               

            </div>

           

                <!-- Side Widget Well -->
                

            </div>

        </div>
        <!-- /.row -->

        <hr>
  
    </div>
    <!-- /.container -->
	<?php
	include "footer.php"
	?>

    <!-- jQuery -->
	<script src="assets/js/custom-file-input.js"></script>
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/scripts.js"></script>
	 <script type="text/javascript" language="javascript"> 

function validateMyForm ( ) { 
    var isValid = true;
    if ( document.project.pname.value == "" ) { 
	    alert ( "Enter the project name" ); 
	    isValid = false;
    } else if ( document.project.pdesc.value == "" ) { 
	    alert ( "Enter the project description" ); 
	    isValid = false;
    } else if ( document.project.des.value == "" ) { 
	    alert ( "Enter the description" ); 
	    isValid = false;
    } else if ( document.project.branch.value == "" ) { 
	    alert ( "Select branch" ); 
	    isValid = false;
    } 
    return isValid;
    
    }

	
</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
