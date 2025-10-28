<?php
session_name("Aliros");
session_start();
require_once("db.php");
require_once("include/header.php");
require_once("variables.php");
require 'include/user_sesion.php';

// Conectar a la base de datos con manejo de errores
$conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs', 'Pass@LIr0S', 'Conlabac');

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

// Variables obtenidas por GET
$espacio = " ";
$coma = ", ";
$apellidoUno = $_GET['apu'] ?? '';
$apellidoDos = $_GET['apd'] ?? '';
$nombre = $_GET['nom'] ?? '';
$centroDen = $_GET['cen'] ?? '';
$centro = $_GET['num'] ?? '';
$identifico = $_GET['ide'] ?? '';
$rolusuario = $_GET["rol"] ?? '';

// Verificar si $_SESSION["usuario"] está definida
$identi = $_SESSION["usuario"] ?? '';

// Proteger valores contra inyección SQL
$rolusuario = mysqli_real_escape_string($conn, $rolusuario);
$centro = mysqli_real_escape_string($conn, str_replace(" ", "", $centro));

// Construcción de identificación parcial
$estaidentificacion = "**" . substr($identifico, 2, 2) . "*" . substr($identifico, 5, 1) . "**" . substr($identifico, 8, 1);

// Guardar valores en la sesión
$_SESSION["esp"] = $espacio;
$_SESSION["den"] = $centroDen;
$_SESSION["iden"] = $estaidentificacion;
$_SESSION["apu"] = $apellidoUno;
$_SESSION["apd"] = $apellidoDos;
$_SESSION["nom"] = $nombre;
$_SESSION["coma"] = $coma;
$_SESSION["num"] = $centro;
$_SESSION["ide"] = $identifico;

// Verificar que $_SESSION['tipo'] esté definida
$tipodeusuario = $_SESSION['tipo'] ?? '';

// Obtener datos del menú principal
$mimenu = "SELECT ms.MnNombre, ms.MnUrl 
           FROM Menus ms
           JOIN MapaMenu m ON ms.MnId = m.MmMnId
           WHERE m.MmUsuTipo = '$rolusuario' 
           AND m.MmCentro = '$centro'
           ORDER BY ms.MnId DESC";

$resultmenu = mysqli_query($conn, $mimenu);

// Obtener datos del submenú
$misubnemu = "SELECT ms.IdMenu, ms.NombreMenu as Nombre_del_Menu, mm.MmUrl as URL_del_Menu
              FROM MapaMenu mm
              JOIN Menus ms ON mm.MmMnId = ms.IdMenu
              WHERE mm.MmUsuTipo = '$tipodeusuario'  
              AND ms.EstadoMenu = 1 
              AND mm.MnCentro = '$centro'
              ORDER BY ms.IdMenu ASC";
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container-fluid" id="contenedor">
    <div class="row">
        <div class="col">
            <div class="center-block">
                <p>
                    <?php
                    echo "<br> \n";
                    echo "<b>";
                    echo $espacio;
                    echo $_SESSION['den'] ?? 'Centro no definido';
                    echo $espacio;
                    echo "<b>Usuario:  -> </b>";
                    echo "</b>";
                    echo $espacio;
                    echo $estaidentificacion;
                    echo $espacio;
                    echo $_SESSION['apu'] ?? '';
                    echo $espacio;
                    echo $_SESSION['apd'] ?? '';
                    echo $coma;
                    echo $_SESSION['nom'] ?? '';
                    echo $espacio;
                    echo $_SESSION['tipo'] ?? '';
                    echo "<br> \n";
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="center-block">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <?php
                                while ($row = mysqli_fetch_assoc($resultmenu)) {
                                    echo "<li class=\"nav-item\">";
                                    echo '<a class="nav-link active" aria-current="page" href="' .
                                        htmlspecialchars($row['MnUrl']) . '">' . htmlspecialchars($row['MnNombre']) .
                                        '</a>';
                                    echo "</li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Cerrar la conexión después de haberla usado
mysqli_close($conn);
?>
