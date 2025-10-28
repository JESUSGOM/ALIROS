<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    include_once("include/variables.php");
    session_start();
    require 'include/user_sesion.php';

    echo "Tipo de usuario = " .global $dniusuariorecibido;
?>