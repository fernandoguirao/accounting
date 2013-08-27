<?php 
// datos para la coneccion a mysql 
define('DB_SERVER',$server); 
define('DB_NAME',$dbName); 
define('DB_USER',$dbUser); 
define('DB_PASS',$dbPass); 
$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS); 

?>