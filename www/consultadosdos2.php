<?php
session_name("Aliros");
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("db.php");
include("variables.php");
require 'include/user_sesion.php';

// Función para redirigir con POST
function redirigirConPost($archivo, $datos) {
    echo '<form id="redirForm" action="' . $archivo . '" method="POST">';
    foreach ($datos as $clave => $valor) {
        echo '<input type="hidden" name="' . htmlspecialchars($clave) . '" value="' . htmlspecialchars($valor) . '">';
    }
    echo '</form>';
    echo '<script>document.getElementById("redirForm").submit();</script>';
    exit;
}

$nombreCentro = "";

if (isset($_POST['entrada'])) {
    $usuariorecibido = $_POST["usuario"];
    $laclaverecibida = $_POST["clave"];

    $MayUsu = strtoupper(trim($usuariorecibido));
    $Maycla = strtoupper(trim($laclaverecibida));

    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs', 'Pass@LIr0S', 'Conlabac');
    mysqli_set_charset($conn, "utf8");

    $query = "SELECT UsuDni, UsuClave, UsuCentro, UsuNombre, UsuApellidoUno, UsuApellidoDos, UsuTipo 
              FROM Usuarios 
              WHERE UsuDni = '$MayUsu' AND UsuClave = '$Maycla'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_row($resultado)) {
            $usuario = $fila[0];
            $clave = $fila[1];
            $centro = $fila[2];
            $nombre = $fila[3];
            $apellidoUno = $fila[4];
            $apellidoDos = $fila[5];
            $rolUsuario = $fila[6];

            $query2 = "SELECT CenNombre FROM Centros WHERE CenId = '$centro'";
            $resulta2 = mysqli_query($conn, $query2);
            if ($resulta2 && $fila2 = mysqli_fetch_row($resulta2)) {
                $nombreCentro = $fila2[0];
            }

            // Guardar en sesión
            $_SESSION['usuario'] = $usuario;
            $_SESSION['clave'] = $clave;
            $_SESSION['centro'] = $centro;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellidoUno'] = $apellidoUno;
            $_SESSION['apellidoDos'] = $apellidoDos;
            $_SESSION['tipo'] = $rolUsuario;
            $_SESSION['iniciada'] = true;
            $_SESSION['centre'] = $nombreCentro;

            // Datos para enviar por POST
            $datos = [
                "apu" => $apellidoUno,
                "apd" => $apellidoDos,
                "nom" => $nombre,
                "cen" => $nombreCentro,
                "num" => $centro,
                "ide" => $usuario,
                "rol" => $rolUsuario
            ];

            // Redirección según tipo de usuario
            if ($rolUsuario == "U" && in_array(strtoupper($usuario), ["12345678Z", "11111111H"])) {
                redirigirConPost("emergente3.php", []);
            }

            switch ($rolUsuario) {
                case "U":
                    redirigirConPost("principal.php", $datos);
                    break;
                case "T":
                    redirigirConPost("principalUno.php", $datos);
                    break;
                case "A":
                    redirigirConPost("principal3.php", $datos);
                    break;
                case "P":
                    redirigirConPost("principal.php", $datos);
                    break;
                case "Z":
                    redirigirConPost("principalsuper.php", $datos);
                    break;
                case "Y":
                    redirigirConPost("principalua.php", $datos);
                    break;
                case "X":
                    redirigirConPost("emergente.php", $datos);
                    break;
                default:
                    echo "Tipo de usuario no reconocido.";
                    break;
            }
        }
    } else {
        echo "Usuario o clave incorrectos.";
    }
}
?>
