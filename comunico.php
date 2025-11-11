<?php
    include("user_session.php");
    require_once("db.php");
    require_once("variables.php");
   

    if($_POST['comunico']){
        //echo var_dump($_POST);
        $apel1 = $_POST['apu'];
        $apel2 = $_POST['ape'];
        $nom = $_POST['nom'];
        $cenden = $_POST['cen'];
        $numero = $_POST['num'];
        $registro = $_POST['registro'];
        $regis = intval($registro);
        $comunicado = 1;
        //echo nl2br(" \n ");
        //echo "Tipo de variabla de numero de registro = " .gettype($registro);
        //echo nl2br(" \n ");
        //echo gettype($regis);
        $hora2 = $_POST['hora2'];
        $fecha2 = $_POST['fecha2'];
        $fech2 = date("Ymd");
        $fechas2 = substr($fecha2,0,4) . substr($fecha2,5,2) . substr($fecha2,8,2);
        $lahora2 = substr($hora2,0,2) . substr($hora2,3,2) . "00";
        //echo nl2br(" \n ");
        //echo $lahora2; 
        //echo nl2br(" \n ");
        //echo "Tipo de variable lahora2 = " .gettype($lahora2);
        //echo nl2br(" \n ");
        //echo "Tipo de variable fechas2 = " .gettype($fechas2);
        //echo nl2br(" \n ");
        //echo $fechas2;
        //echo nl2br(" \n ");
        //echo "Tipo de variable hora2 = " .gettype($hora2);
        //echo nl2br(" \n ");
        //echo $hora2;
        //echo nl2br(" \n ");
        //echo "Tipo de variable fecha2 = " .gettype($fecha2);
        //echo nl2br(" \n ");
        //echo $fecha2;
        //$r = "UPDATE Telefonos 
        //SET (TelComunicado = 1, TelFechaEntrega = '" .$fechas2. "', TelHoraEntrega = '" .$lahora2. "' WHERE TelId = '" .$regis. "' ");
        //$r->execute();
        $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
        mysqli_set_charset($conn, "utf8");
        $t = "UPDATE Telefonos SET TelComunicado = '" .$comunicado. "', 
        TelFechaEntrega = '" .$fechas2. "', 
        TelHoraEntrega = '" .$lahora2. "' WHERE TelId = '".$regis."' ";
        mysqli_query($conn, $t);
        //$s = $conn->prepare("UPDATE Telefonos SET TelComunicado = ?, TelFechaEntrega = $?, TelHoraEntrega = ? WHERE TelID = ?");
        //$s->bind_param('issi', $comunicado, $fechas2, $lahora2, $regis);
        //$s->execute();
    }
    header("location: principal.php?apu=$apel1 & apd=$apel2 & nom=$nom & cen=$cenden &num=$numero");
?>