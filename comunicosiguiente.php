<?php
    include("db.php");
    include("variables.php");
    include("user_session.php");
    var_dump($_POST); 
    session_start();
    $f = date('d-m-Y H:i:s');
    echo nl2br(" \n ");
    print_r($f);
    echo nl2br(" \n ");
    echo gettype($f);  
    $fecha = substr($f,6,4).substr($f,3,2).substr($f,0,2);
    $hora = substr($f,11,2);
    $nhora = intval($hora);

    echo nl2br(" \n ");
    echo $fecha;
    echo nl2br(" \n ");
    echo "hora en texto = ";
    echo $hora;
    echo nl2br(" \n ");
    echo "hora en numero = ";
    echo $nhora;
    echo nl2br(" \n ");
    $nhora = $nhora -1;
    echo "Hora corregida en número = ";
    echo $nhora;
    $hora = strval($nhora);
    if($nhora < 10 && $nhora >= 0){
        $hora = "0".strval($nhora);
    }
    echo nl2br(" \n ");
    echo "Ahora vemos el valor de la hora en texto = ";
    echo $hora;
    echo nl2br(" \n ");
    echo "La nueva hora es de tipo = ";
    echo gettype($hora);
    $hora = $hora.substr($f,14,2).substr($f,17,2);
    echo nl2br(" \n ");
    echo "La hora formateada para guardar es = ";
    echo $hora;
    echo nl2br(" \n ");
    $numerocentro = intval($_POST['num']);
    gettype($_POST['num']);
    echo nl2br(" \n ");
    echo gettype($numerocentro);
    $texto = $_POST['areadetexto'];
    echo nl2br(" \n ");
    echo "Texto recibido = ";
    echo $texto;
    $apell1 = $_POST['apu'];
    $apell2 = $_POST['apd'];
    $elnombre = $_POST['nom'];
    $cenden = $_POST['cen'];
    $elcentro = $_POST['num'];
    $identifico = $_POST['ide'];
    echo nl2br(" \n ");
    echo "Identificacio recibida = ";
    echo $identifico;
    echo nl2br(" \n ");
    echo "Número de centro recibido = ";
    echo $elcentro;

    
    $maceda = "INSERT INTO EntreTurnos (EntCentro, EntOperario, EntFescrito, EntHescrito, EntTexto) 
    VALUES ('".$elcentro."','".$identifico."','".$fecha."','".$hora."','".$texto."')";
    mysqli_query($conn, $maceda);
    

    header("location: principal.php?apu=$apell1 & apd=$apell2 & nom=$elnombre & cen=$cenden & num=$elcentro & ide=$identifico");

?>