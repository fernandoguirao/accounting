<?php
/*Creamos el formulario con el campo de Usuario que se llamara $_POST['usuario'] y 2 campos para la clave y uno mas para confirmar si escribió bien la clave, se llamaran $_POST['password'] y $_POST['repassword'] respectivamente, procedemos a escribir el codigo que procesara y validara lo que el usuario ingrese:*/ 
if(isset($_POST['enviar']))//para saber si el botón registrar fue presionado. 
{ 
    if($_POST['usuario'] == '' or $_POST['password'] == '') 
    { 
        echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>¡Atención!</strong> Hay campos por rellenar</div>';//Si los campos están vacíos muestra el siguiente mensaje, caso contrario sigue el siguiente codigo. 
    } 
    else 
    { 
        $sql = 'SELECT * FROM usuarios'; 
        $rec = mysql_query($sql); 
        $verificar_usuario = 0;//Creamos la variable $verificar_usuario que empieza con el valor 0 y si la condición que verifica el usuario(abajo), entonces la variable toma el valor de 1 que quiere decir que ya existe ese nombre de usuario por lo tanto no se puede registrar 
  
        while($result = mysql_fetch_object($rec)) 
        { 
            if($result->usuario == $_POST['usuario']) //Esta condición verifica si ya existe el usuario 
            { 
                
                $verificar_usuario = 1; 
            } 
        } 
  
        if($verificar_usuario == 0) 
        { 
/*             echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>¡Este usuario no existe!</strong></div>'; */
    
        } 
        else 
        { 
            $sql2="SELECT * FROM usuarios WHERE usuario ='$_POST[usuario]'";
            $rec2 = mysql_query($sql2);
            while($result2 = mysql_fetch_object($rec2)) {
                if($result2->password == $_POST['password']){
                    $nombreusuario = $_POST[usuario];
                    echo 'Bienvenido, '.$nombreusuario;
                    
                } else {
                     echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>¡Contraseña incorrecta!</strong></div>';//Si los campos están vacíos muestra el siguiente mensaje, caso contrario sigue el siguiente codigo. 
                }
            }
        } 
    } 
}?> 