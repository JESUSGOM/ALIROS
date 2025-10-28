<?php
    //include("user_session.php");
    //require "include/Exception.php";
    //require "include/PHPMailer.php";
    //require "include/SMTP.php";
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    
    //echo var_dump($_POST);

    session_start();
    $identifico = $_POST["ide"];
    $apel1 = $_POST["apu"];
    $apel2 = $_POST["apd"];
    $nom = $_POST["nom"];
    $cenden = $_POST["cen"];
    $numero = $_POST["num"];
    $apellidoUno = $_POST["apell1"];
    $apellidoDos = $_POST["apell2"];
    $nombre = $_POST["nombre"];
    $hora = $_POST["hora"];
    $regis = $_POST["registro"];
    $esfecha = $_POST["fecha"];
    $estaidentificado = strval($identifico);
    $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
    
    $fecha = date("Ymd");
    $lahora = substr($hora,0,2).substr($hora,3,2)."00";
    $fechatotal = substr($esfecha,0,4).substr($esfecha,5,2).substr($esfecha,8,2);
?>