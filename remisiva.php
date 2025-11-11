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
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(E_ALL);
session_start();
//echo var_dump($_POST);
$identifico = $_POST['ide'];
$apell1 = $_POST['apu'];
$apell2 = $_POST['apd'];
$nombre = $_POST['nom'];
$centro = $_POST['cen'];
$numero = $_POST['num'];
$lafecha = $_POST['fecha'];
$hora = $_POST['hora'];
$emilio = $_POST['emilio'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$rolusuario = $_POST['rol'];
$emilio2 = 'jfgb@jfgb.es';
//echo "<br />";
//echo $identifico;
$eslafecha = substr($lafecha,0,4).substr($lafecha,5,2).substr($lafecha,8,2);
//echo "<br />";
//echo $eslafecha;
$eslahora = substr($hora,0,2).substr($hora,3,2)."00";
//echo "<br />";
//echo $eslahora;
$elnumero = intval($numero);
//echo "<br />";
//echo $elnumero;
//echo "<br />";
//echo gettype($elnumero);
// Varios destinatarios
$para  = $emilio . ', '; // atención a la coma
$para .= $emilio2;

//echo "<br />";
//echo $emilio;
//echo "<br />";
//echo gettype($emilio);

//echo "<br />";
//echo $emilio2;

//echo "<br />";
//echo gettype($emilio2);

//echo "<br />";
//echo $asunto;
//echo "<br />";
//echo $mensaje;
echo $rolusuario;
//echo "<br />";
try{
  $elmail = new PHPMailer(true);
  $elmail->isSMTP();                                      // Configura el mailer para usar SMTP
  $elmail->Host = 'smtp.office365.com';                   // Especifica el servidor SMTP
  $elmail->SMTPAuth = true;                               // Habilita la autenticación SMTP
  $elmail->SMTPSecure = 'tls';
  $elmail->Port = 587;
  $elmail->CharSet = 'UTF-8';
  $elmail->SMTPDebug = 0;
  if($elnumero == 1){
    $elmail->Username = 'conserjeriaitc.tf@grupoenvera.org';// Tu dirección de correo electrónico completa de Microsoft 365
    $elmail->Password = 'Envera2025';                       // La contraseña asociada a tu dirección de correo electrónico de Microsoft 365
    $elmail->setFrom('conserjeriaitc.tf@grupoenvera.org', $nombre);
    $elmail->addCC('adelaida.gomez@grupoenvera.org','Maria Adelaida Gomez Corujo');
    //$elmail->addCC('conserjeriaitc.tf@grupoenvera.org');
    //$elmail->addCC('juanluis.hernandez@grupoenvera.org', 'Juan Luis Hernández Pérez');
    $elmail->addBCC('informaticaitc@jfgb.es','Jesus Gomez');
    $elmail->Subject = $asunto;
    $elmail->addReplyTo('conserjeriaitc.tf@grupoenvera.org', $nombre);
    $elmail->addAddress($emilio);
    $elmail->Body = $mensaje;
    $elmail->AltBody = $mensaje;
  }
  if($elnumero == 2){
    $elmail->Username = 'conserjeriaitc.gc@grupoenvera.org';
    $elmail->Password = 'Envera2025';
    $elmail->setFrom('conserjeriaitc.gc@grupoenvera.org', $nombre);
    $elmail->addCC('josea.henriquez@grupoenvera.org', 'Jose A. Henriquez Benitez');
    $elmail->addCC('conserjeriaitc.gc@grupoenvera.org');
    $elmail->addBCC('informaticaitc@jfgb.es','Jesus Gomez');
    $elmail->Subject = $asunto;
    $elmail->addReplyTo('conserjeriaitc.gc@grupoenvera.org', $nombre);
    $elmail->addAddress($emilio);
    $elmail->Body = $mensaje;
    $elmail->AltBody = $mensaje;
  }
  if(!$elmail->send()){
    echo '<br />';
    echo 'Error: ' . $elmail->ErrorInfo;
    echo '<br />';
    
  }
  //$elmail->send();
} catch (Exception $e){
  echo '<br />';
  echo "Llamar a Jesús Gómez, error en el envío de la inciddncia. Mailer Error {$elmail->ErrorInfo}";
}

function quitar_tildes($cadena) {
  $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
  $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
  $texto = str_replace($no_permitidas, $permitidas ,$cadena);
  return $texto;
}

$conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
mysqli_set_charset($conn, "utf8");

    $z = "INSERT INTO EnvioEmail (EnEmDestinatario, EnEmFecha, EnEmHora, EnEmTexto, EnEmEmisor) 
        VALUES ('".$emilio."','".$eslafecha."','".$eslahora."','".$mensaje."','".$identifico."')";
        mysqli_query($conn, $z);
    
    //header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$elnombre & cen=$cenden & num=$elcentro & ide=$identifico");
    //die();
    if($rolusuario == "U"){
      echo "<br>";
      echo "El Usuario logueado es tipo (U)suario";
      header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$nombre & cen=$centro & num=$numero & ide=$identifico & rol=$rolusuario");
  }
  if($rolusuario == "T"){
      echo "<br>";
      echo "El Usuario logueado es tipo (T)écnico";
      header("location: principalitc.php?apu=$apell1 & apd=$apell2 & nom=$nombre & cen=$centro & num=$numero & ide=$identifico & rol=$rolusuario");
  }
  if($rolusuario == "A"){
      echo "<br>";
      echo "El Usuario logueado es tipo (A)uxiliar";
      header("location: principal3.php?apu=$apell1 & apd=$apell2 & nom=$nombre & cen=$centro & num=$numero & ide=$identifico & rol=$rolusuario");
  }
  if($rolusuario == "P"){
      echo "<br>";
      echo "El Usuario logueado es tipo (P)rogramador";
      header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$nombre & cen=$centro & num=$numero & ide=$identifico & rol=$rolusuario");
     
  }
  if($rolusuario == "Z"){
      echo "<br>";
      echo "El Usuario logueado es de tipo Superusuario";
      header("location: principalsuper.php?apu=$apell1 & apd=$apell2 & nom=$nombre & cen=$centro & num=$numero & ide=$identifico & rol=$rolusuario");
  }
?>