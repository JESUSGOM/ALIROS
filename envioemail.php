<?php  
    require_once("db.php");
    header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    $elemail = $_POST["des"];
    $asunto = $_POST["asu"];
    $texto = $_POST["text"];
    $nom = $_POST["nom"];
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-º\r\n";
    $headers .= "FROM: '" .$nom. "' <conserjeriaitc@laborsordtic.org>\r\n";
    mail($elemail,$asunto,$texto,$headers);
    
?>