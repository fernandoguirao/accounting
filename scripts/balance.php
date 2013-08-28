
<!-- Creamos una tabla con todas las entradas de ingresos y gastos y unificamos la cantidad de uno y otro en una misma columna. Si es gasto lo pasamos a negativo. -->
<div class="container">
<h2>Evolución balance</h2>
	<table id="data">
	<tfoot>
		<tr>
		</tr>
	</tfoot>
	<tbody>
		<tr>
		</tr>
	</tbody>
</table>
<div id="holder"></div>
<br>
<h2>Balance desglosado</h2>
<br>
	<div id="balanceTabla"></div>
	
</div>
<script type="text/javascript">


<?php

/* if ($tabla == 'balance') { */

$username = $dbu;
$password = "H1dr0g3n0";
$hostname = "localhost"; 

//connection to the database
$con = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
echo "";

//select a database to work with
$selected = mysql_select_db($dbn,$con) 
  or die("Could not select examples");

$consulta = "SELECT `expenses`.`date`, `expenses`.`concept`, `expenses`.`amount` FROM `expenses` ORDER BY `date`";
$consulta2 = "SELECT `incoming`.`date`,`incoming`.`concept`, `incoming`.`amount`FROM `incoming` ORDER BY `date`";

$query = $consulta2;
$query2 = $consulta;

$result = mysql_query($query);
$result2 = mysql_query($query2);


$i = 0;
$j = 0;
echo "balanceArray = [";
while($row = mysql_fetch_row($result))
{
echo "[";
	foreach($row as $cell)
		echo "'$cell',";	
	$i++;
echo "],";
}

while($row2 = mysql_fetch_row($result2))
{
echo "[";
$k=0;
	foreach($row2 as $cell2){
		if($k!==2){
		echo "'$cell2',";
		} else {
			echo "'-$cell2'";
		}
		$k++;
	}	
	$j++;
echo "],";
}

echo "];";

//close the connection
mysql_close($con);

?>

console.log(balanceArray);

</script>