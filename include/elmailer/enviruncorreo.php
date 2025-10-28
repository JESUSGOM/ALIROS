<?php
    include("db.php");
    require_once("variables.php");
    include("user_session.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $espacio = " ";
    $coma = ", ";
    $apellidoUno = $_POST['apu'];
    $apellidoDos = $_POST['apd'];
    $nombre = $_POST['nom'];
    $centroDen = $_POST['cen'];
    $numero = $_POST['num'];
    $elmail = $_POST['emilio'];
    $asunto = $_POST['asunto'];
    $textoemail = $_POST['mensaje'];

    $oMail= new PHPMailer();
    $oMail->isSMTP();
    $oMail->SMTPDebug  = 0;
    $oMail->Host='localhost';
    $oMail->Port=465;
    $oMail->SMTPSecure='tls';
    $oMail->SMTPAuth=true;
    $oMail->Username="conserjeriaitc@laborsordtic.org";
    $oMail->Password="B38501292";
    $oMail->setFrom("conserjeriaitc@gmail.com",$nom);
    $oMail->addAddress('".$elmail."',"");
    $oMail->Subject='".$asunto."';
    $oMail->msgHTML('".$textoemail."');
    $oMail->AltBody = 'This is a plain-text message body';

    if(!$oMail->send()){
        echo $oMail->ErrorInfo;  
    } else {
        echo "Enviado eamil";
    }


    $sl = "INSERT INTO EnvioEmail (EnEmDestinatario, EnEmFecha, EnEmHora, EnEmTexto, 
    EnEmEmisor) 
    VALUES ('".$elmail."','".$fechatotal."','".$lahora."','".$textoemail."','".$nom."')";
    mysqli_query($conn, $sl);


    header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroDen & num=$centro");

?>