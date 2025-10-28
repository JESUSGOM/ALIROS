<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
    if(isset($_POST['VisitasPorNombre'])){
        echo var_dump($_POST);
        echo "<br>";
        $apellidoUno = $_POST['apu'];
        $apellidoDos = $_POST['apd'];
        $nombre = $_POST['nom'];
        $numero = $_POST['num'];
        $denominacion = $_POST['cen'];
        $identifico = $_POST['ide'];$espacio = " ";
        $coma = ", ";
        $apellidoUno = $_GET['apu'];
        $apellidoDos = $_GET['apd'];
        $nombre = $_GET['nom'];
        $centroDen = $_GET['cen'];
        $centro = $_GET['num'];
        $identifico = $_GET['ide'];
        $identi = $_SESSION["usuario"];
        $denominado = $_SESSION["centroNombre"];
        $buscocadena = " ";
        $cambiocadena = "";
        $estaidentificado = strval($identifico);
        $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
        $centro = str_replace($buscocadena,$cambiocadena,$centro);
        $asunto = "Acceso a la aplicación Web";
        $elmail = "informatica@laborsordtic.org";
        $textoemail = "El compañero '" + $nom + "', ha accedido a la web Aliros. ";
        $textoemail .= "Desde '" + $centroDen + "', el día y a la hora indicadas en este correo ";
        $nombredelusuario = $usurlogu->nombre;
        $apeunodelusuario = $usurlogu->apellidoUno;
        $apedosdelusuario = $usurlogu->apellidoDos;
        $centrologueado = $usurlogu->nombreCentro;
        $numerologueado = $usurlogu->centro;
        print"<p><b>$espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $identi $espacio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
        //echo $apellidoUno;
        //echo "<br>";
        //echo $apellidoDos;
        //echo "<br>";
        //echo $nombre;
        //echo "<br>";
        //echo $numero;
        //echo "<br>";
    }
?>
<div class="container-fluid">
    <div class="row">
        <p>

        </p>
    </div>
</div>
