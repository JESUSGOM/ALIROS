<?php

    include("db.php");
    //require_once("include/header.php");
    require_once("variables.php");
    //require_once("include/footer.php");
    include("user_session.php");
    //require 'include/PHPMailerAutoload.php';
    //require 'include/class.phpmailer.php';
    include("user_session.php");
    session_start();
    $usu = $_SESSION["usuario"];
    echo nl2br(" \n ");
    echo $_SESSION["nombre"];
    $usuariosesion = $_SESSION["usuario"];
    $nombreusuario = $_SESSION["nombre"];
    $apeunousuario = $_SESSION["apellidoUno"];
    $apedosusuario = $_SESSION["apellidoDos"];
    var_dump($_POST);
    $apelunousuario = $_POST['apu'];
    $apeldosusuario = $_POST['apd'];
    $nombredelusuario = $_POST['nom'];
    $centro = $_POST['cen'];
    $numero = $_POST['num'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $emisor = $_POST['emisor'];
    $destino = $_POST['destinatario'];
    $mensajero = $_POST['mensajeria'];
    $bultos = $_POST['bultos'];
    $tipo = $_POST['tipo'];
    $comunicado = $_POST['comunicado'];
    $forma = $_POST['formacomunicado'];
    $fechac = $_POST['fecha2'];
    $horac = $_POST['hora2'];
    /*
    echo nl2br(" \n ");
    echo "Usuario.: ";
    echo $usu;
    echo nl2br(" \n ");
    echo "Nombre Usuario de sesión = ";
    echo $usuariosesion;
    echo nl2br(" \n ");
    echo "Apellido Uno Usuario de sesión = ";
    echo $apeunousuario;
    echo nl2br(" \n ");
    echo "Apellido Dos Usuario de sesión = ";
    echo $apedosusuario;
    echo nl2br(" \n ");
    echo "Apellido Uno del Post = ";
    echo $apelunousuario;
    echo nl2br(" \n ");
    echo "Apellido Dos del Post = ";
    echo $apeldosusuario;
    echo nl2br(" \n ");
    echo "Nombre del Post =";
    echo $nombredelusuario;
    echo nl2br(" \n ");
    echo "Centro = ";
    echo $centro;
    echo nl2br(" \n ");
    echo "Numero = ";
    echo $numero;
    echo nl2br(" \n ");
    echo "Fecha de recepción = ";
    echo $fecha;
    echo nl2br(" \n ");
    echo "Hora de recepción = ";
    echo $hora;
    echo nl2br(" \n ");
    echo "Emisor de la correspondencia = ";
    echo $emisor;
    echo nl2br(" \n ");
    echo "Destinatario de la correspondencia = ";
    echo $destino;
    echo nl2br(" \n ");
    echo "Mensajería = ";
    echo $mensajero;
    echo nl2br(" \n ");
    echo "Número de bustos = ";
    echo $bultos;
    echo nl2br(" \n ");
    echo "Tipo de bultos = ";
    echo $tipo;
    echo nl2br(" \n ");
    echo "Comunicado? = ";
    echo $comunicado;
    echo nl2br(" \n ");
    echo "Forma de comunicación = ";
    echo $forma;
    echo nl2br(" \n ");
    echo "Fecha de comunicación = ";
    echo $fechac;
    echo nl2br(" \n ");
    echo "Hora de comunicación = ";
    echo $horac;
    echo nl2br(" \n ");
    echo "Fecha de recepción corregida = ";
    $fechacorregeida = substr($fecha,0,4).substr($fecha,5,2).substr($fecha,8,2);
    echo $fechacorregeida;
    echo nl2br(" \n ");
    echo "Hora de recepcion corregida = ";
    $horacorregida = substr($hora,0,2) . substr($hora,3,2) . "00";
    echo $horacorregida;
    echo nl2br(" \n ");
    echo "Fecha de entrega corregida = ";
    $fechaentregacorregida = substr($fechac,0,4).substr($fechac,5,2).substr($fechac,8,2);
    echo $fechaentregacorregida;
    echo nl2br(" \n ");
    echo "Hora de entrega corregida = ";
    $horaentregacorregida = substr($horac,0,2) . substr($horac,3,2) . "00";
    echo $horaentregacorregida;
    echo nl2br(" \n ");
    */
    $fechacorregeida = substr($fecha,0,4).substr($fecha,5,2).substr($fecha,8,2);
    $horacorregida = substr($hora,0,2) . substr($hora,3,2) . "00";
    $fechaentregacorregida = substr($fechac,0,4).substr($fechac,5,2).substr($fechac,8,2);
    $horaentregacorregida = substr($horac,0,2) . substr($horac,3,2) . "00";
    //echo $horacorregida;
    $numeroentero = intval($numero);
    $nunbultos = intval($bultos);
    if($comunicado == "No"){
        $y = "INSERT INTO Paqueteria (PktCentro, PktFecha, PktHora, PktEmisor, PktDestinatario, PktMensajeria, PktBultos, PktTipo, PktComunicado, PktOperario) 
        VALUES ('".$numeroentero."','".$fechacorregeida."','".$horacorregida."','".$emisor."','".$destino."','".$mensajero."','".$nunbultos."','".$tipo."','".$comunicado."','".$usu."')";
        mysqli_query($conn, $y);
    }
    if($comunicado == "Si"){
        if($fechaentregarecogida <> ""){
            $z = "INSERT INTO Paqueteria (PktCentro, PktFecha, PktHora, PktEmisor, PktDestinatario, PktMensajeria, PktBultos, PktTipo, PktComunicado, PktOperario, 
            PktOperarioCominica, PktTipoComunicado, PktFechaComunicacion, PktHoraComunicacion) 
            VALUES ('".$numeroentero."','".$fechacorregeida."','".$horacorregida."','".$emisor."','".$destino."','".$mensajero."','".$nunbultos."','".$tipo."','".$comunicado."','".$usu."','".$usu."', '".$forma."','".$fechaentregacorregida."','".$horaentregacorregida."')";
            mysqli_query($conn, $z);
        }
        if($fechaentregacorregida == ""){
            $comunicado = "No";
            $z = "INSERT INTO Paqueteria (PktCentro, PktFecha, PktHora, PktEmisor, PktDestinatario, PktMensajeria, PktBultos, PktTipo, PktComunicado, PktOperario,) 
            VALUES ('".$numeroentero."','".$fechacorregeida."','".$horacorregida."','".$emisor."','".$destino."','".$mensajero."','".$nunbultos."','".$tipo."','".$comunicado."','".$usu."')";
            mysqli_query($conn, $z);    
        }
        
    }
    header("location: principal.php?apu=$apeunousuario & apd=$apedosusuario & nom=$nombreusuario & cen=$centro &num=$numero");
    



?>