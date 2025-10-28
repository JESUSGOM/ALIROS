<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    


    function litero($destination, $matter, $brigade, $nomo){
    
        $oMail= new PHPMailer();
        $oMail->isSMTP();
        $oMail->SMTPDebug  = 0;
        $oMail->Host='smtp.gmail.com';
        $oMail->Port=587;
        $oMail->SMTPSecure='tls';
        $oMail->SMTPAuth=true;
        $oMail->Username="smtp.gmail.com";
        $oMail->Password="B38501292";
        $oMail->setFrom("conserjeriaitc@gmail.com",$nomo);
        $oMail->addAddress('".$destination."',"");
        $oMail->Subject='".$matter."';
        $oMail->msgHTML('".$brigade."');
        $oMail->AltBody = 'This is a plain-text message body';

        if(!$oMail->send()){
            echo $oMail->ErrorInfo;  
        } else {
            echo "Enviado eamil";
        }

    }

?>