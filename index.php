<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from azmind.com/premium/marco/v2-4/layout-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Feb 2017 14:07:09 GMT -->
<head><script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gamoz</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">        
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/typicons/typicons.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style1.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/g.png">
        
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    </head>
    
    
    <body>
    
        <!-- Loader -->
    	
				
        <!-- Top content -->
        <div class="top-content">
        	
        	<!-- Top menu -->
			<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
				<div class="container">
					<div class="navbar-header">
						
                                            <a class="navbar-brand" href="index.php">Marco - Bootstrap Landing Page</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="top-navbar-1">
						<ul class="nav navbar-nav navbar-right">						
							
						</ul>
					</div>
				</div>
			</nav>
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 text">
                            <h1 class="wow fadeInLeftBig">Welcome to <strong>Gamoz</strong></h1>
                            <div class="description wow fadeInLeftBig">
                            	<p>
	                            	Gamoz is a website for engineering students and faculties. 
	                            	Here you can search or upload your study materials and share your project ideas. Signup to upload!
                            	</p>
                            </div>
                            <div class="top-big-link wow fadeInUp">
                                <form action="index.php" method="GET">
								<input type="text"  name="query" placeholder="Type a keyword" class="form-first-name col-sm-9" id="form-first-name">
                                                                <input type="submit" value="Search" class="btn btn-link-1 scroll-link" ></a> 
                                                                     
                                                                
                                </form>
                                                                
                                <table class="table table-bordered">
  <thead>
      <tr></br></br>
    <th><font face="comic sans ms">Subject</font></th>
    <th><font face="comic sans ms">Topic </font></th>
	<th><font face="comic sans ms">Branch </font></th>
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




include "storescripts/connect_to_mysql.php";
if (isset($_POST['submit'])) {
    $name = mysql_real_escape_string($_POST['name']);
    $position = mysql_real_escape_string($_POST['position']);
    $branch = mysql_real_escape_string($_POST['branch']);
    $security = mysql_real_escape_string($_POST['security']);
	$answer = mysql_real_escape_string($_POST['answer']);
	$email = mysql_real_escape_string($_POST['email']);
         $password = mysql_real_escape_string($_POST['password']);
         $cpassword = mysql_real_escape_string($_POST['cpassword']);	
          $sql = mysql_query("SELECT id FROM user WHERE email='$email' LIMIT 1");
	$userMatch = mysql_num_rows($sql); 
    if ($userMatch > 0) {
		echo '<p>Sorry your email id is already registered into the system, <a href="index.php">click here</a></p>';
		exit();
	}
	if($password != $cpassword){
		echo 'Your passwords do not match., <a href="index.php">Refill here</a>';
		exit();
	}
	$sql = mysql_query("INSERT INTO user (user_name, type, dept, question, answer, email, pass) VALUES('$name', '$position','$branch','$security','$answer','$email','$password')") or die (mysql_error());
	header("location:index.php?success"); 
    exit();
}


?>
        <?php

 
if (isset($_POST["username"]) && isset($_POST["password"])) {

    $user = preg_replace("/[^!<>@&\/\sA-Za-z0-9_]/","", $_POST["username"]);
    $password = preg_replace("/[^!<>@&\/\sA-Za-z0-9_]/","", $_POST["password"]);

    include "storescripts/connect_to_mysql.php"; 
    $sql = mysql_query("SELECT id FROM user WHERE user_name='$user' AND pass='$password' LIMIT 1"); 
	
    $existCount = mysql_num_rows($sql);
    if ($existCount == 1) { 
	     while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
		 }
                 session_start();
		 $_SESSION["id"] = $id;
		 $_SESSION["user"] = $user;
		 $_SESSION["password"] = $password;
		header("location: home.php?userloginsuccess");
         exit();
} 
else {
 echo'That information is incorrect, try again <a href="index.php">Click Here</a>';
		exit();
	}   
 }
