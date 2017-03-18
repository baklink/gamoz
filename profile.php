<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gamoz Profile</title>

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

    
    <?php 
include "storescripts/connect_to_mysql.php";
if (isset($_POST['update'])) {
    $name = mysql_real_escape_string($_POST['name']);
    echo $name;
    $type= mysql_real_escape_string($_POST['type']);
    $email = mysql_real_escape_string($_POST['email']);
	$question = mysql_real_escape_string($_POST['question']);
        $dept=mysql_real_escape_string($_POST['question']);
    $answer = mysql_real_escape_string($_POST['answer']);	
	$pass = mysql_real_escape_string($_POST['pass']);
	session_start();
	if (isset($_SESSION["id"])) {
	$targetID = $_SESSION["id"];
echo $targetID;
	
	$sql = mysql_query("UPDATE user SET user_name='$name', type='$type',dept='$dept', question='$question', answer='$answer', email='$email' ,pass='$pass' WHERE id='$targetID'" ) or die(mysql_error);
        
        header("location: profile.php?success"); 
        }
elseif(!isset($_SESSION["id"])){
   header("location: index.php");
}



	
}
?>

    
    
    <!-- Navigation -->
    <?php
	include "header.php"
	?>
    <?php 
        include 'storescripts/connect_to_mysql.php';
if (isset($_SESSION["id"])) {
	$targetID = $_SESSION["id"];
    $sql = mysql_query("SELECT * FROM user WHERE id='$targetID' LIMIT 1");
    $productCount = mysql_num_rows($sql); 
    if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
             
			$name = $row['user_name'];
			$email = $row['email'];
			$dept = $row['dept'];
                        $type=$row['type'];
                        $dept=$row['dept'];
			$pass = $row['pass'];
			$question = $row['question'];
			$answer = $row['answer'];
			
		
        }
        
           
    } else {
	    echo "Sorry that doesnt exist.";
		exit();
    }
}
?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-sm-6 col-sm-offset-3" >

                <h1>Edit Profile</h1>

                
                <hr>

                <!-- Date/Time -->
                

                <!-- Comments Form -->
                <div class="well">
                    
                    <form role="form" method="post" name="userForm" onsubmit="return validateemail();">
					
                        <div class="form-group">
						<h4>Username:</h4>
                                                <input type="text" name="name" placeholder="Username" class="form-last-name form-control" id="Position" value="<?php echo"$name";?>" required>
										
                        </div>
                        
						<div class="form-group">
						<h4>Designation</h4>
			                        	
										<select name="type" class="form-control" id="Position" value="" required>
											<option value=""><?php echo"$type";?></option>
											<option value="Student">Student</option>
											<option value="Faculty">Faculty</option>n>
										</select>
			               </div>
                        
                        <div class="form-group">
						<h4>Department</h4>
			                        	
										<select name="dept" class="form-control" id="dept" value="" required>
											<option value=""><?php echo"$dept";?></option>
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
						<h4>Email</h4>
                                                <input type="text" name="email" placeholder="Email" class="form-last-name form-control" id="Position" value="<?php echo"$email";?>">
										
                        </div>
                        
						<div class="form-group">
						<h4>Security Question</h4>
                                                        <select name="question"  class="form-control" placeholder="security question" value="" required>
																						<option value=""><?php echo"$question";?></option>
																						<option value="What is your school name?">What is your school name?</option>
                                                                                        <option value="What is your mother's first maiden name?">What is your mother's first maiden name?</option>
                                                                                         <option value="What is your favourite hobby?">What is your favourite hobby?</option>
                                                                                         <option value="What is your nick name?">What is your nick name?</option>
                                                                                         <option value="What is your pet name?">What is your pet name?</option>
                                                                                         <option value="What is your favourite game?">What is your favourite game?</option>
                                                                                </select>
			                        </div>
                         <div class="form-group">
						<h4>Answer</h4>
                                                <input type="text" name="answer" placeholder="Answer" class="form-last-name form-control" id="Position" value="<?php echo"$answer";?>" required>
										
                        </div>
                        
                         <div class="form-group">
						<h4>Password</h4>
                                                <input type="text" name="pass"  placeholder="Password" class="form-last-name form-control" id="Position" value="<?php echo"$pass";?>" required>
										
                        </div>
                        
                        
							
				
                        <input type="submit" name="update" type="submit" class="btn btn-link-1" >
                    </form>
                </div>

                <hr>

               

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
	 <script type="text/javascript" language="javascript"> 

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
</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
