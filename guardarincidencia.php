<?php
   
    //var_dump(dirname(__FILE__).PHP_EOL);
    //var_dump(getcwd().PHP_EOL);
    //var_dump(__DIR__.PHP_EOL);
    //die();

    
    //include("db.php");
    //include("variables.php");
    //include("user_session.php");
    //require_once ("/include/elmailer/Exception.php");
    //require_once ("/include/elmailer/PHPMailer.php");
    //require_once ("/include/elmailer/SMTP.php"); 

    /**if(!class_exists(PHPMailer::class)){
        throw new Exception("PhpMailer Not Found");
    }*/

    $fecha = $_POST['fecha'];
    $hora  = $_POST['hora'];
    $num = $_POST['num'];
    $apu = $_POST['apu'];
    $apd = $_POST['apd'];
    $nom = $_POST['nom'];
    $cen = $_POST['cen'];
    $ide = $_POST['ide'];
    $areatexto = $_POST['areadetexto'];
    echo $fecha;
    echo '<br/>';
    echo $hora;
    echo '<br/>';
    echo $num;
    echo '<br/>';
    echo $apu;
    echo '<br/>';
    echo $apd;
    echo '<br/>';
    echo $nom;
    echo '<br/>';
    echo $cen;
    echo '<br/>';
    echo $ide;
    echo '<br/>';
    ECHO $areatexto;
    echo '<br/>';
    echo "campos recibidos listados";
    echo '<br/>';
    echo gettype($num);
    echo '<br/>';
    $espacio = " ";
    $coma = ", ";
    $ncompleto = $apu . $espacio . $apd . $coma . $nom;
    echo '<br/>';
    echo $ncompleto;
    if($num == "1"){
        echo "Logueado en Tenerife";
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        $headers .= "From: ".$ncompleto . "incidenciasitctf@jfgb.es";
        //$sdestinatario = "conserjeriaitc.gc@grupoenvera.org";
        $sdestinatario = 'jfgb@jfgb.es';
        $asunto = "mensaje de incidencia de prueba";
        $cuerpoo = $areatexto;
        $mail($sdestinatario, $asunto, $cuerpoo, $headers);
    }
    if($num == "2") {
        echo 'Logueado en Gran Canaria';
    }
    

    
    //$lafecha = $_POST['fecha'];
    //$lafecha = filter_input(INPUT_POST, 'fecha', FILTER_SANITIZE_STRING);
    //$lahora = $_POST['hora'];
    //$lahora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
    
    //$eltexto = filter_input(INPUT_POST, 'areadetexto', FILTER_SANITIZE_STRING);
    //$elnombre = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    //$apell1 = filter_input(INPUT_POST, 'apu', FILTER_SANITIZE_STRING);
    //$apell2 = filter_input(INPUT_POST, 'apd', FILTER_SANITIZE_STRING);
    //$elcentro = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_STRING);
    //$cenden = filter_input(INPUT_POST, 'cen', FILTER_SANITIZE_STRING);
    //$identifico = filter_input(INPUT_POST, 'ide', FILTER_SANITIZE_STRING);
    //$copiasecreta = "jfgb@jfgb.es";
    /**echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo "Fecha recibida en el post = " . $lafecha;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    $eslafecha = substr($lafecha,0,4).substr($lafecha,5,2).substr($lafecha,8,2);
    echo "Fecha recibida y formateada = " . $eslafecha;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo "Hora recibida en el post = " . $lahora;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    $eslahora = substr($lahora,0,2).substr($lahora,3,2)."00";
    echo "Hora recibida y formateada = " . $eslahora;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo "Texto recibido en el post = " . $eltexto;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo "Nombre recibido en el post = " . $elnombre;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo "Primer apellido recibido en el post = " . $apell1;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo "Segundo apellido recibido en el post = " . $apell2;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo "Número de centro recibido en el post = " . $elcentro;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo "Nombre del centro recibido en el post = " . $cenden;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo "Identificación recibida en el post = " . $identifico;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo "Tipo de dato del Número de centro recibido en el post = " . gettype($elcentro);
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo $elcentro;
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    IF(!is_numeric($elcentro)){
        die("Error: el centro no es un número válido.");
    }
    $elnumero = intval($elcentro);
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo "Tipo de dato $elnumero recibido en el post, una vez realizado el intval = " . gettype($elnumero);
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    echo nl2br(" \n ");
    
    if($elnumero == 1){
        echo "Hemos entrado con usuario logueado en Tenerife";
    }
    if($elnumero == 2){
        echo "Hemos entrado con usuario logueado en Gran Canaria":
    }
    
    /* if($elnumero == 1){
        try {
            $mail = new PHPMailer(true);
            //Iniciamos la validación por SMTP:
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = "mail.jfgb.es";
            $mail->UserName = "incidenciasitctf@jfgb.es";
            $mail->Password = "1tcTF@38";
            $mail->Port = 25;
            $mail->setFrom('incidenciasitctf@jfgb.es', $elnombre);
            $mail->addAddress('adewilde@itccanarias.org', 'Dº. Alejandro de Wilde Calero');
            $mail->addCC('cbetancor@itccanarias.org', 'Dª Carmen Betancor Reula');
            $mail->addCC('adominguez@itccanarias.org', 'Dª Arancha Dominguez');
            $mail->addCC('jquintana@itccanarias.org', 'Dº. José Quintana');
            $mail->addCC('elianasuarez@laborsordtic.org', 'Dª. Eliana Suárez');
            $mail->addBcc('informaticaitc@jfgb.es', 'Jesús Gómez');
            $mail->isHTML(true);
            $mail->Subject = 'Comuinicado de incidencia desde la conserjería del ITC en Tenerife';
            $mail->Body = $eltexto;
            $mail->AltBody = $eltexto;
            $mail->send();
        } catch (Exception $e){
            echo "El mensaje no pudo ser enviado. Error: [$mail->ErrorInfo}";
        }

    }

    if($elnumero == 2){
        $mensaje = utf8_decode($eltexto);
        $shtml = "<p> '" .$mensaje. "'</p>";
        $sSubject = "Comuinicado de incidencia desde la conserjería del ITC en Las Palmas";
        $estemail->SMTPDebug = SMTP::DEBUG_SERVER;
        $estemail->isSMTP();
        $estemail->Host = 'mail.jfgb.es';
        $estemail->SMTPAuth = true;
        $estemail->Username = 'incidenciasitcgc@jfgb.es';
        $estemail->Password = '1tcGC@35';
        $estemail->Port = 25;

        $estemail->setFrom('conserjeriaitf@jfgb.es', $elnombre);
        $estemail->addAddress('adewilde@itccanarias.org','Alejandro de Wilde Calero');
        $estemail->addCC('cbetancor@itccanarias.org', 'Carmen Betancor Reula');
        $estemail->addCC('adominguez@itcccanarias.org', 'Adriana Domínguez');
        $estemail->addCC('jquintana@itccanarias.org', 'José Quintana');
        $estemail->addBCC('informaticaitc@jfgb.es');
        $estemail->addBCC('elianasuares@laborsord.org', 'Eliana Suárez');
        $estemail->isHTML(true);
        $estemail->Subject = $sSubject;
        $estemail->Body = $sHtml;
        $estemail->AltBody = $mensaje;
        $estemail->send();
    } catch (\Throwable $th) {
        echo "Mensaje no pudo ser envioado. Error: {$estemail->ErrorInfo}";
    }    */
        /* $modo = "EMAIL";
        $q = "INSERT INTO Incidencias 
        (IncCentro, IncFecha, IncHora, IncTexto, IncComunicadoA, 
        IncModoComunica, IncEmailComunica)
        VALUES 
        ('".$elcentro."','".$eslafecha."','".$eslahora."','".$eltexto."','".$titular."','".$modo."','".$sdestinatario."')";
        mysqli_query($conn, $q);

    
        $z = "INSERT INTO EnvioEmail (EnEmDestinatario, EnEmFecha, EnEmHora, EnEmTexto, EnEmEmisor) 
        VALUES ('".$sdestinatario."','".$eslafecha."','".$eslahora."','".$eltexto."','".$identifico."')";
        mysqli_query($conn, $z);  
    }

    header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$elnombre & cen=$cenden & num=$elcentro & ide=$identifico");
    */
?>