<?php
    include("db.php");

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
    if(!empty($emilio)){
        try{
            echo "Entró por el if de emilio vacío";
            $query = "INSERT INTO Telefonos (TelCentro, TelFecha, TelHora, TelEmisor, TelDestinatario, TelMensaje, TelComunicado) 
            VALUES ('".$num."','".$fechaformateada."','".$horaformateada."','".$emisor."','".$receptor."','".$mensaje."','".$comunicar."')";
            mysqli_query($conn, $query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    
    header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$nom & cen=$cenden & num=$numero");
?>