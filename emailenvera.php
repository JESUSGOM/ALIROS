<?php
// Importa las clases necesarias
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluye las clases de PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();                                      // Configura el mailer para usar SMTP
    $mail->Host = 'smtp.office365.com';                   // Especifica el servidor SMTP
    $mail->SMTPAuth = true;                               // Habilita la autenticación SMTP
    $mail->Username = 'conserjeriaitc.gc@grupoenvera.org';// Tu dirección de correo electrónico completa de Microsoft 365
    $mail->Password = 'Envera2025';                       // La contraseña asociada a tu dirección de correo electrónico de Microsoft 365
    $mail->SMTPSecure = 'tls';                            // Habilita encriptación TLS
    $mail->Port = 587;                                    // El puerto TCP al que se conecta

    // Configuración del remitente y destinatario
    $mail->setFrom('conserjeriaitc.gc@grupoenvera.org', 'Conserjería ITC (Gran Canaria)');
    $mail->addAddress('jesusfgomezb@gmail.com', 'Nombre del destinatario'); // Añade un destinatario
    $mail->CharSet = 'UTF-8';
    
    // Contenido del correo
    $mail->isHTML(true);                                  // Establece el formato del correo a HTML
    $mail->Subject = 'Correo de prueba desde la dirección conserjeriaitc.gc@grupoenvera.org';
    $mail->Body    = 'Este es el cuerpo del mensaje en <b>HTML</b>';
    $mail->AltBody = 'Este es el cuerpo del mensaje en texto plano para clientes de correo que no soporten HTML';

    // Enviar el correo
    $mail->send();
    echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
}
?>
