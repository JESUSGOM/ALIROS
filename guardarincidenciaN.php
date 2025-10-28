<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    include dirname(__DIR__) .'PHPMailer/src/PHPMailer.php';
    include dirname(__DIR__) .'PHPMailer/src/SMTP.php';
    include dirname(__DIR__) .'PHPMailer/src/Exception.php';
    include("db.php");
    include("variables.php");
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/SMTP.php';
    session_start();
    //echo var_dump($_POST);
    $lafecha = $_POST['fecha'];
    $lahora =  $_POST['hora'];
    $centro = $_POST['num'];
    $apu = $_POST['apu'];
    $apd = $_POST['apd'];
    $nom = $_POST['nom'];
    $cen = $_POST['cen'];
    $ide = $_POST['ide'];
    $areatexto = $_POST['areadetexto'];
    $incidencia = $_POST['indicencia'];
    //echo nl2br(" \n ");
    $eslafecha = substr($lafecha,0,4).substr($lafecha,5,2).substr($lafecha,8,2);
    //echo "Fecha = " .$eslafecha;
    //echo nl2br(" \n ");
    $eslahora = substr($lahora,0,2).substr($lahora,3,2)."00";
    //echo nl2br(" \n ");
    //echo "Hora = " .$eslahora;
    //echo nl2br(" \n ");
    //echo gettype($centro);
    //echo nl2br(" \n ");
    //echo "Centro = " .$centro;
    //echo nl2br(" \n ");
    $elnumero = intval($centro);
    //echo nl2br(" \n ");
    //echo gettype($cen);
    //echo nl2br(" \n ");
    //echo "Nombre del Centro = " .$cen;
    $espacio = " ";
    $coma = ", ";
    $denombre = $apu . $espacio . $apd . $coma . $nom;
    //echo nl2br(" \n ");
    //echo "Usuario = " .$denombre;
    //echo nl2br(" \n ");
    //echo "Identificador = " .$ide;
    //echo nl2br(" \n ");
    //echo "Texto = " . $areatexto;
    //echo nl2br(" \n ");
    //echo "Incidencia = " . $incidencia;
    //echo nl2br(" \n ");
    $emilio = "";
    $emilio2 = "";
    try{
        $elmail = new PHPMailer(true);
        $elmail->isSMTP();                                      // Configura el mailer para usar SMTP
        $elmail->Host = 'smtp.office365.com';                   // Especifica el servidor SMTP
        $elmail->SMTPAuth = true;                               // Habilita la autenticación SMTP
        $elmail->SMTPSecure = 'tls';
        $elmail->Port = 587;
        $elmail->CharSet = 'UTF-8';
        $elmail->SMTPDebug = 0;
        $elmail = new PHPMailer(true);
        $elmail->isSMTP();                                      // Configura el mailer para usar SMTP
        $elmail->Host = 'smtp.office365.com';                   // Especifica el servidor SMTP
        $elmail->SMTPAuth = true;                               // Habilita la autenticación SMTP
        $elmail->SMTPSecure = 'tls';
        $elmail->Port = 587;
        $elmail->CharSet = 'UTF-8';
        $elmail->SMTPDebug = 0;
        if($elnumero == 1){
            $emilio = "cbetancor@itccanarias.org";
            $emilio2 = "María Carmen Betancor Reula";
            $asunto = "Comunicación de Incidencia desde la conserjería del ITC en Tenerife.";
            $elmail->Username = 'conserjeriaitc.tf@grupoenvera.org';// Tu dirección de correo electrónico completa de Microsoft 365
            $elmail->Password = 'Envera2025';                       // La contraseña asociada a tu dirección de correo electrónico de Microsoft 365
            $elmail->setFrom('conserjeriaitc.tf@grupoenvera.org', $nom);
            $elmail->addCC('adelaida.gomez@grupoenvera.org','Maria Adelaida Gomez Corujo');
            //$elmail->addCC('conserjeriaitc.tf@grupoenvera.org');
            //$elmail->addCC('juanluis.hernandez@grupoenvera.org', 'Juan Luis Hernández Pérez');
            $elmail->addBCC('informaticaitc@jfgb.es','Jesus Gomez');
            $elmail->Subject = $asunto;
            $elmail->addReplyTo('conserjeriaitc.tf@grupoenvera.org', $nom);
            $elmail->addAddress($emilio, $emilio2);
            $elmail->Body = $areatexto;
            $elmail->AltBody = $areatexto;
        }
        if($elnumero == 2){
            $emilio = "adominguez@itccanarias.org";
            $emilio2 = "Adriana Dominguez Sicilia";
            $asunto = "Comunicación de Incidencia desde la conserjería del ITC en Las Palmas.";
            $elmail->Username = 'conserjeriaitc.gc@grupoenvera.org';
            $elmail->Password = 'Envera2025';
            $elmail->setFrom('conserjeriaitc.gc@grupoenvera.org', $nom);
            $elmail->addCC('josea.henriquez@grupoenvera.org', 'Jose A. Henriquez Benitez');
            $elmail->addCC('conserjeriaitc.gc@grupoenvera.org');
            $elmail->addCC('jiglesias@itccanarias.org', 'Jose Iglesias Florido');
            $elmail->addBCC('informaticaitc@jfgb.es','Jesus Gomez');
            $elmail->Subject = $asunto;
            $elmail->addReplyTo('conserjeriaitc.gc@grupoenvera.org', $nom);
            $elmail->addAddress($emilio, $emilio2);
            $elmail->Body = $areatexto;
            $elmail->AltBody = $areatexto;
        }
        if(!$elmail->send()){
            echo '<br />';
            echo 'Error: ' . $elmail->ErrorInfo;
            echo '<br />';
        }
    } catch (Exception $e){
        echo '<br />';
        echo "Llamar a Jesús Gómez, error en el envío de la inciddncia. Mailer Error {$elmail->ErrorInfo}";
    }




    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Pass@LIr0S','Conlabac');
    mysqli_set_charset($conn, "utf8");

    $modo = "EMAIL";
    $q = "INSERT INTO Incidencias 
        (IncCentro, IncFecha, IncHora, IncTexto, IncComunicadoA, 
        IncModoComunica, IncEmailComunica, IncUsuario)
        VALUES 
        ('".$centro."','".$eslafecha."','".$eslahora."','".$areatexto."','".$emilio2."','".$modo."','".$emilio."','".$nom."')";
    mysqli_query($conn, $q);


    $z = "INSERT INTO EnvioEmail (EnEmDestinatario, EnEmFecha, EnEmHora, EnEmTexto, EnEmEmisor) 
        VALUES ('".$emilio."','".$eslafecha."','".$eslahora."','".$areatexto."','".$ide."')";
    mysqli_query($conn, $z);

    header("location: principal.php?apu=$apu & apd=$apd & nom=$nom & cen=$cen & num=$centro & ide=$ide");
    die();

?>