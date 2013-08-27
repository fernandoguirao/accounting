<?php    
    session_start(); 
    include_once "scripts/conection.php";
    
    session_start(); 
    include_once "scripts/conection.php";
    
    include 'templates/persistent/header.php';

    include 'scripts/action.php';
    include 'scripts/delete.php';
    include 'scripts/update.php';

    include 'templates/persistent/topBar.php';
    
    include 'scripts/datavars.php';
    
    include 'templates/session/login.php';
    
    include 'templates/persistent/body-gen.php';

    include 'templates/persistent/footer.php';
    
?>