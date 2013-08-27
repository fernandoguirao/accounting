<?php

function foreignKey($refTable,$refVar,$refName,$refType,$refTypeVal) {
$con=mysqli_connect("localhost","fguirao","H1dr0g3n0","accounting");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM $refTable WHERE `$refType` = '$refTypeVal'");

while($row = mysqli_fetch_array($result))
  {
  echo '["'.$row[$refName].'"';
  echo ",";
  echo '"'.$row[$refVar].'"],';
  }

mysqli_close($con);
}
?>