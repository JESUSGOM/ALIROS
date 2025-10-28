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
    $identifico = $_POST['ide'];
    $apell1 = $_POST['apu'];
    $apell2 = $_POST['apd'];
    $nombre = $_POST['nom'];
    $centro = $_POST['cen'];
    $numero = $_POST['num'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $emilio = $_POST['emilio'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $fecha2 = substr($fecha,0,4) . substr($fecha,5,2) . substr($fecha,8,2);
    $hora2 = substr($hora,0,2) . substr($hora,3,2) . "00";
    $remite = $nombre;
    $remite += " ";
    $remite += $apell1;
    
    $textocompleto = $asunto. " <-> " .$mensaje;
    $asunto = utf8_decode($asunto);
    $mensaje = utf8_decode($mensaje);
    $textocompleto = utf8_decode($textocompleto);
    
    session_start();
    $usu = $_SESSION["usuario"];
    $nombreusuario = $_SESSION["nombre"];
    $nombreusuario = utf8_decode($nombreusuario); 
    $apeunousuario = $_SESSION["apellidoUno"];
    $apeunousuario = utf8_decode($apeunousuario);
    $apedosusuario = $_SESSION["apellidoDos"];
    $apedosusuario = utf8_decode($apedosusuario);
    $nomb = $nombreusuario." ".$apeunousuario." ".$apedosusuario;
    $nombre = utf8_decode($nombre);

    
    $tt = "INSERT INTO EnvioEmail (EnEmDestinatario, EnEmFecha, EnEmHora, EnEmTexto, EnEmEmisor) 
    VALUES ('".$emilio."','".$fecha2."','".$hora2."','".$textocompleto."','".$identifico."')";
    mysqli_query($conn, $tt);

    //mail($emilio, $asunto, $mensaje, $cabecera);

    $mail = new PHPMailer;
    $mail->Mailer = 'smtp';
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='conserjeriaitc@gmail.com';
    $mail->Password='B38501292';
    $mail->From = 'conserjeriaitc@gmail.com';
    $mail->FromName = utf8_decode($_POST['nom']);
    $mail->Timeout=30;
    $mail->addAddress($emilio);
    $mail->isHTML(true);
    $mail->Subject=$asunto;
    $cuerpo2 = $textocompleto;
   

    $mail->Body= $cuerpo2;
    $mail->AltBody = $cuerpo2;
    $exito = $mail->send();
    /*
    while(!$exito){
        echo $mail->ErrorInfo;
    }
    */

    //header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$nombre & cen=$centro & num=$numero");
    //header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$nombre & cen=$cenden & num=$numero");
?>
<script>
    
    window.location="https://jfgb.es/aliros";
</script>