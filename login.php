<?php    
    session_start(); 
    include_once "scripts/conection_open.php";
    
    include 'templates/persistent/header.php';
    include 'templates/persistent/topBar.php';
    
    include 'templates/session/login.php';
    
    include 'templates/persistent/footer.php';
    include_once "scripts/conection_close.php";
?>