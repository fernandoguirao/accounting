<?php

/* Con JS QUIERO

Un array de todos los nombres de objeto.
Cada nombre de objeto le añadimos un `$tabla`.`nombreobjeto`,
Eliminamos el key de la variable que pasamos.

*/

$username = $dbUser;
$password = $dbPass;
$hostname = $server; 

//connection to the database
$con = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
echo "";

//select a database to work with
$selected = mysql_select_db($dbName,$con) 
  or die("Could not select examples");

//execute the SQL query and return records
/* $result = mysql_query("SELECT * FROM $tabla ORDER BY date"); */

if ($tabla == 'expenses') {
	$arrayTabla = "SELECT `expenses`.*,`clients_and_suppliers`.`short_name`,`clients_and_suppliers`.`full_name`,`clients_and_suppliers`.`address`,`clients_and_suppliers`.`phone`,`clients_and_suppliers`.`DNI`,`clients_and_suppliers`.`accountBnk` FROM expenses LEFT JOIN `accounting`.`clients_and_suppliers` ON `expenses`.`recipient` = `clients_and_suppliers`.`id` ORDER BY date";
} else if ($tabla == 'incoming') {
	$arrayTabla = "SELECT `incoming`.*,`clients_and_suppliers`.`short_name`,`clients_and_suppliers`.`full_name`,`clients_and_suppliers`.`address`,`clients_and_suppliers`.`phone`,`clients_and_suppliers`.`DNI`, `clients_and_suppliers`.`accountBnk` FROM incoming LEFT JOIN `accounting`.`clients_and_suppliers` ON `incoming`.`payer` = `clients_and_suppliers`.`id` ORDER BY date";

} else {
	$arrayTabla = "SELECT * FROM $tabla ORDER BY date";
}

$query = $arrayTabla;

    
$result = mysql_query($query);

$i = 0;

			$i = 0;

			while($row = mysql_fetch_row($result))
			{
				echo "resultado$i:new constructor([";
				
				// $row is array... foreach( .. ) puts every element
				// of $row to $cell variable
				
				
				foreach($row as $cell)
					echo "'$cell',";
				echo "]),";
				
				$i++;
			}




//close the connection
mysql_close($con);


?>