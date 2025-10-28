<?php
    include("db.php");
    include("variables.php");
    include("user_session.php");
    header('Content-Type: text/html; charset=ISO-8859-1');

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
    $fecha = date("Ymd");
    $lahora = substr($hora,0,2).substr($hora,3,2)."00";
    $fechatotal = substr($esfecha,0,4).substr($esfecha,5,2).substr($esfecha,8,2);
    var_dump($_POST);
    print "<p>$apel1 $apel2 $nom $cenden $apellidoUno $apellidoDos $nombre $fechatotal $lahora $numero $regis</p>";
    $q = $conn->prepare("UPDATE KeyMoves SET KeyFechaRecepcion = ?, KeyHoraRecepcion = ? WHERE KeyOrden = ?");
    $q->bind_param('ssi',$fechatotal, $lahora, $regis);
    $q->execute();
   
    header("location: principal.php?apu=$apel1 & apd=$apel2 & nom=$nom & cen=$cenden &num=$numero");


    
?>