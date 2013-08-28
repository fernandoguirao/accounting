<?php
    if(isset($_POST[idUpdate]))  {
        $con=mysqli_connect("localhost",$dbu,"H1dr0g3n0","accounting");
        // Check connection
        if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
        
        $sql="UPDATE  `accounting`.$tabla SET `$_POST[typeUpdate]` = '$_POST[valueUpdate]' WHERE  $tabla.`id` =$_POST[idUpdate]";
        
        if (!mysqli_query($con,$sql))
          {
          die('Error: ' . mysqli_error($con));
          }
        echo "";
        
        mysqli_close($con);
    } else {
        echo '';
    }
?>