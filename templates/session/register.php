<div class="container">

<?php
/*Creamos el formulario con el campo de Usuario que se llamara $_POST['usuario'] y 2 campos para la clave y uno mas para confirmar si escribió bien la clave, se llamaran $_POST['password'] y $_POST['repassword'] respectivamente, procedemos a escribir el codigo que procesara y validara lo que el usuario ingrese:*/ 
if(isset($_POST['enviar']))//para saber si el botón registrar fue presionado. 
{ 
    if($_POST['usuario'] == '' or $_POST['password'] == '' or $_POST['repassword'] == '') 
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
            if($_POST['password'] == $_POST['repassword'])//Si los campos son iguales, continua el registro y caso contrario saldrá un mensaje de error. 
            { 
                $usuario = $_POST['usuario']; 
                $password = $_POST['password']; 
                $sql = "INSERT INTO usuarios (usuario,password) VALUES ('$usuario','$password')";//Se insertan los datos a la base de datos y el usuario ya fue registrado con exito. 
                mysql_query($sql); 
  
            echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>¡Bien!</strong> Registro completado correctamente.</div>';//Si los campos están vacíos muestra el siguiente mensaje, caso contrario sigue el siguiente codigo. 
            } 
            else 
            { 
                        echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong> ¡Atención!</strong>Las claves no coinciden, vuelve a escribirlas.</div>';//Si los campos están vacíos muestra el siguiente mensaje, caso contrario sigue el siguiente codigo. 
            } 
        } 
        else 
        { 
        echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>¡Atención!</strong> ¡Este usuario ya existe!</div>';//Si los campos están vacíos muestra el siguiente mensaje, caso contrario sigue el siguiente codigo. 
        } 
    } 
}?> 

    <form action="" method="post" class="registro form-horizontal"> 
        <fieldset>
            <legend>
                <h3>Registra tu usuario</h3>
            </legend>
            <div class="form-group">
                <label class="col-lg-2 control-label">Usuario</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="usuario">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Clave</label>
                <div class="col-lg-3">
                    <input class="form-control" type="password" name="password">
                </div>
            </div> 
            <div class="form-group">
                <label class="col-lg-2 control-label">Repetir clave</label>
                <div class="col-lg-3">
                    <input type="password" class="form-control" name="repassword">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-warning btn-large btn-block offset-2" name="enviar">Registrar</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>

