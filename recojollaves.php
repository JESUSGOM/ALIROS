<?php  
    require_once("db.php");
    //header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
//    echo var_dump($_SESSION);
//    echo var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
</head>
<body>
<div class="container">
    <div class="justify col-12">
        <?php
            $identifico = $_POST['ide'];
            $espacio = " ";
            $coma = ", ";
            $apellidoUno = $_POST['apu'];
            if($apellidoUno == ""){
                echo "Parametro inexistente";
            }
            $apellidoDos = $_POST['apd'];
            $nombre = $_POST['nom'];
            $centroDen = $_POST['cen'];
            $numero = $_POST['num'];
            $rolusuario = $_POST['rol'];
            $fecha = date("Ymd");
            $fechaHoy = getdate();
            $identi = $_SESSION["usuario"];
            $cargoUsuario = $_POST["car"];
            if($rolusuario == "ZZ"){
                $super = "SUPERUSUARIO";
            } else {
                $super = "" . $cargoUsuario . "";
            }
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
        print"
            <p>
                <b>
                    $espacio $centroDen 
                    $espacio Usuario->
                </b>
                $estaidentificacion $espacio 
                $identi $espacio 
                $apellidoUno $espacio 
                $apellidoDos $coma 
                $nombre $espacio 
                $rolusuario $espacio
                $cargoUsuario
            </p>";
        ?>
    </div>
    <div class="row" width="100%">
        <div class="card card-body">
            <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" style ="width: 100%; height:10%">
                <thead>
                    <tr>
                        <th class="th-sm" scope="col"><b>Orden.</b></th>
                        <th class="th-sm" scope="col"><b>Llave.</b></th>
                        <th class="th-sm" scope="col"><b>F.Entrega.</b></th>
                        <th class="th-sm" scope="col"><b>H.Entrega.</b></th>
                        <th class="th-sm" scope="col"><b>Nombre.</b></th>
                        <th class="th-sm" scope="col"><b>Apellido.</b></th>
                        <th class="th-sm" scope="col"><b>Apellido..</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
                        mysqli_set_charset($conn, "utf8");
                        $laquery = "SELECT KeyOrden, KeyLlvOrden, KeyFechaEntrega, KeyHoraEntrega, KeyNombre,
                        KeyApellidoUno, KeyApellidoDos FROM KeyMoves 
                        WHERE KeyCentro = '" .$numero. "' AND KeyFechaEntrega = '" .$fecha. "' AND KeyFechaRecepcion IS NULL ORDER BY KeyLlvOrden ASC";
                        $resultado = mysqli_query($conn, $laquery);
                        while($mostrar = mysqli_fetch_array($resultado)) {
                            echo 
                            "<tr>
                                <td scope='col'>$mostrar[0]</td>
                                <td scope='col'>$mostrar[1]</td>
                                <td scope='col'>$mostrar[2]</td>
                                <td scope='col'>$mostrar[3]</td>
                                <td scope='col'>$mostrar[4]</td>
                                <td scope='col'>$mostrar[5]</td>
                                <td scope='col'>$mostrar[6]</td>
                                <td stope='col'>
                                    
                                </td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="card card-body">
            <form action="recogerllave.php" method="POST" class="form-inline">
                <div class="form-gruup mx-sm-3">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno; ?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos; ?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre; ?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen; ?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero; ?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario; ?>"/>
                </div>
                <div class="form-group mx-sm-3">
                    <input type="number" name="registro" class="form-control"
                    placeholder="Orden" autofocus>
                    <input type="date" name="fecha" class="form-control">
                    <input type="time" name="hora" class="form-control" stpep="1"> 
                </div>
                <div class="form-group mx-sm-3">
                    <input type="submit" class="btn btn-success btn-block" name="recoger" value="Salida">
                </div>
            </form>
        </div>
        <div class="card card-body">
            <input style="background-color: #489F48; font-weight:bold;" type="button" 
            onclick="history.back()" name="Página anterior" value="Página anterior">
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $('#dtDynamicVerticalScrollExample').DataTable({
        "scrollY": "50vh",
        "scrollCollapse": true,
        "pageLength": 5, // Número de registros por página
        "order": [[1, "asc"]],
        "language":{
            "lengthMenu": "Ver _MENU_ líneas",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay datos para mostrar",
            "loadingRecords": "Cargando...",
            "processing": "En proceso...",
            "search": "Buscar: ",
            "zeroRecords": "No hay datos disponibles.",
            "paginate": {
                "next": "Siguiente.",
                "previous": "Anterior."
            },
        }
    });
    $('.dataTables_length').addClass('bs-select');
});
</script>
</body>
</html>





