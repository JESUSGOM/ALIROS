<?php
    session_start();
    date_default_timezone_set('Europe/London');
    echo var_dump($_POST);
    echo "<br>";
    $nf = $_POST['nr'];
    echo "<br>";
    echo $nf;
    echo "<br>";
    $fs = $_POST['fs'];
    echo "<br>";
    echo $fs;
    $hs = $_POST['hs'];
    echo "<br>";
    echo $hs;
    
    //echo $fechaSalida = date('Ymd'); // Formato AAAAMMDD
    //echo $horaSalida = date('His'); // Formato HHMMSS
    //echo $idfila;
    echo "<br>";
    echo $fechaSalida;
    echo "<br>";
    echo $horaSalida;
    include("db.php");
    //require_once("include/header.php");
    require_once("include/variables.php");
    require_once("include/footer.php");
    //include("user_session.php");
    require 'include/PHPMailerAutoload.php';
    require 'include/class.phpmailer.php';
    //include("user_session.php");
    //
    $espacio = $_SESSION["esp"];
    $centroDen = $_SESSION["den"];
    $estaidentificacion = $_SESSION["iden"];
    $apellidoUno = $_SESSION["apu"];
    $apellidoDos = $_SESSION["apd"];
    $nombre = $_SESSION["nom"];
    $coma = $_SESSION["coma"];
    $numero = $_SESSION["num"];
    $centros = $numero;
    $identifico = $_SESSION["ide"];
    //
    $espacio = " ";
    $coma = ", ";
    $registro = $_POST['registro'];
    $elreg = intval($registro);
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    //echo nl2br(" \n ");
    //echo "usuario que recibo = ";
    //echo $usuariorecibido;
    //echo nl2br(" \n ");
    //echo "tipo de fecha = ";
    //echo gettype($fecha);
    //echo nl2br(" \n ");
    //echo "tipo de hora = ";
    //echo gettype($hora);
    //echo nl2br(" \n ");
    //echo $registro;
    //echo nl2br(" \n ");
    //echo $fecha;
    //echo nl2br(" \n ");
    //echo $hora;
    //echo nl2br(" \n ");
    $fecha2 = substr($fecha,0,4) . substr($fecha,5,2) . substr($fecha,8,2);
    //echo $fecha2;
    $hora2 = substr($hora,0,2) . substr($hora,3,2) . "00";
    //echo nl2br(" \n ");
    //echo $hora2;
    //echo var_dump($_POST);
    $elnumero = intval($registro);
    //$conn = mysqli_connect('mysql-5705.dinaserver.com', 'Conacelbs','C0n@celbs','Conlabac');
    
    
    mysqli_set_charset($conn, "utf8");
    if($conn === false){
        echo "Fallo en la conexión";
        echo mysqli_connect_errno();
    } else {
        $q = $conn->prepare("UPDATE Movadoj SET MovFechaSalida = ?, MovHoraSalida = ? WHERE MovOrden = ?");
        $q->bind_param('ssi',$fs, $hs, $nf);
        $q->execute();
        printf("%d Fila insertada ", $q->affected_rows );
        $q->close();
        //echo "priner apellido = ".$apellidoUno;
        //echo "<br> \n";
       // echo "segundo apellido = ".$apellidoDos;
        //echo "<br> \n";
        //echo "nombre = ". $nombre;
        //echo "<br> \n";
        //echo "denominacion del centro = ".$centroDen;
        //echo "<br> \n";
        //echo "numero del centro = ".$centros;
        //sleep(25);
        
        
        
        
    }
    header("location: principalsuper.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroDen & num=$centros");

?>