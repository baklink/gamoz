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
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<script type="text/javascript" language="javascript"> 
<!--
function validateMyForm ( ) { 
    var isValid = true;
	if ( document.forget.email.value == "" ) { 
	    alert ( "Please enter email" ); 
	    isValid = false;
    } else if ( document.forget.security.value == "" ) { 
	    alert ( "Please select security question" ); 
	    isValid = false;
    } else if ( document.forget.ganswer.value == "" ) { 
	    alert ( "Please asnwer the security question" ); 
	    isValid = false;
    } else if ( document.forget.password.value == "" ) { 
	    alert ( "Please enter password" ); 
	    isValid = false;
    } else if ( document.forget.cpassword.value == "" ) { 
	    alert ( "Please confirm password" ); 
	    isValid = false;
    }
    return isValid;
}
//-->
</script>

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


<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
include "storescripts/connect_to_mysql.php";
if (isset($_POST['email'])) {
	$security = mysql_real_escape_string($_POST['security']);
	$securityanswer = mysql_real_escape_string($_POST['ganswer']);
        $email = mysql_real_escape_string($_POST['email']);
	$newpassword = mysql_real_escape_string($_POST['password']);
	$newcpassword = mysql_real_escape_string($_POST['cpassword']);
	$sql = mysql_query("SELECT * FROM user WHERE email='$email' LIMIT 1");
	$userMatch = mysql_num_rows($sql); 
	$list = mysql_fetch_array($sql);
	$oldpassword = $list['pass'];
	$correctsecurity = $list['question'];
	$correctsecurityanswer = $list['answer'];
	if($security==$correctsecurity && $securityanswer==$correctsecurityanswer){
			if($newpassword != $newcpassword){
				echo 'Password Mismatch, <a href="forgetpass.php">Retry here</a>';
				exit();
			}
			else if($newpassword==$oldpassword){
				echo 'Same as old password, <a href="index.php">Login here</a>';
				exit();
			}
			else {
				$upd = mysql_query("UPDATE user SET pass='$newpassword' WHERE email='$email'");
			}
	}
	else {
		echo 'You have entered wrong details. <a href="forgetpass.php">click here</a>';
		exit();
	}
	header("location: index.php?resetsuccess"); 
    exit();
}
?>



<div align="center" id="mainWrapper">
  
  <div class="container"></p>
<a name="ForgetPassword" id="ForgetPassword"></a>
    <h3>
     Reset Password 
    </h3>
    <form action="" enctype="multipart/form-data" name="forget" id="forget" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6" >
       <tr>
        <td width="37%" align="right" style="padding:10px;">Email</td>
        <td width="63%"><label>
          <input name="email" type="text" id="email" size="35" />
        </label></td>
      </tr>
      <tr>
        <td align="right" size="20" style="padding:10px;">Security Question</td>
        <td><label>
          <select name="security" id="security">
          <option value=""></option>
          <option value="What is your school name?">What is your school name?</option>
         
          <option value="What is your favourite hobby?">What is your favourite hobby?</option>
          <option value="What is your nick name?">What is your nick name?</option>
          <option value="What is your pet name?">What is your pet name?</option>
          <option value="What is your favourite game?">What is your favourite game?</option>
          </select>
        </label></td>
      </tr>
      <tr>
        <td width="37%" align="right" style="padding:10px;">Answer</td>
        <td width="63%"><label>
          <input name="ganswer" type="text" id="ganswer" size="35" />
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right" style="padding:10px;">Password</td>
        <td width="80%"><label>
          <input name="password" type="password" id="password" size="35" />
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right" style="padding:10px;">Confirm Password</td>
        <td width="80%"><label>
          <input name="cpassword" type="password" id="cpassword" size="35" />
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
            <input type="submit" name="button" id="button" value="Submit"  onclick="javascript:return validateMyForm();"/>
        </label></td>
      </tr>
    </table>
    </form>
  </div>
</div>
<!-- Essential jQuery Plugins
		================================================== --> 
<!-- Main jQuery --> 
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- Twitter Bootstrap --> 
<script src="js/bootstrap.min.js"></script> 
<!-- Single Page Nav --> 
<script src="js/jquery.singlePageNav.min.js"></script> 
<!-- jquery.fancybox.pack --> 
<script src="js/jquery.fancybox.pack.js"></script> 
<!-- Google Map API --> 
<script src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<!-- Owl Carousel --> 
<script src="js/owl.carousel.min.js"></script> 
<!-- jquery easing --> 
<script src="js/jquery.easing.min.js"></script> 
<!-- Fullscreen slider --> 
<script src="js/jquery.slitslider.js"></script> 
<script src="js/jquery.ba-cond.min.js"></script> 
<!-- onscroll animation --> 
<script src="js/wow.min.js"></script> 
<!-- Custom Functions --> 
<script src="js/main.js"></script>
</body>
</html>