<?php
    include("db.php");
    include("variables.php");
    include("user_session.php");
    require "include/Exception.php";
    require "include/PHPMailer.php";
    require "include/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


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
    $emisor = $_POST["emisor"];
    $receptor = $_POST["receptor"];
    $textoemail = $_POST["mensaje"];
    $elmail = $_POST["emilio"];
    $asunto = "Llamada telefónica recibida para usted en la conserjería del ITC";
    var_dump($_POST);
    if($email==""){
        $ql = "INSERT INTO Telefonos (TelCentro, TelFecha, TelHora, TelEmisor, TelDestinatario, TelMensaje, TelComunicado) 
        VALUES ('".$numero."', '".$fechatotal."', '".$lahora."', '".$emisor."', '".$receptor."', '".$textoemail."', 0) ";
        mysqli_query($conn, $ql);
    } else {
        $ql = "INSERT INTO Telefonos (TelCentro, TelFecha, TelHora, TelEmisor, TelDestinatario, TelMensaje, TelComunicado, TelFechaEntrega, TelHoraEntrega) 
        VALUES ('".$numero."', '".$fechatotal."', '".$lahora."', '".$emisor."', '".$receptor."', '".$textoemail."', 1, '".$fechatotal."', '".$lahora."') ";
        mysqli_query($conn, $ql);    
    }
    

    if($email<>""){
        $sl = "INSERT INTO EnvioEmail (EnEmDestinatario, EnEmFecha, EnEmHora, EnEmTexto, EnEmEmisor) VALUES ('".$receptor."','".$fechatotal."','".$lahora."','".$textoemail."','".$nom."')";
        mysqli_query($conn, $sl);
        if(isset($_POST['llamada'])){
            require 'include/PHPMailerAutoload.php';
            require 'include/class.phpmailer.php';
            $mail = new PHPMailer;
            $mail->Mailer = 'smtp';
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            $mail->Username='conserjeriaitc@gmail.com';
            $mail->Password='B38501292';
            $mail->From = 'conserjeriaitc@gmail.com';
            $mail->FromName = $_POST['nom'];
            $mail->Timeout=30;
            $mail->addAddress($_POST['emilio']);
            $mail->isHTML(true);
            $mail->Subject='Aviso de llamda telefónica desde '.$_POST['cen'];
            $cuerpo = "Se ha recibido una llamada telefónica de: ";
            $cuerpo .= $_POST['emisor'];
            $cuerpo .= ', para ';
            $cuerpo .= $_POST['receptor'];
            $cuerpo .= '. \n )';
            $cuerpo .= 'Y le ha dejado un mensaje que dice: ';
            $cuerpo .= $_POST['mensaje'];

            $mail->Body= $cuerpo;
            $mail->AltBody = $cuerpo;
            $exito = $mail->send();
            while(!$exito){
                echo $mail->ErrorInfo;
            }
            if(!$mail->send()){
                $result="Algo esta mal, por favor inténtelo de nuevo.";
            } 
        }
    }
    
    header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$nom & cen=$cenden & num=$numero");
    
?>