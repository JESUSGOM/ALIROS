<?php
    include("db.php");
    include("variables.php");
    include("user_session.php");
    header('Content-Type: text/html; charset=UTF-8');

    $apel1 = $_POST["apu"];
    $apel2 = $_POST["apd"];
    $nom = $_POST["nom"];
    $cenden = $_POST["cen"];
    $numero = $_POST["num"];
    $apellidoUno = $_POST["apell1"];
    $apellidoDos = $_POST["apell2"];
    $nombre = $_POST["nombre"];
    $hora = $_POST["hora"];
    $regis = $_POST["registro"];
    $espacio = " ";
    $rolusuario = $_POST['rol'];
    $cargoUsuario = $_POST['car'];
    $esfecha = $_POST["fecha"];
    $fecha = date("Ymd");
    $lahora = substr($hora,0,2).substr($hora,3,2)."00";
    $fechatotal = substr($esfecha,0,4).substr($esfecha,5,2).substr($esfecha,8,2);
//    var_dump($_POST);
    print "
    <p>
        $apel1 $apel2 $nom $cenden $apellidoUno $apellidoDos $nombre $fechatotal $lahora $numero $regis $espacio $rolusuario $espacio $cargoUsuario
    </p>
    ";
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs', 'Pass@LIr0S', 'Conlabac');
    mysqli_set_charset($conn, "utf8");
    $q = $conn->prepare("UPDATE KeyMoves SET KeyFechaRecepcion = ?, KeyHoraRecepcion = ? WHERE KeyOrden = ?");
    $q->bind_param('ssi',$fechatotal, $lahora, $regis);
    $q->execute();

    if($rolusuario == "U"){
        echo "<br>";
        echo "El Usuario logueado es tipo (U)suario";
        header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$cenden & num=$$numero & ide=$usuariorecibido & rol=$rolusuario");
    }
    if($rolusuario == "T"){
        echo "<br>";
        echo "El Usuario logueado es tipo (T)écnico";
        header("location: principalitc.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$cenden & num=$numero & ide=$usuariorecibido & rol=$rolusuario");
    }
    if($rolusuario == "A"){
        echo "<br>";
        echo "El Usuario logueado es tipo (A)uxiliar";
        header("location: principal3.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$cenden & num=$numero & ide=$usuariorecibido & rol=$rolusuario");
    }
    if($rolusuario == "P"){
        echo "<br>";
        echo "El Usuario logueado es tipo (P)rogramador";
        header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$cenden & num=$numero & ide=$usuariorecibido & rol=$rolusuario");
       
    }
    if($rolusuario == "Z"){
        echo "<br>";
        echo "El Usuario logueado es de tipo Superusuario";
        header("location: principalsuper.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$cenden & num=$numero & ide=$usuariorecibido & rol=$rolusuario");
    }

    
?>