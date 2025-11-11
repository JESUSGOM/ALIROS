<?php

require 'include/PHPMailer.php';
require 'include/SMTP.php';
require 'include/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Variables del formulario (se deben validar antes de usarlas)
$lafecha = $_POST['fecha'];
$lahora = $_POST['hora'];
$eltexto = $_POST['areadetexto'];
$elnombre = $_POST['nom'];
$elcentro = intval($_POST['num']);
$identifico = $_POST['ide'];
$eslafecha = substr($lafecha, 0, 4) . substr($lafecha, 5, 2) . substr($lafecha, 8, 2);
$eslahora = substr($lahora, 0, 2) . substr($lahora, 3, 2) . "00";

// Configuración del centro
$emailsConfig = [
    1 => [
        'deEmail' => 'incidenciasitctf@jfgb.es',
        'subject' => 'Comunicado de incidencia desde la conserjería del ITC en Tenerife',
    ],
    2 => [
        'deEmail' => 'incidenciasitcgc@jfgb.es',
        'subject' => 'Comunicado de incidencia desde la conserjería del ITC en Las Palmas',
    ]
];

if (!isset($emailsConfig[$elcentro])) {
    die("Centro no válido");
}

// Configuración del correo
$deEmail = $emailsConfig[$elcentro]['deEmail'];
$sSubject = $emailsConfig[$elcentro]['subject'];
$sBCC = "informaticaitc@jfgb.es";
//$sCC = "adominguez@itccanarias.org, jquintana@itccanarias.org, cbetancor@itccanarias.org";
$sdestinatario = "adewilde@itccanarias.org";

// Envío del correo con PHPMailer
$mail = new PHPMailer(true);

try {

    if($elcentro == 1){
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.jfgb.es'; // Cambia por el servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'incidenciasitctf@jfgb.es'; // Cambia por tu correo
        $mail->Password = 'Enver@2025'; // Cambia por tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;    
    }
    if($elcentro == 2){
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.jfgb.es'; // Cambia por el servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'incidenciasitcgc@jfgb.es'; // Cambia por tu correo
        $mail->Password = 'Enver@2025'; // Cambia por tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;      
    }
    // Configuración del servidor SMTP
    //$mail->isSMTP();
    //$mail->Host = 'smtp.example.com'; // Cambia por el servidor SMTP
    //$mail->SMTPAuth = true;
    //$mail->Username = 'your_email@example.com'; // Cambia por tu correo
    //$mail->Password = 'your_password'; // Cambia por tu contraseña
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //$mail->Port = 587;

    // Configuración del correo
    $mail->setFrom($deEmail, 'ITC Incidencias');
    $mail->addAddress($sdestinatario);
    $mail->addCC($sCC);
    $mail->addBCC($sBCC);

    $mail->isHTML(true);
    $mail->Subject = $sSubject;
    $mail->Body = "<p>$eltexto</p>";

    // Enviar correo
    $mail->send();
    echo "Correo enviado exitosamente";
} catch (Exception $e) {
    echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
}

// Inserción en la base de datos
$conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
mysqli_set_charset($conn, "utf8");
include("db.php");
$modo = "EMAIL";
$q = "INSERT INTO Incidencias (IncCentro, IncFecha, IncHora, IncTexto, IncComunicadoA, IncModoComunica, IncEmailComunica)
    VALUES ('$elcentro','$eslafecha','$eslahora','$eltexto','ITC','$modo','$sdestinatario')";
if (!mysqli_query($conn, $q)) {
    die("Error al guardar incidencia: " . mysqli_error($conn));
}

$z = "INSERT INTO EnvioEmail (EnEmDestinatario, EnEmFecha, EnEmHora, EnEmTexto, EnEmEmisor)
    VALUES ('$sdestinatario','$eslafecha','$eslahora','$eltexto','$identifico')";
if (!mysqli_query($conn, $z)) {
    die("Error al guardar envío de correo: " . mysqli_error($conn));
}

// Redirección
header("Location: principal.php?apu={$_POST['apel1']}&apd={$_POST['apel2']}&nom=$elnombre&cen={$_POST['cen']}&num=$elcentro&ide=$identifico");
exit;

?>
