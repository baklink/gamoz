<?php
include 'header.php';
?>

<?php 
if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete Project? <a href="my_projects.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="my_projects.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysql_query("DELETE FROM post_project WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
	header("location: my_projects.php"); 
    exit();
}
?>
<html>
    <title>My_Projects</title>
 
    <body>


<div align="center" id="mainWrapper">
    <div id="pageContent"><br />
     
<div align="center" style="margin-left:1px;">
      <h2>Project List</h2>
   
    </div>
   
  </div>
 

 <div class="content table-responsive table-full-width">
					
                             <table class="table table-hover table-striped"> 
                           
<?php 
$id=$_SESSION['id'];
$sql = mysql_query("SELECT * FROM post_project WHERE cid=$id ORDER BY id DESC");

  echo " <thead>                       
                                      <th>User Name</th>
                                       <th>Project Name</th>
					<th>Project Description</th>
                                    	<th>Main Description</th>
                                    	<th>File</th>
                                    	<th>Branch</th>
										
                                                                                <th>Delete Project</th>
                                    </thead> " ;
				

$customerCount = mysql_num_rows($sql); 
if ($customerCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
            
			 echo " <tbody>";
                                      echo " <tr>";
                                            
                                        	 echo "<td>". $row['cname'] . "</td>";
                                                  echo "<td>". $row['pname'] . "</td>";
                                        	echo"<td>". $row['pdesc'] ."</td>";
                                        	echo"<td>". $row['main_desc'] ."</td>";
                                        	echo"<td>". $row['file'] ."</td>";
                                                echo"<td>". $row['branch'] ."</td>";
											
                                                                                     
                                                                                        $id= $row["id"];
                                                                                      echo  "<td><a href='my_projects.php?deleteid=$id'>delete</a></td>";
                                            echo " </tr>";
                                       
                                 echo   " </tbody>";
				   }
} else {
	$customer_list = "You have no customers listed in your store yet";
}
?>


 </table>
 </div>
</div>
 

<?php
	include "footer.php"
	?>
    </body>
</html>