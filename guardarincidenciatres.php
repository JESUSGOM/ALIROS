<?php
    include_once (__DIR__ . DIRECTORY_SEPARATOR . 'db.php');
    include_once (__DIR__ . DIRECTORY_SEPARATOR . 'variables.php');
    include_once (__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'user_sesion.php');

    // Esto es necesario para poder incluír el directorio del PHPMailer en el `include_path` de PHP
    $includePath = get_include_path();
    set_include_path($includePath . ':'. getcwd() . DIRECTORY_SEPARATOR .'include'.DIRECTORY_SEPARATOR.'elmailer'.DIRECTORY_SEPARATOR.'src');

    // Para compatibilizar con versiones que utilicen autoload
    use PHPMailer\PHPmailer\PHPMailer;
    use PHPMailer\PHPmailer\Exception;
    use PHPMailer\PHPmailer\SMTP;
    require_once('PHPMailer.php');
    require_once('Exception.php');
    require_once('SMTP.php');

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

    /* echo $lafecha;
    echo "<br/>";
    echo $lahora;
    echo "<br/>";
    echo $eltexto;
    echo "<br/>";
    echo $elnombre;
    echo "<br/>";
    echo $apell1;
    echo "<br/>";
    echo $apell2;
    echo "<br/>";
    echo $elcentro;
    echo "<br/>";
    echo $cenden;
    echo "<br/>";
    echo $identifico;
    echo "<br/>"; */

    $asunto = "";
    $usuariocorreo = "";
    $clavecorreo = "";
    $destinatario = "adominguez@itccanarias.org";
    $nombredestinatario = "Dª Adriana Domínguez Sicilia";
    $destinatario2 = "conserjeriaitc.gc@grupoenvera.org";
    $nombredestinatario2 = "Conserjeria ITC Gran Canaria";
    /* $destinatario = "adewilde@itccanarias.org";
    $nombredestinatario = "Dº Alejandro de Wilde Calero"; */
    $copiauno = "cbetancor@itccanarias.org";
    $nombrecopiauno = "Dª Carmen Betancor Reula";
    $copiados = "adominguez@itccanarias.org";
    $nombrecopiados = "Adriana Domínguez Sicilia";
    $copiatres = "jquintana@itccanarias.org";
    $nombrecopiatres = "Dº José R. Quintana";
    $copiacuatro = "jfgb@jfgb.es";
    $nombrecopiacuatro = "Dª Eliana Súarez cambiar por Envera.";
    $copiaoculta = "informaticaitc@jfgb.es";
    $nombrecopiaoculta = "Jesús Gómez";


    $remitente = $elnombre . " " . $apell1 . " " .$apell2;
    $eslafecha = substr($lafecha,0,4).substr($lafecha,5,2).substr($lafecha,8,2);
    $eslahora = substr($lahora,0,2).substr($lahora,3,2)."00";
    echo $remitente;
    echo "<br/>";
    echo $eslafecha;
    echo "<br/>";
    echo $eslahora;
    echo "<br/>";
    if($elcentro == "1"){
        $asunto = "Comunicado de incidencia desde la conserjería del ITC en Tenerife";
        $usuariocorreo = "incidenciasitctf@jfgb.es";
        $clavecorreo = "Enver@2025";
        /* echo "<br/>";
        echo $usuariocorreo;
        echo "<br/>";
        echo $elcentro; */
    }
    if($elcentro == "2"){
        $asunto = "Comunicado de incidencia desde la conserjería del ITC en Gran Canaria";
        $usuariocorreo = "incidenciasitcgc@jfgb.es";
        $clavecorreo = "Envera2025";
        /* echo "<br/>";
        echo $usuariocorreo;
        echo "<br/>";
        echo $elcentro; */
    }

    //Create a new PHPMailer instance
    $mail = new PHPMailer();

    $mail->isSMTP();
    //$mail->Host = "smtp.office365.com";
    $mail->Host = "localhost";
    $mail->Port = 25;
    //$mail->SMTPSecuer = "tls";
    //$mail->SMTPAuth = true;
    $mail->Username = $usuariocorreo;
    $mail->Password = $clavecorreo;
    $mail->setFrom($usuariocorreo, $remitente);
    $mail->addAddress($destinatario2, $nombredestinatario2);
    $mail->Subject = $asunto;
    $mail->Body = $eltexto;
    $mail->AltBody = $eltexto;
    $mail->CharSet = 'utf-8';
    //$mail->addCC($copiauno, $nombrecopiauno);
    //$mail->addCC($copiados, $nombrecopiados);
    //$mail->addCC($copiatres, $nombrecopiatres);
    //$mail->addCC($copiacuatro, $nombrecopiacuatro);
    $mail->addBCC($copiaoculta, $nombrecopiaoculta);
    /* if(!$mail->send()){
        echo 'No se pudo envair el mensaje '.$mail->ErrorInfo . "-" . $mail->errors;
    } else {
        echo 'Mensaje enviado correctamente';
    } */

    $mail->send();

    $elcentro = intval($elcentro);
    $modo = "EMAIL";
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
    mysqli_set_charset($conn, "utf8");
    $q = "INSERT INTO Incidencias 
    (IncCentro, IncFecha, IncHora, IncTexto, IncComunicadoA, 
    IncModoComunica, IncEmailComunica)
    VALUES 
    ('".$elcentro."','".$eslafecha."','".$eslahora."','".$eltexto."','".$nombredestinatario."','".$modo."','".$destinatario."')";
    mysqli_query($conn, $q);


    $z = "INSERT INTO EnvioEmail (EnEmDestinatario, EnEmFecha, EnEmHora, EnEmTexto, EnEmEmisor) 
    VALUES ('".$destinatario."','".$eslafecha."','".$eslahora."','".$eltexto."','".$identifico."')";
    mysqli_query($conn, $z);  
    

    header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$elnombre & cen=$cenden & num=$elcentro & ide=$identifico");

?>
