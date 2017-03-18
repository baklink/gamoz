<?php
include 'header.php';
?>
<?php 
if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete upload file ? <a href="my_upload.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="my_upload.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysql_query("DELETE FROM presentation WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
	header("location: my_upload.php"); 
    exit();
}
?>
<html>
<body>
    <title>My_upload</title>
 
    
<div align="center" id="mainWrapper">
    <div id="pageContent"><br />
     
<div align="center" style="margin-left:1px;">
      <h2>Upload List</h2>
   
    </div>
   
  </div>
 

 <div style="margin-left:20px;" class="content table-responsive table-full-width">
					
                             <table  class="table table-hover table-striped"> 
                           
<?php 
$cid=$_SESSION['id'];
$sql = mysql_query("SELECT * FROM presentation WHERE cid=$cid");

   echo " <thead>
                                       <th>User Name</th>
					<th>Subject</th>
                                    	<th>Topic</th>
                                    	<th>Branch</th>
                                    	<th>File</th>
										
                                                                                <th>Delete</th>
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
                                                                                      echo  "<td><a href='my_upload.php?deleteid=$id'>delete</a></td>";
                                            echo " </tr>";
                                       
                                 echo   " </tbody>";
				   }
} else {
	echo "You have no Uploads yet";
}
?>

  </table>
 </div>
</div>

    </body>

	<footer>
	<?php
	include "footer.php"
	?>
	</footer>

</html>