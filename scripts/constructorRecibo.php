<?php

/* Con JS QUIERO

Un array de todos los nombres de objeto.
Cada nombre de objeto le añadimos un `$tabla`.`nombreobjeto`,
Eliminamos el key de la variable que pasamos.

*/

$username = "fguirao";
$password = "H1dr0g3n0";
$hostname = "localhost"; 

//connection to the database
$con = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
echo "";

//select a database to work with
$selected = mysql_select_db("accounting",$con) 
  or die("Could not select examples");


	$arrayTablaRecibo = "SELECT * FROM invoices";

$queryRecibo = $arrayTablaRecibo;

    
$resultRecibo = mysql_query($queryRecibo);

$m = 0;

			while($rowRecibo = mysql_fetch_row($resultRecibo))
			{
				echo "resultado$m:new constructorRecibo([";
				
				// $row is array... foreach( .. ) puts every element
				// of $row to $cell variable
				
				
				foreach($rowRecibo as $cellRecibo)
					echo "'$cellRecibo',";
				echo "]),";
				
				$m++;
			}



//close the connection
mysql_close($con);
?>