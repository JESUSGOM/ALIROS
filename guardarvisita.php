<?php
    include("db.php");
    include("variables.php");
    include("user_session.php");
    header('Content-Type: text/html; charset=ISO-8859-1');

    $apellidoUno = $_POST['apeu'];
    $apellidoDos = $_POST['aped'];
    $nombre = $_POST['nom'];
    $centroDen = $_POST['den'];
    $centro = $_POST['cen'];
    $hora = $_POST['hora'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $empresa = $_POST['empresa'];
    $planta = $_POST['planta'];
    $procedencia = $_POST['procedencia'];
    $nomvisitante =  $_POST['nomvisitante'];
    $ape1Vis = $_POST['ap1visitante'];
    $ape2Vis = $_POST['ap2visitante'];
    $motivo = $_POST['motivo'];
    $vehiculo = $_POST['coche'];
    $coches = $_POST['vehi'];

    
    
    /** 
    *var_dump($empresa);
    *var_dump($vehiculo);
    *die();
    */
    /*
    echo "Primer apellido Usuario = ";
    echo $apellidoUno;
    echo nl2br(" \n ");
    echo "Segundo apellido Usuario = ";
    echo $apellidoDos;
    echo nl2br(" \n ");
    echo "Nombre Usuario = ";
    echo $nombre;
    echo nl2br(" \n ");
    echo "Nombre centro = ";
    echo $centroDen;
    echo nl2br(" \n ");
    echo "Numero centro = ";
    echo $centro;
    echo nl2br(" \n ");
    echo "Fecha = ";
    echo $fecha;
    echo nl2br(" \n ");
    echo "Hora = ";
    echo $hora;
    echo nl2br(" \n ");
    echo "Empresa = ";
    echo $empresa;
    echo nl2br(" \n ");
    echo "Planta = ";
    echo $planta;
    echo nl2br(" \n ");
    echo "Procedencia = ";
    echo $procedencia;
    echo nl2br(" \n ");
    echo "Nombre visitante = ";
    echo $nomvisitante;
    echo nl2br(" \n ");
    echo "Apellido 1 visitante = ";
    echo $ape1Vis;
    echo nl2br(" \n ");
    echo "Apellido 2 visitante = ";
    echo $ape2Vis;
    echo nl2br(" \n ");
    echo "Motivo =";
    echo $motivo;
    echo nl2br(" \n ");
    echo "Longitud fecha = ";
    echo mb_strlen($fecha);
    echo nl2br(" \n ");
    echo "Vehiculo =";
    echo $_POST['coc'];
    echo nl2br(" \n ");
    echo $coches;
    echo nl2br(" \n ");
    echo substr($fecha,0,4);
    echo substr($fecha,5,2);
    echo substr($fecha,8,2);*/
    $fechatotal = substr($fecha,0,4).substr($fecha,5,2).substr($fecha,8,2);
    /**echo nl2br(" \n ");
    echo substr($hora,0,2);
    echo substr($hora,3,2);*/
    $horatotal = substr($hora,0,2).substr($hora,3,2)."00";
    /**echo nl2br(" \n ");
    echo "Hora para guardar = ";
    echo $horatotal;
    */



    
    $query2 = "INSERT INTO Movadoj (MovCentro, MovNombre, 
    MovApellidoUno, MovApellidoDos, MovProcedencia, MovDestino, 
    MovPlanta, MovFechaEntrada, MovHoraEntrada, MovVehiculo, MovMotivo)
    VALUES ('".$centro."','".$nomvisitante."','".$ape1Vis."','".$ape2Vis."',
    '".$procedencia."','".$empresa."','".$planta."','".$fechatotal."','".$horatotal."',
    '".$coches."','".$motivo."')";
    mysqli_query($conn, $query2);

    header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroDen & num=$centro");
    





    /**if ($sqlStmt = $mysqli_prepare($conn, 'SELECT AlqEmpresa FROM Alquileres WHERE AlqId = ? LIMIT 1')) {
        // https://www.php.net/manual/es/mysqli-stmt.bind-param.php
        mysqli_stmt_bind_param($sqlStmt, 'i', $empresa);
        mysqli_stmt_execute($sqlStmt);
        mysqli_stmt_bind_result($sqlStmt, $nombreEmpresa);
        mysqli_stmt_fetch($sqlStmt);
        mysqli_stmt_close($sqlStmt);
    }*/
?>