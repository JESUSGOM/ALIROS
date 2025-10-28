<?php
    require_once("db.php");
    require_once("variables.php");

    $esmesano = "202201%";
    $tratocento = "1";
    $TT = "SELECT * FROM Movadoj WHERE MovCentro = '" .$tratocento. "' AND MovFechaEntrada LIKE '" .$esmesano. "' ";
    $rst = mysqli_query($conn, $TT);
    $totalvisitas = mysqli_num_rows($rst);
    $qq = "SELECT DISTINCT MovDestino FROM Movadoj WHERE MovCentro = '" .$tratocento. "' AND MovFechaEntrada LIKE '" .$esmesano."' ";
    $resultad2 = mysqli_query($conn, $qq);
    //$totalvisitas = mysqli_num_rows($resultad2);
    while($mostrar = mysqli_fetch_row($resultad2)){
        //$totalvisitas = mysqli_num_rows($resultad2);
        echo nl2br("\n");
        echo "Total visitas recibidas = ".$totalvisitas;
        echo nl2br("\n");
        $eldestino = $mostrar[0];
        echo nl2br("\n");
        echo "Destino de la visita recibida = ".$eldestino;
        $vv = "SELECT * FROM Movadoj WHERE MovDestino = '".$eldestino."' AND MovFechaEntrada LIKE '".$esmesano."' ";
        $mivv = mysqli_query($conn,$vv);
        $veces = mysqli_num_rows($mivv);
        echo nl2br("\n");
        echo "Numero de visitas recibidas de este destino = ".$veces;
        $elpeso = round(($veces / $totalvisitas *100),2);
        echo nl2br("\n");
        echo "Porcentaje de visitas recibidas de este destino = ".$elpeso;
    }
?>