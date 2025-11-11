<?php
    include("db.php");
    include("variables.php");
    include("user_session.php");
    header('Content-Type: text/html; charset=ISO-8859-1');

//    echo var_dump($_POST);
?>
    <!-- HTML + JS para "pausar" hasta que el usuario haga click -->
    <button onclick="continuar()">Continuar</button>

    <script>
        function continuar() {
            alert("Continuando...");
        }
    </script>
<?php
    session_start();
    //echo var_dump($_SESSION);
    echo "<br> \n";
    echo var_dump($_POST);
    $apel1 = $_POST["apu"];
    $apel2 = $_POST["apd"];
    $nom = $_POST["nom"];
    $cenden = $_POST["cen"];
    $numero = $_POST["num"];
    $rolusuario = $_POST["rol"];
    $cargoUsuario = $_POST["car"];
    $identifico = $_POST["ide"];
    $regis = $_POST["reg"];
    $regis = strtoupper($regis);
    $esfecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $nombre = $_POST["nombre"];
    $nombre = ucwords($nombre);
    $apellidoUno = $_POST["apelli1"];
    $apellidoUno = ucwords($apellidoUno);
    $apellidoDos = $_POST["apelli2"];
    $apellidoDos = ucwords($apellidoDos);
    $asigno = $_POST["asignokey"];
    //$fecha = date("Ymd");
    $lahora = substr($hora,0,2).substr($hora,3,2)."00";
    $fechatotal = substr($esfecha,0,4).substr($esfecha,5,2).substr($esfecha,8,2);
    $datos = [
        "apu" => $apellidoUno,
        "apd" => $apellidoDos,
        "nom" => $nombre,
        "cen" => $cenden,
        "num" => $numero,
        "rol" => $rolusuario,
        "car" => $cargoUsuario,
        "ide" => $identifico,
        "crg" => $cargoUsuario
    ];
    //echo "<br>";
    //echo $apel1;
    //echo "<br>";
    //echo $apel2;
    //echo "<br>";
    //echo $nom;
    //echo "<br>";
    //echo "Denominación del centro => " .$cenden;
    //echo "<br>";
    //echo "Número del centro => " .$numero;
    //echo "<br>";
    //echo "Código de la llave a asignar => " .$regis;
    //echo "<br>";
    //echo "Primer apellido de la persona a la que se asignó la llave => " .$apellidoUno;
    //echo "<br>";
    //echo "Segundo apellido de la persona a la que se asignó la llave => " .$apellidoDos;
    //echo "<br>";
    //echo "Nombre de la persona a la que se le asignó la llave => " .$nombre;
    //echo "<br>";
    //echo "Hora recibida de la asignación de la llave => " .$hora;
    //echo "<br>";
    //echo "Fecha recibida de la asignación de la llave => " .$esfecha;
    //echo "<br>";
    //echo "Hora formateada de la asignación de la llave => " .$lahora;
    //echo "<br>";
    //echo "Fecha formateada de la asignación de la llave => " .$fechatotal;
    //echo "<br>";

    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
    mysqli_set_charset($conn, "utf8");
    //print "<p>$apel1 $apel2 $nom $cenden $apellidoUno $apellidoDos $nombre $fechatotal $lahora $numero $regis</p>";
    $que = "INSERT INTO KeyMoves (KeyLlvOrden, KeyCentro, KeyFechaEntrega, KeyHoraEntrega, 
    KeyNombre, KeyApellidoUno, KeyApellidoDos) 
    VALUES ('".$regis."','".$numero."','".$fechatotal."','".$lahora."',
    '".$nombre."','".$apellidoUno."','".$apellidoDos."')";
    mysqli_query($conn, $que);
    //header("location: principal.php?apu=$apel1 & apd=$apel2 & nom=$nom & cen=$cenden & num=$numero & rol=$rolusuario & $cargoUsuario");
    function redirigirConPost($archivo, $datos) {
        echo '<form id="redirForm" action="' . $archivo . '" method="POST">';
        foreach ($datos as $clave => $valor) {
            echo '<input type="hidden" name="' . htmlspecialchars($clave) . '" value="' . htmlspecialchars($valor) . '">';
        }
        echo '</form>';
        echo '<script>document.getElementById("redirForm").submit();</script>';
        exit;
    }
    redirigirConPost("principal.php", $datos);
?>
