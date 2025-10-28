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

    echo var_dump($_POST);
    $apu = $_POST['apu'];
    $apd = $_POST['apd'];
    $nom = $_POST['nom'];
    $cen = $_POST['cen'];
    $num = $_POST['num'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $emisor = $_POST['emisor'];
    $receptor = $_POST['receptor'];
    $mensaje = $_POST['mensaje'];
    $emilio = $_POST['emilio'];
    $llamada = $_POST['llamada'];
    $identi = $_POST['ide'];
    echo "<br>";
    echo $apu;
    echo "<br>";
    echo $apd;
    echo "<br>";
    echo $nom;
    echo "<br>";
    echo $cen;
    echo "<br>";
    echo $num;
    echo "<br>";
    echo gettype($num);
    echo "<br>";
    echo $fecha;
    echo "<br>";
    echo $hora;
    echo "<br>";
    echo $emisor;
    echo "<br>";
    echo $receptor;
    echo "<br>";
    echo $mensaje;
    echo "<br>";
    echo $emilio;
    echo "<br>";
    echo $llamada;
    $anoformateado = substr($fecha, 0, 4);
    $mesformateado = substr($fecha, 5, 2);
    $diaformateado = substr($fecha,8,2);
    echo "<br>";
    echo "El año formateado es = ".$anoformateado;
    echo "<br>";
    echo "El mes formateado es = ".$mesformateado;
    echo "<br>";
    echo "El día formateado es = ".$diaformateado;
    echo "<br>";
    $fechaformateada = $anoformateado.$mesformateado.$diaformateado;
    echo "<br>";
    echo "La fecha formateada es = ".$fechaformateada;
    echo "<br>";
    echo $hora;
    $horformateada = substr($hora, 0, 2);
    echo "<br>";
    $minformateado = substr($hora, 3, 2);
    echo "<br>";
    echo "La hora formateada es = " .$horformateada;
    echo " <br>";
    echo "El minuto formateado es = " .$minformateado;
    $horaformateada = $horformateada.$minformateado."00";
    echo "<br>";
    echo "La hora formateada para grabar en bbdd = ".$horaformateada;
    echo "<br>";
    echo "Valor de identificación de usuario = ".$identi;
    echo "<br>";
    $comunicar  = 0;
    $comunicado = 1;
    $vaciado = "";
    echo "Emilio recibido = ".$emilio;
    echo "<br>";
    $porciones = explode(" | ", $emilio);
    echo $porciones[0];
    echo "<br>";
    echo $porciones[1];
    $nombreemilio = $porciones[0];
    $emailemilio = $porciones[1];
    echo "<br>";
    echo $nombreemilio;
    echo "<br>";
    echo $emailemilio;


    $mimail = new PHPMailer(true);
    try{
        
        $mimail->isSMTP();
        $mimail->Host = 'smtp.office365.com';
        $mimail->SMTPAuth = true;
        $mimail->SMTPSecure = 'tls';
        $mimail->Port = 587;
        $mimail->CharSet = 'UTF-8';
        if($num == "1"){
            $miasunto = "Aviso de llamada telefónica en su ausencia.";
            $mimail->Username = 'conserjeriaitc.tf@grupoenvera.org';// Tu dirección de correo electrónico completa de Microsoft 365
            $mimail->Password = 'Envera2025';                       // La contraseña asociada a tu dirección de correo electrónico de Microsoft 365
            $mimail->setFrom('conserjeriaitc.tf@grupoenvera.org', $nom);
            $mimail->addCC('conserjeriaitc.tf@grupoenvera.org');
            $mimail->addBCC('informaticaitc@jfgb.es','Jesús Gómez');
            $mimail->addReplyTo('conserjeriaitc.tf@grupoenvera.org', $nom);
            $mimail->addAddress($emailemilio, $nombreemilio);
            $mimail->Subject = $miasunto;
            $cuerpo = "Estimado/a Sr/a " .$nombreemilio. ".\r\n";
            $cuerpo .= "En la recepción del " .$cen. ", se ha recibido una llamada de " .$emisor. " \r\n";
            $cuerpo .= " en su ausencia y le ha dejado el mensaje (".$mensaje."), el cual le comunicamos \r\n";
            $cuerpo .= " por este correo electrónico.";
            $mimail->Body = $cuerpo;
            $mimail->AltBody = $cuerpo;
        }
        if($num == "2"){
            $miasunto = "Aviso de llamada telefónica en su ausencia.";
            $mimail->Username = 'conserjeriaitc.gc@grupoenvera.org';// Tu dirección de correo electrónico completa de Microsoft 365
            $mimail->Password = 'Envera2025';                       // La contraseña asociada a tu dirección de correo electrónico de Microsoft 365
            $mimail->setFrom('conserjeriaitc.gc@grupoenvera.org', $nom);
            $mimail->addCC('conserjeriaitc.gc@grupoenvera.org');
            $mimail->addBCC('informaticaitc@jfgb.es','Jesús Gómez');
            $mimail->addReplyTo('conserjeriaitc.gc@grupoenvera.org', $nom);
            $mimail->addAddress($emailemilio, $nombreemilio);
            $mimail->Subject = $miasunto;
            $cuerpo = "Estimado/a Sr/a " .$nombreemilio. ".\r\n";
            $cuerpo .= "En la recepción del " .$cen. ", se ha recibido una llamada de " .$emisor. " \r\n";
            $cuerpo .= " en su ausencia y le ha dejado el mensaje (".$mensaje."), el cual le comunicamos \r\n";
            $cuerpo .= " por este correo electrónico.";
            $mimail->Body = $cuerpo;
            $mimail->AltBody = $cuerpo;    
        }
        if(!$mimail->send()){
            echo '<br />';
            echo 'Error: ' . $mimail->ErrorInfo;
            
        }
        //$mimail->send();
    } catch (Exception $e){
        echo '<br />';
        echo "Llamar a Jesús Gómez, error en el envío de la inciddncia. Mailer Error {$mimail->ErrorInfo}";
    }
    

    if(!empty($emailemilio)){
        $comunicar = 0;
        try{
            echo "Entró por el if de emilio vacío";
            $query = 
            "INSERT INTO Telefonos (TelCentro, TelFecha, TelHora, TelEmisor, TelDestinatario, 
            TelMensaje, TelComunicado) 
            VALUES ('".$num."','".$fechaformateada."','".$horaformateada."','".$emisor."','".$receptor."',
            '".$mensaje."','".$comunicar."')";
            mysqli_query($conn, $query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    if(empty($emailemilio)){
        $comunicar = 0;
        try{
            echo "Entro por el if de emilio no vacio";
            $querylleno = 
            "INSERT INTO Telefonos (TelCentro, TelFecha, TelHora, TelEmisor, TelDestinatario, 
            TelMensaje, TelComunicado, TelFechaEntrega, TelHoraEntrega) 
            VALUES ('".$num."','".$fechaformateada."','".$horaformateada."','".$emisor."','".$receptor."',
            '".$mensaje."','".$comunicar."','".$fechaformateada."','".$horaformateada."')";
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
    
    
    header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$nom & cen=$cenden & num=$numero");
?>