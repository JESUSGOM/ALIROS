<?php
    session_name("Aliros");
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $apellidoUno = isset($_SESSION["apellidoUno"]) ? $_SESSION["apellidoUno"] : "";
    $apellidoDos = isset($_SESSION["apellidoDos"]) ? $_SESSION["apellidoDos"] : "";
    $nombre = isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : "";
    $centroDen = isset($_SESSION["centre"]) ? $_SESSION["centre"] : "";
    $centro = isset($_SESSION["centro"]) ? $_SESSION["centro"] : "";
    $identifico = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "";
    $rolusuario = isset($_SESSION["tipo"]) ? $_SESSION["tipo"] : "";

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title></title>
</head>
<body>
    <div class="container-fluid" id="contenedor">
        <div class="row">
            <div class="col">
                <div class="center-block">
                    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                        <div class="container-fluid" width="100%">
                            <a href="index.php" class="navbar-brand"><img src="img/logoitc-30.png" class="rounded float-left" alt="ITC"></a>
                            <a href="" class="navbar-brand rounded float-none" style="font-size: 10px;">
                                <?php
                                $espacio = " ";
                                $coma = ", ";

                                $estaidentificacion = "**" . substr($identifico, 2, 2) . "*" . substr($identifico, 5, 1) . "**" . substr($identifico, 8, 1);


                                echo "<br> \n";
                                echo "<b>";
                                echo $espacio;
                                echo $centroDen; //Usar variable previamente definida
                                echo $espacio;
                                echo "<b>Usuario:  -> </b>";
                                echo "</b>";
                                echo $espacio;
                                echo $estaidentificacion; //Usar variable previamente definida

                                echo $espacio;
                                echo $apellidoUno;
                                echo $espacio;
                                echo $apellidoDos;
                                echo $coma;
                                echo $nombre;
                                echo $espacio;
                                echo $rolusuario;
                                echo $espacio;
                                echo $centro;
                                ?>
                            </a>

                            <a href="" class="navbar-brand"><img src="img/Envera_Logo_79_30.png" class="rounded float-right" alt="Laborsord"></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="center-block" id="tablageneral">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
                        <div class="container-fluid">
                            <!--<a class="navbar-brand" href="#">Navbar</a>-->
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown"
                                    aria-expanded="true" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <?php
                                $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
                                mysqli_set_charset($conn, "utf8");
                                // Obtener datos del menú principal
                                $mimenu = "SELECT MnNombre, MnUrl, MnId, MnSvg, MnParentId
                                    FROM Menus, MapaMenu
                                    WHERE MmUsuTipo = '$rolusuario' 
                                   AND MmCentro = '$centro'
                                   AND MnId = MmMnId
                                   AND MnParentId = 0
                                   ORDER BY MnId"; //Añadido filtro MnParentId

                                    $resultmenu = mysqli_query($conn, $mimenu);


                                    if (!$resultmenu) {
                                        die("Error en la consulta del menú principal: " . mysqli_error($conn));
                                    }
                                    if($resultmenu->num_rows > 0) {
                                        while ($row = $resultmenu->fetch_assoc()) {
                                            ?>
                                            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                                <ul class="navbar-nav">
                                                    <li class="nav-item dropdown list-inline-item">
                                                        <button class="btn btn-success dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="true">
                                                            <b>
                                                                <?php
                                                                echo $row['MnNombre'];
                                                                $idmenu = $row['MnId'];
                                                                //echo "-" .$idmenu;
                                                                ?>
                                                            </b>
                                                        </button>
                                                        <?php
                                                        //mysqli_close($conn);
                                                        //$conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
                                                        //mysqli_set_charset($conn, "utf8");
                                                        $misubmenu = "SELECT MnNombre, MnUrl, MnId
                                                                    FROM Menus, MapaMenu
                                                                    WHERE MnParentId = $idmenu
                                                                    AND MmUsuTipo = '$rolusuario'
                                                                    AND MmCentro = '$centro'
                                                                    AND MnId = MmMnId
                                                                    ORDER BY MnId";

                                                        $resultsubmenu = mysqli_query($conn, $misubmenu);
                                                        if (!$resultsubmenu) {
                                                            die("Error en la consulta del submenú: "
                                                                . mysqli_error($conn));
                                                        }
                                                        ?>
                                                        <ul class="dropdown-menu dropdown-menu-success">
                                                            <?php
                                                            if(mysqli_num_rows($resultsubmenu) > 0) {
                                                                while($row2 = $resultsubmenu->fetch_assoc()) {
                                                                    ?>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                           href="<?php echo $row2['MnUrl']; ?>">
                                                                            <p style="color: #146C43">
                                                                                <b>
                                                                                    <?php echo $row2['MnNombre']; ?>
                                                                                </b>
                                                                                <?php echo $row2['MnId']; ?>
                                                                            </p>
                                                                        </a>
                                                                    </li>

                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                    }
                            //mysqli_close($conn);
                            ?>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