?>
                                </table>
                                   
                            
                    </div>

							<div class="row" style="padding:20px;">
				   </div>
	                
	                

                       
                        
                        
                        
                        
                        
                        
                        
                        </div> 
 

           
                       <div class="col-sm-5 form-box wow fadeInUp">
                        	<div class="form-top">


							

                        		<div class="form-top-left">
                        			<ul class="tab-group">
			<li class="tab active"><a href="#signup">Sign Up</a></li>
			<li class="tab"><a href="#login">Log In</a></li>
                       
		  </ul>
                        		</div>
                        		
                            </div>
							<div class="tab-content">
							<div id="signup"> 
                            <div class="form-bottom">
			                    <form role="form" action="index.php" name="userForm" method="post" onsubmit="return validateemail();"  >
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-first-name">User name</label>
			                        	<input type="text" name="name" placeholder="User Name" class="form-first-name form-control" id="form-first-name">
			                        </div>
			                       
									<div class="form-group">
			                        	<select name="position" class="form-control" id="position" required>
											<option value="">Student or faculty</option>
											<option value="CSE">Student</option>
											<option value="ME">Faculty</option>
											
										</select>
			                        </div>
									<div class="form-group">
			                        	
										<select name="branch" class="form-control" id="branch" required>
											<option value="" >Branch</option>
											<option value="CSE">CSE</option>
											<option value="ME">ME</option>
											<option value="CE">CE</option>
											<option value="EEE">EEE</option>
											<option value="EC">EC</option>
											<option value="Applied Science">Applied Science</option>
											<option value="Architecture">Architecture</option>
										</select>
			                        </div>
                                                <div class="form-group">
                                                        <select name="security" class="form-control" placeholder="security question" required>
																						<option value="">Security Question</option>
																						<option value="What is your school name?">What is your school name?</option>
                                                                                     
                                                                                         <option value="What is your favourite hobby?">What is your favourite hobby?</option>
                                                                                         <option value="What is your nick name?">What is your nick name?</option>
                                                                                         <option value="What is your pet name?">What is your pet name?</option>
                                                                                         <option value="What is your favourite game?">What is your favourite game?</option>
                                                                                </select>
			                        </div>
                                                <div class="form-group">
			                        	<label class="sr-only" for="form-email">Answer</label>
			                        	<input type="text" name="answer" placeholder="Answer" class="form-email form-control" id="form-email">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-email">Email</label>
			                        	<input type="text" name="email" placeholder="Email" class="form-email form-control" id="form-email">
			                        </div>
			                         <div class="form-group">
			                        	<label class="sr-only" for="form-email">Password</label>
                                                        <input type="password" name="password" placeholder="Password" class="form-email form-control" id="form-email">
			                        </div>
							 <div class="form-group">
			                        	<label class="sr-only" for="form-email">Confirm Password</label>
                                                        <input type="password" name="cpassword" placeholder="Confirm Password" class="form-email form-control" id="form-email">
			                        </div>
							
			                        <button type="submit" name="submit" onclick="javascript:return validateMyForm();" class="btn">Sign me up!</button>
			                        <div class="form-links">
			                        	
			                        </div>
			                    </form>
		                    </div>
							</div>
                                                        
                
                                                            <script type="text/javascript" language="javascript"> 
<!--
function validateMyForm ( ) { 
    var isValid = true;
    if ( document.userForm.name.value == "" ) { 
	    alert ( "Please type Your User Name" ); 
	    isValid = false;
    } else if ( document.userForm.position.value == "" ) { 
	    alert ( "Please type Your Position" ); 
	    isValid = false;
    } else if ( document.userForm.branch.value == "" ) { 
	    alert ( "Please type Your Branch" ); 
	    isValid = false;
    } else if ( document.userForm.security.value == "" ) { 
	    alert ( "Please Choose Your Security Q" ); 
	    isValid = false;
    } else if ( document.userForm.answer.value == "" ) { 
	    alert ( "Please Type Your Answer" ); 
	    isValid = false;
    } else if ( document.userForm.email.value == "" ) { 
	    alert ( "Please Type Your Email" ); 
	    isValid = false;
    } else if ( document.userForm.password.value == "" ) { 
            alert ( "Please provide your password" ); 
            isValid = false;
    } else if ( document.userForm.cpassword.value == "" ) { 
            alert ( "Please provide your Confirm Password" ); 
            isValid = false;
    }
    return isValid;

    }
    
    
    function validateemail()  
{  
var x=document.userForm.email.value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
  return false;  
  }  

 var firstpassword=document.userForm.password.value;
var secondpassword=document.userForm.cpassword.value;

if(firstpassword==secondpassword){
return true;
}
else{
alert("password must be same!");
return false;
}
}  


function validateloginForm ( ) { 
    var isValid = true;
     if ( document.userForm1.username.value == "" ) { 
	    alert ( "Please type Your User Name" ); 
	    isValid = false;
    } else if ( document.userForm1.password.value == "" ) { 
	    alert ( "Please type Your Password" ); 
	    isValid = false;
    } 
    return isValid;
}




