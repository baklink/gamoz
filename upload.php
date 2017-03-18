<!DOCTYPE html>
<html lang="en" class="no-js">

    
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
		<link rel="stylesheet" type="text/css" href="assets/css/component.css" />
		
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/g.png">
        
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
			
    </head>

    <body>
    
        <!-- Loader -->
    	
        <!-- Top content -->
        <div class="top-content">
        	
        	<!-- Top menu -->
			<?php
	include "header.php"
	?>
        	
           
        <!-- Features -->
        
        
       <?php
			if(!empty($_POST))
			{
				$con = mysql_connect("localhost","root","");
				if (!$con)
					echo('Could not connect: ' . mysql_error());
				else
				{
					if (file_exists("download/" . $_FILES["file"]["name"]))
					{
						echo '<script language="javascript">alert(" Sorry!! Filename Already Exists...")</script>';
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"],
						"download/" . $_FILES["file"]["name"]) ;
						mysql_select_db("test2", $con);
                                                $id=$_SESSION['id'];
                                                $name=$_SESSION['user'];
						$sql = "INSERT INTO presentation(cid,cname,subject,topic,branch,file) VALUES ('$id','$name','" . $_POST["sub"] ."','" . $_POST["pre"] . "','" . $_POST["branch"] . "','" . $_FILES["file"]["name"] ."');";
						if (!mysql_query($sql,$con))
							echo('Error : ' . mysql_error());
						else
							echo '<script language="javascript">alert("Thank You!! File Uploded")</script>';
						}
				}
				mysql_close($con);
			}
        ?>
          
        <!-- How it works -->
      

	
        
        <!-- Contact us -->
		<div class="call-to-action-container section-container section-container-image-bg">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 pricing section-description wow fadeIn">
	                    <h2>Upload Files</h2>
	                    
	            </div>
	            
                    <div class="col-sm-8 col-sm-offset-2 pricing-box wow fadeInDown">
                    	<div class="pricing-box-inner">                    		
		                	<div class="pricing-box-price"><strong><i class="fa fa-cloud-upload fa-2x"></i></div>
							<form id="form3" enctype="multipart/form-data" method="post" action="upload.php" name="upload">
		                    <div class="pricing-box-features">
		                    	<ul>
		                    		
		                    		<li><div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Topic</label>
			                        	<input type="text" name="pre" placeholder="Type Topic" class="form-last-name form-control" id="form-last-name" required >
										
			                        </div></li>
									<li><div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Subject</label>
			                        	<input type="text" name="sub" placeholder="Type Subject" class="form-last-name form-control" id="form-last-name" required >
										
			                        </div></li>
									<li><div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Branch</label>
			                        	<select name="branch" class="form-control" id="branch" required>
                                                            <option value=""><?php echo $branch ; ?></option>
											<option value="CSE">CSE</option>
											<option value="ME">ME</option>
											<option value="CE">CE</option>
											<option value="EEE">EEE</option>
											<option value="EC">EC</option>
											<option value="Applied Science">Applied Science</option>
											<option value="Architecture">Architecture</option>
										</select>
			                        </div></li>
									
		                    		
		                    	</ul>
		                    </div>
		                    <div class="pricing-box-sign-up">
		                    	
								<input type="file" name="file" id="file-4" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" multiple />
								<label for="file-4"  class="btn btn-link-1 "><span style="position: relative;display: inline-block;margin: 0 5px;padding: 16px 20px 16px 20px;font-size: 16px;font-weight: 300;line-height: 16px;color: #fff;">Choose a file&hellip;</span></label>
								<label for="Upload"  class="btn btn-link-1 scroll-link" href="#top-content" onclick="javascript:return validateMyForm();">Upload</label>
		                    </div>

								
					
				
							
										
										<input type="submit"  name="upload" id="Upload"  value="Upload File" style="display:none;" /> 
										
									</form>



		                </div>
                    </div>
                    
	            </div>
	        </div>
        </div>
        
        <!-- Footer -->
       <?php
	include "footer.php"
	?>
        
        
        <!-- MODAL: How it works -->
      

        <!-- Javascript -->
		<script src="assets/js/custom-file-input.js"></script>
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