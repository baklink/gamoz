<?php
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: admin_login.php"); 
    exit();
}
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); 
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); 
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]);

include "../storescripts/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1");

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
<?php 
if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete user ? <a href="file_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="file_list.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysql_query("DELETE FROM presentation WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
	header("location: file_list.php"); 
    exit();
}
?>

 <div class="content table-responsive table-full-width">
					
                             <table class="table table-hover table-striped"> 
                           
<?php 
$sql = mysql_query("SELECT * FROM presentation ORDER BY id DESC");

  echo " <thead>
                                       <th>User Name</th>
					<th>Subject</th>
                                    	<th>Topic</th>
                                    	<th>Branch</th>
                                    	<th>File</th>
										
                                                                                <th>Delete User</th>
                                    </thead> " ;
				

$customerCount = mysql_num_rows($sql); 
if ($customerCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
            
			 echo " <tbody>";
                                      echo " <tr>";
                                            
                                        	 echo "<td>". $row['cname'] . "</td>";
                                                  echo "<td>". $row['subject'] . "</td>";
                                        	echo"<td>". $row['topic'] ."</td>";
                                        	echo"<td>". $row['branch'] ."</td>";
                                        	echo"<td>". $row['file'] ."</td>";
											
                                                                                     
                                                                                        $id= $row["id"];
                                                                                      echo  "<td><a href='file_list.php?deleteid=$id'>delete</a></td>";
                                            echo " </tr>";
                                       
                                 echo   " </tbody>";
				   }
} else {
	$customer_list = "You have no customers listed in your store yet";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>File list</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />

</head>

<body>
<div align="center" id="mainWrapper">
  <?php include_once("aheader.php");?>
    <div id="pageContent"><br />
     
<div align="left" style="margin-left:24px;">
      <h2>File List</h2>
   
    </div>
   
  </div>
 
</div>
</body>
</html>	