//-->
</script>

                                                            
                                                            
                                                            
                                                            
                                                            

							<div id="login"> 
                            <div class="form-bottom">
			                    <form role="loginform" action="index.php" method="post" name="userForm1">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-first-name">User name</label>
			                        	<input type="text" name="username" placeholder="Username" class="form-first-name form-control" id="form-first-name">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Password</label>
			                        	<input type="password" name="password" placeholder="Password" class="form-last-name form-control" id="form-last-name">
			                        </div>
			                       
			                        <button type="submit" name="loginsubmit" onclick="javascript:return validateloginForm();"  class="btn">Login!</button>
        </form>


						


<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
include "storescripts/connect_to_mysql.php";
if (isset($_POST['rsubmit'])) {
    $username = mysql_real_escape_string($_POST['rname']);
	$security = mysql_real_escape_string($_POST['rsecurity']);
	$securityanswer = mysql_real_escape_string($_POST['ranswer']);
	$newpassword = mysql_real_escape_string($_POST['rpassword']);
	$newcpassword = mysql_real_escape_string($_POST['rcpassword']);
	$sql = mysql_query("SELECT * FROM user WHERE user_name='$username' LIMIT 1");
	$userMatch = mysql_num_rows($sql); 
	$list = mysql_fetch_array($sql);
	$oldpassword = $list['pass'];
	$correctsecurity = $list['question'];
	$correctsecurityanswer = $list['answer'];
	if($security==$correctsecurity && $securityanswer==$correctsecurityanswer){
			if($newpassword != $newcpassword){
				echo 'Password Mismatch, Try again <a href="index.php">Retry here</a>';
				exit();
			}
			else if($newpassword==$oldpassword){
				echo 'Same as old password, <a href="index.php">Login here</a>';
				exit();
			}
			else {
				$upd = mysql_query("UPDATE user SET pass='$newpassword' WHERE user_name='$name'");
			}
	}
	else {
		echo 'You have entered wrong details <a href="index.php">click here</a>';
		exit();
	}
	header("location: index.php?resetsuccess"); 
    exit();
}
?>
<script type="text/javascript">
	  function showhide(id) {
       	var e = document.getElementById(id);
       	e.style.display = (e.style.display == 'block') ? 'none' : 'block';
     }
	</script> 

			                        <div class="form-links">
			                        	<a href="forgetpass.php">Forgot Password?</a>			                        	
			                        </div>





									
									<div class="form-bottom" id="uniquename" style="display:none;">
                                                                            <form role="form" action="index.php" method="post">
                                                                                
                                                                                <div class="form-group">
			                        	<label class="sr-only" for="form-last-name">User Name</label>
			                        	<input type="text" name="rname" placeholder="User name" class="form-last-name form-control" id="form-last-name">
			                        </div>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-last-name">Secuirty Question</label>
			                        	<input type="text" name="rsecurity" placeholder="Security question" class="form-last-name form-control" id="form-last-name" list="question">
										<datalist id="question">
											<option value="What is your school name?">What is your school name?</option>
                                                                                        <option value="What is your mother's first maiden name?">What is your mother's first maiden name?</option>
                                                                                         <option value="What is your favourite hobby?">What is your favourite hobby?</option>
                                                                                         <option value="What is your nick name?">What is your nick name?</option>
                                                                                         <option value="What is your pet name?">What is your pet name?</option>
                                                                                         <option value="What is your favourite game?">What is your favourite game?</option>
                                                                               </datalist>
			                        </div>
									<div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Answer</label>
			                        	<input type="text" name="ranswer" placeholder="Answer" class="form-last-name form-control" id="form-last-name">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-last-name">New password</label>
			                        	<input type="text" name="rpassword" placeholder="New Password" class="form-last-name form-control" id="form-last-name">
			                        </div>
									<div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Confirm password</label>
			                        	<input type="text" name="rcpassword" placeholder="Confirm Password" class="form-last-name form-control" id="form-last-name">
			                        </div>
			                       
			                        <button type="submit" name="rsubmit" class="btn">Change</button>
			                       

			                    </form>
		                    </div>
							</div>
							</div>



                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        
                
        
       

        <!-- Javascript -->
		<script type="text/javascript" src="assets/js/index.js"></script>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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


<!-- Mirrored from azmind.com/premium/marco/v2-4/layout-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Feb 2017 14:07:57 GMT -->
</html>