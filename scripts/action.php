<?php
    if(isset($_POST[formCrear]))  {
        $con=mysqli_connect("localhost",$dbu,"H1dr0g3n0","accounting");
        // Check connection
        if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
        
        $prueba="";
        $prueba.="INSERT INTO $tabla (";
        
        $numItems = count($_POST);
        $j = 0;
        
        foreach( $_POST as $stuff => $val ) {
            if( is_array( $stuff ) ) {
                foreach( $stuff as $thing) {
                }
            } else {
                if($j === 0) {
                $j++;
                }
                else if(++$j === $numItems) {
                    $prueba.=$stuff;
                } else {
                    $prueba.=$stuff.',';
                }
            }
        }
        $prueba.=")\nVALUES\n(";
        
        $i = 0;

        foreach( $_POST as $stuff => $val ) {
            if( is_array( $stuff ) ) {
                foreach( $stuff as $thing) {
                }
            } else {
                
                if($i === 0) {
                    $i++;
                }
                else if(++$i === $numItems) {
                    $prueba.="'".$val."'";
                } else {
                    $prueba.="'".$val."',";
                }
            }
        }

        $prueba .=")";
        $sql= (string)$prueba;
        
        
        
        if (!mysqli_query($con,$sql))
          {
          die('Error: ' . mysqli_error($con));
          }
        echo "";
        
        
} else {
    echo "";
}
?>