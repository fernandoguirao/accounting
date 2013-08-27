<?php
    session_start();
    if (!isset($_SESSION["usuario"]) && $_POST[usuario]){
        $_SESSION["usuario"] = $_POST[usuario];
    } else {
         $_SESSION["usuario"] = $_SESSION["usuario"];
    }
    if ($_GET["logout"]) {
        unset($_SESSION['usuario']);
    }
?>