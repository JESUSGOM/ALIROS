<?php
    //libreria
    require 'PHPMailer-52/PHPMailerAutoload.php';

    //Datos recibidos
    // Get Variables from the request.
    $lafecha = filter_input(INPUT_POST, 'fecha', FILTER_SANITIZE_STRING);
    $lahora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
    $eltexto = filter_input(INPUT_POST, 'areadetexto', FILTER_SANITIZE_STRING);
    $elnombre = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $apell1 = filter_input(INPUT_POST, 'apu', FILTER_SANITIZE_STRING);
    $apell2 = filter_input(INPUT_POST, 'apd', FILTER_SANITIZE_STRING);
    $elcentro = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_STRING);
    $cenden = filter_input(INPUT_POST, 'cen', FILTER_SANITIZE_STRING);
    $identifico = filter_input(INPUT_POST, 'ide', FILTER_SANITIZE_STRING);
    $espacio = " ";
    $nombreremitente = $apell1.$espacio.$apell2.$espacio.$elnombre;
    

    //Configuración del servicor mail
    if($elcentro == "1"){
        $asunto = "Comunicado de incidencia desde la conserjería del ITC en Tenerife";
        $usuariocorreo = "conserjeriaitc.tf@grupoenvera.org";
        $clavecorreo = "Envera2025";
    }
    if($elcentro == "2"){
        $asunto = "Comunicado de incidencia desde la conserjería del ITC en Gran Canaria";
        $usuariocorreo = "conserjeriaitc.gc@grupoenvera.org";
        $clavecorreo = "Envera2025";
    }

    //Creamos una nueva instancia de PHPMailer.
    $mail = new PHPMailer();
    $mail->isSMTP();  
    $mail->From($usuariocorreo, $nombreremitente);
    $mail->SMTPAuth = true;
    $mail->SMTPSecuer = "tls";
    $mail->Host = "smpt.office365.com";
    $mail->Port = 587;
    $mail->Username = $usuariocorreo;
    $mail->Password = $clavecorreo;
    $mail->AddAddress("jesusfgomezb@gmail.com");
    $mail->Subject = $asunto;
    $mail->Body = $eltexto;
    if($mail->Send()){
        echo '<script type="text/javascript">
            alert("Enviado Correctamente");
        </script>';
    } else {
        echo '<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
        </script>';
    }
?>