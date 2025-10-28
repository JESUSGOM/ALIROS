<?php
    //session_name("Aliros");
    //session_start();
    //echo var_dump($_SESSION);
    // Verificar que las variables de sesión estén definidas antes de usarlas
    $apellidoUno = isset($_SESSION["apellidoUno"]) ? $_SESSION["apellidoUno"] : "";
    $apellidoDos = isset($_SESSION["apellidoDos"]) ? $_SESSION["apellidoDos"] : "";
    $nombre = isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : "";
    $centroDen = isset($_SESSION["centre"]) ? $_SESSION["centre"] : "";
    $centro = isset($_SESSION["centro"]) ? $_SESSION["centro"] : "";
    $identifico = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "";
    $rolusuario = isset($_SESSION["tipo"]) ? $_SESSION["tipo"] : "";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta charset="UTF-8" />
    <meta http-equiv=”Content-Type” content=”text/html;″ />
    <meta http-equiv="Content-Type" name="viewport" content="width=device-width,
    initial-scale=1.0;/>
    <title>Aliros</title>
    <!-- BOOTSTRAP -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
    <link href="include/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="icon" href="img/descargalogo.ico">
    <!-- Latest compiled and minified JavaScript -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap/5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">-->
    <link rel=" " href="include/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
          crossorigin="anonymous">
    <script src="include/moment-with-locales.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="include/jquery.dataTables.min.js"></script>
    <scirpt src="include/jquery-3.3.1.min.js"></scirpt>
    <script>
        $(document).ready(function(){
            $('#tablageneral').DataTables({
                "order": [[1,"asc"]],
                "language": {
                    "lengMenu": "Ver _MENU_ registros por página.",
                    "info": "Mostrando página _PAGES_ de _PAGES_",
                    "infoEmpty": "No hay datos disponibles",
                    "infoFiltered": "(filtrada de _MAX_ líneas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron visitas",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous">
    </script>
</head>
<body>

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
<!--        <a href="" class="navbar-brand rounded float-none" style="font-size: 10px;">-->
<!--            Creado y desarrollado por Gombeth Sofware's en colaboración con Envera Empleo, S.L.U. para el Instituto-->
<!--            Tecnológico de Canarias.-->
<!--        </a>-->
        <a href="" class="navbar-brand"><img src="img/Envera_Logo_79_30.png" class="rounded float-right" alt="Laborsord"></a>
        <!--<a href="" class="navbar-brand"><img src="img/logo-laborsord--transparente.png" class="rounded float-right" alt="Laborsord"></a>-->
    </div>
</nav>