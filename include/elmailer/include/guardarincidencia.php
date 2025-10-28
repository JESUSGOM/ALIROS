<?php

    include("db.php");
    include("variables.php");
    include("user_session.php");
    require "include/Exception.php";
    require "include/PHPMailer.php";
    require "include/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    echo var_dump($_POST);
    $lafecha = $_POST['fecha'];
    $lahora =  $_POST['hora'];
    $eltexto =  $_POST['areadetexto'];
    $apell1 = $_POST['apel1'];
    $apell2 = $_POST['apel2'];
    $elnombre = $_POST['nom'];
    $cenden = $_POST['cen'];
    $elcentro =  $_POST['num'];
    $identifico = $_POST['ide'];
    $copiasecreta = "informatica@laborsordtic.org";
    echo nl2br(" \n ");
    $eslafecha = substr($lafecha,0,4).substr($lafecha,5,2).substr($lafecha,8,2);
    echo $eslafecha;
    echo nl2br(" \n ");
    $eslahora = substr($lahora,0,2).substr($lahora,3,2)."00";
    echo nl2br(" \n ");
    echo $eslahora;
    echo nl2br(" \n ");
    echo gettype($elcentro);
    echo nl2br(" \n ");
    echo $elcentro;
    echo nl2br(" \n ");
    $elnumero = intval($elcentro);
    echo nl2br(" \n ");
    echo gettype($elnumero);
    echo nl2br(" \n ");
    echo $elnumero;
    $elnombre = utf8_encode($elnombre);
    if($elnumero == 2){
        $titular = "Francisco Valido Ortega";
        $titular = utf8_decode($titular);
        $denombre = utf8_decode($elnombre);
        $deemail = "incidenciasitcgc@laborsordtic.org";
        $deemail = utf8_decode($deemail);
        $sfrom = $deemail;
        $sCC = "cbetancor@itccanarias.org";
        $sBCC = "informatica@laborsordtic.org";
        $sdestinatario = "fvalido@itccanarias.org";
        $sSubject = "Comuinicado de incidencia desde la conserjería del ITC en Las Palmas";
        $sSubject = utf8_decode($sSubjec);
        $mensaje = utf8_decode($eltexto);
        $shtml = "<p> '" .$mensaje. "'</p>";
        $encabezado = "MIME-Version: 1.0\n";
        $encabezado .= "Content-type: text/html; charset=iso-8859-1\n";
        $encabezado .= "From:<$deemail>\n";
        $encabezado .= "X-Sender: <$sfrom>\n";
        $encabezado .= "BCC: <$sBCC>\n"; //aqui fijo el BCC
        $encabezado .= "CC: <$sCC>\n"; //aquí fijo el CC
        $encabezado .= "X-Mailer: PHP\n";
        $encabezado .= "X-Priority: 1\n"; // fijo prioridad
        $encabezado .= "Return-Path: <$sfrom>\n";
        echo nl2br("\n");
        echo $shtml;
        echo nl2br("\n");
        echo $mensaje;
        mail($sdestinatario,$sSubject,$shtml,$encabezado);

    }
    if($elnumero == 1){
        $titular = "María Carmen Betancor Reula";
        $titular = utf8_decode($titular);
        $denombre = utf8_decode($elnombre);
        $deemail = "incidenciasitctf@laborsordtic.org";
        $deemail = utf8_decode($deemail);
        $sfrom = $deemail;
        $sCC = "fvalido@itccanarias.org";
        $sBCC = "informatica@laborsordtic.org";
        $sdestinatario = "cbetancor@itccanarias.org";
        $sSubject = "Comuinicado de incidencia desde la conserjería del ITC en Tenerife";
        $sSubject = utf8_decode($sSubjec);
        $mensaje = utf8_decode($eltexto);
        $shtml = "<p> .$mensaje. </p>";
        $encabezado = "MIME-Version: 1.0\n";
        $encabezado .= "Content-type: text/html; charset=iso-8859-1\n";
        $encabezado .= "From: <$deemail>\n";
        $encabezado .= "X-Sender: <$sfrom>\n";
        $encabezado .= "BCC: <$sBCC>\n"; //aqui fijo el BCC
        $encabezado .= "CC: <$sCC>\n"; //aquí fijo el CC
        $encabezado .= "X-Mailer: PHP\n";
        $encabezado .= "X-Priority: 1\n"; // fijo prioridad
        $encabezado .= "Return-Path: <$sfrom>\n";
        mail($sdestinatario,$sSubject,$shtml,$encabezado);

    }   

    $modo = "EMAIL";
    $q = "INSERT INTO Incidencias 
    (IncCentro, IncFecha, IncHora, IncTexto, IncComunicadoA, 
    IncModoComunica, IncEmailComunica)
    VALUES 
    ('".$elcentro."','".$eslafecha."','".$eslahora."','".$eltexto."','".$titular."','".$modo."','".$sdestinatario."')";
    mysqli_query($conn, $q);

    
    $z = "INSERT INTO EnvioEmail (EnEmDestinatario, EnEmFecha, EnEmHora, EnEmTexto, EnEmEmisor) 
    VALUES ('".$sdestinatario."','".$eslafecha."','".$eslahora."','".$eltexto."','".$identifico."')";
    mysqli_query($conn, $z);
    
    header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$elnombre & cen=$cenden & num=$elcentro & ide=$identifico");

?>