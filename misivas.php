<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\class.phpmailer.php;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require("class.phpmailer.php");
require("PHPMailerAutoload.php");

include("db.php");
include("variables.php");

session_start();

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

// Formateo de fecha y hora
$fecha2 = substr($fecha, 0, 4) . substr($fecha, 5, 2) . substr($fecha, 8, 2);
$hora2 = substr($hora, 0, 2) . substr($hora, 3, 2) . "00";
$remite = $nombre . " " . $apell1 . " " . $apell2;
//Imprimimos valores recibidos en pantalla
echo var_dump($_POST);
echo "<br />";
echo "Asunto = " . $asunto;
echo "<br />";
$emilio = $emilio . ", " . "jfgb@jfgb.es";
echo "Destinatario = ".$emilio;
echo "<br />";
echo "Tipo variable emilio = " . gettype($emilio);
echo "<br />";
echo "Mensaje a envíar = " . $mensaje;
echo "<br />";
$elmensaje = wordwrap($mensaje, 70, "\r\n");
echo "Mensaje formateado a enviar = " . $elmensaje;


if ($numero == "1") {
    $usuariocorreo = "conserjeriaitc@jfgb.es";
    $clavecorreo = "@Susej1966";
} elseif ($numero == "2") {
    $usuariocorreo = "incidenciasitcgc@jfgb.es";
    $clavecorreo = "Enver@2025";
} else {
    die("Número de centro no válido.");
}


$mail = new PHPMailer(true); 
//Configuramos el servidor
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'localhost';
$mail->SMTPAuth = true;
//$mail->SMTPSecure = 'ssl';
$mail->Port = 25;
$mail->username = 'conserjeriaitc@jfgb.es';
$mail->password = '@Susej1966';
$mail->setFrom('conserjeriaitc@jfgb.es', $nombre);
if($numero == "1") {
    $mail->addReplyTo('conserjeriaitc.tf@grupoenvera.org', $denombre);    
    $mail->Subject = 'Comunicado desde la Conserjeria del ITC en Tenerife. ' + $asunto;
    $mail->addCC('conserjeriaitc.tf@grupoenvera.org');
}
if($numero == "2") {
    $mail->addReplyTo('conserjeriaitc.gc@grupoenvera.org', $denombre);    
    $mail->Subject = 'Comunicado desde la Conserjeria del ITC en Las Palmas. ' + $asunto;
    $mail->addCC('conserjeriaitc.gc@grupoenvera.org');
}
$mail->addAddress($emilio);
$mail->Body = $elmensaje;
$mail->AltBody = $elmensaje;
$mail->send();


// Función para quitar tildes
function quitar_tildes($cadena) {
    $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "Ñ");
    $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N");
    return str_replace($no_permitidas, $permitidas, $cadena);
}





// Insertar en base de datos
//$tt = "INSERT INTO EnvioEmail (EnEmDestinatario, EnEmFecha, EnEmHora, EnEmTexto, EnEmEmisor) 
//       VALUES ('$emilio', '$fecha2', '$hora2', '$mensaje', '$identifico')";
//mysqli_query($conn, $tt);



    
    //header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$elnombre & cen=$cenden & num=$elcentro & ide=$identifico");

?>
