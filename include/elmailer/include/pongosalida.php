<?php
    include("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    include("user_session.php");
    require 'include/PHPMailerAutoload.php';
    require 'include/class.phpmailer.php';
    include("user_session.php");
    $espacio = " ";
    $coma = ", ";
    $registro = $_POST['registro'];
    $elreg = intval($registro);
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $apellidoUno = $_POST['apu'];
    $apellidoDos = $_POST['apd'];
    $nombre = $_POST['nom'];
    $centroden = $_POST['cen'];
    $numero = $_POST['num'];
    echo nl2br(" \n ");
    echo "tipo de fecha = ";
    echo gettype($fecha);
    echo nl2br(" \n ");
    echo "tipo de hora = ";
    echo gettype($hora);
    echo nl2br(" \n ");
    echo $registro;
    echo nl2br(" \n ");
    echo $fecha;
    echo nl2br(" \n ");
    echo $hora;
    echo nl2br(" \n ");
    $fecha2 = substr($fecha,0,4) . substr($fecha,5,2) . substr($fecha,8,2);
    echo $fecha2;
    $hora2 = substr($hora,0,2) . substr($hora,3,2) . "00";
    echo nl2br(" \n ");
    echo $hora2;
    echo var_dump($_POST);
    $elnumero = intval($registro);
    //$conn = mysqli_connect('mysql-5705.dinaserver.com', 'Conacelbs','C0n@celbs','Conlabac');
    mysqli_set_charset($conn, "utf8");
    if($conn === false){
        echo "Fallo en la conexión";
        echo mysqli_connect_errno();
    } else {
        $q = $conn->prepare("UPDATE Movadoj SET MovFechaSalida = ?, MovHoraSalida = ? WHERE MovOrden = ?");
        $q->bind_param('ssi',$fecha2, $hora2, $elreg);
        $q->execute();
        printf("%d Fila insertada ", $q->affected_rows );
        $q->close();
        //$query = "UPDATE Movadoj SET MovFechaSalida = '" .$fecha2. "' AND MovHoraSalida = '" .$hora2. "' WHERE MovOrden = '" .$registro. "'";    
        header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroden &num=$numero");
    }
    

?>