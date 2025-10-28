<?php

    $correo = "conserjeriaitc@laborsordtic.org";
    $denombre = "Jesús F. Gómez B";
    $deemail = "informatica@laborsordtic.org";
    $sfrom = "informatica@laborsord.org";
    $sBCC = "jesusfgomezb@gmail.com";
    $sdestinatario = $correo;
    $sSubject = "Esto es un email de prueba con copia oculta";
    $shtml = "<p>Esto es un mensaje de email en formato html probando copia oculta y nombre en el remitente</p>";
    $encabezado = "MIME-Version: 1.0\n";
    $encabezado .= "Content-type: text/html; charset=iso-8859-1\n";
    $encabezado .= "From: $denombre <$deemail>\n";
    $encabezado .= "X-Sender: <$sfrom>\n";
    $encabezado .= "BCC: <$sBCC>\n"; //aqui fijo el BCC
    $encabezado .= "X-Mailer: PHP\n";
    $encabezado .= "X-Priority: 1\n"; // fijo prioridad
    $encabezado .= "Return-Path: <$sfrom>\n";
    mail($sdestinatario,$sSubject,$shtml,$encabezado);
?>