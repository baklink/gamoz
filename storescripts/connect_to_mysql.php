<?php
error_reporting(E_ALL ^ E_DEPRECATED);
?>
<?php   
$db_host = "sql211.rf.gd"; 
$db_username = "rfgd_19799683";   
$db_pass = "gamoz123";  
$db_name = "rfgd_19799683_test2"; 
 mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");              
?>