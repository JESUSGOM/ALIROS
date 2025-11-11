<?php
    include("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    include("user_session.php");
    require 'include/PHPMailerAutoload.php';
    require 'include/class.phpmailer.php';
    include("user_session.php");
    //var_dump($_POST);
    session_start();
    $identifico = $_POST['ide'];
    $use = $_SESSION['user'];
    $apell1 = $_POST['apu'];
    $apell2 = $_POST['apd'];
    $nombre = $_POST['nom'];
    $centro = $_POST['cen'];
    $numero = $_POST['num'];
    $fecha = $_POST['fecha2'];
    $hora = $_POST['hora2'];
    $registro = $_POST['registro'];
    $forma = $_POST['formacomunicado'];
    $fecha2 = substr($fecha,0,4) . substr($fecha,5,2) . substr($fecha,8,2);
    $hora2 = substr($hora,0,2) . substr($hora,3,2) . "00";
    /** echo nl2br(" \n ");
    echo "Fecha rectificada = ";
    echo $fecha2;
    echo nl2br(" \n ");
    echo "Hora rectificada = ";
    echo $hora2;
    echo nl2br(" \n ");
    echo "Fecha recibida = ";
    echo $fecha;
    echo nl2br(" \n ");
    echo "Hora recibida = ";
    echo $hora;
    echo nl2br(" \n ");
    echo "Registro a modificar = ";
    echo $numero;
    echo nl2br(" \n ");
    echo gettype($numero);
    echo nl2br(" \n ");*/
    $comunicado = "Si";
    //echo nl2br(" \n ");
    $elregistro = intval($registro);
    /**echo $elregistro;
    echo nl2br(" \n ");
    echo $registro;
    echo nl2br(" \n ");
    echo gettype($elregistro);
    echo nl2br(" \n ");
    echo "Usuario = ";
    echo $use;
    echo nl2br(" \n ");
    echo $comunicado;
    echo nl2br(" \n ");
    echo $forma;*/
    //$nom2 = substr($nombre,0,9);
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
    mysqli_set_charset($conn, "utf8");
    if($conn === false){
        echo "Fallo en la conexión";
        echo mysqli_connect_errno();
    } else {
        $z = "UPDATE Paqueteria SET PktComunicado = '" .$comunicado. "', PktFechaComunicacion = '" .$fecha2. "', PktHoraComunicacion = '" .$hora2. "', PktOperarioComunica = '" .$use. "', 	PktTipoComunicado = '" .$forma. "' WHERE PktId = '".$elregistro."' ";
        $rs = mysqli_query($conn, $z);
    }
    
    header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$nombre & cen=$centro & num=$numero & ide=$identifico");
?>