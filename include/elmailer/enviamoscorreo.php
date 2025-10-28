<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'include/PHPMailer.php';

    $nombreRemitente = $_GET['nomrem'];
    $correoQueEnvia = $_GET['emarem'];
    $correoDestino = $_GET['emades'];
    $correoAsunto = $_GET['asunto'];
    $correoCuerpo = $_GET['cuerpo'];

    $mail = new PHPMailer();
    /**Configuramos el SMPT */
    /*Indicamos que es SMTP */
    $mail->isSMTP();          
    /* Indicamos el servidor SMTP */                          
    $mail->Host = 'localhost';
    /* Habilitamos la autentificación smpt */
    $mail->SMTPAuth = true;
    /* SMTP username */
    $mail->Username = 'conserjeriaitc@laborsordtic.org';
    /* SMTP password */
    $mail->Password = 'BE85Oi292';
    /* Habilitamos la encriptación TLS o SSL */
    $mail->SMTPSecure = 'tls';
    /* Puerto TCP */
    $mail->Port = 465;

    /* Configurar las cabeceras del correo */
    $mail->From = $correoQueEnvia; //Correo del remitente
    $mail->FromName = $nombreRemitente; //Nombre del usuario que envia.
    $mail->Subject = $correoAsunto; //Asunto del email enviado.

    /**Incluir destinatarios, el nombre es opcional */
    $mail->addAddress($correoDestino,'');

    /**Envio emaili en html */
    $mail->isHTML(true);

    /** Configurar cuerpo del mensaje **/
    $mail->Body    = $correoCuerpo;
    $mail->AltBody = $correoCuerpo;

    /** Para que use el lenguaje español **/
    $mail->setLanguage('es');

    /**Enviar mensaje */
    if(!$mail->send()){
        echo '<script language="javascript">alert("El Mensajeno pudo ser enviado.");</script>';
    } else {
        echo '<script language="javascript">alert("Mensaje enviado correctamente.");</script>';
    }


?>
