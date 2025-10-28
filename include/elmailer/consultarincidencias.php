<?php
    include("user_session.php");
    require "include/Exception.php";
    require "include/PHPMailer.php";
    require "include/SMTP.php";
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    session_start();
    $identifico = $_POST["ide"];
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
    $esfecha = $_POST["fecha"];
    $fecha = date("Ymd");
    $lahora = substr($hora,0,2).substr($hora,3,2)."00";
    $fechatotal = substr($esfecha,0,4).substr($esfecha,5,2).substr($esfecha,8,2);

?>
<div class="container p-4">
    <div class="row">
        <p>
            <?php
                $espacio = " ";
                $coma = ", ";
                
                //echo var_dump($_POST);
                
                print"<p><b>$espacio $cenden $espacio Usuario-></b>$identifico $espacio $apel1 $espacio $apel2 $coma $nom</p>";
                
            ?>
        </p>
    </div>
    <div class="row" width="190px" >
        <table id="tablaConsultaIndicencias" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm" scope="col"><b>Orden.</b>
                    <th class="th-sm" scope="col"><b>Fecha.</b>
                    <th class="th-sm" scope="col"><b>Hora.</b>
                    <th class="th-sm" scope="col"><b>Texto.</b>
                    <th class="th-sm" scope="col"><b>Comunicado.</b>
                    <th class="th-sm" scope="col"><b>Modo.</b>
                    <th class="th-sm" scope="col"><b>Email.</b>
                </tr>
            </thead>
            <tbody>
                <?php
                    $rt = "SELECT IncId, IncFecha, IncHora, IncTexto, InccomunicadoA, IncModoComunica, IncEmailcomunica FROM Incidencias WHERE IncCentro = '" .$numero. "' ORDER BY IncId ASC";
                    $resultado = mysqli_query($conn, $rt);
                    while($mostrar = mysqli_fetch_array($resultado)) {
                        echo "<tr>
                            <td scope='col'>$mostrar[0]</td>
                            <td scope='col'>$mostrar[1]</td>
                            <td scope='col'>$mostrar[2]</td>
                            <td scope='col'>$mostrar[3]</td>
                            <td scope='col'>$mostrar[4]</td>
                            <td scope='col'>$mostrar[5]</td>
                            <td scope='col'>$mostrar[6]</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    $('#tablaConsultaIndicencias').DataTable({
    "scrollY": "50vh",
    "scrollCollapse": true,
    "order": [[1, "asc"]],
    "language":{
        "lengthMenu": "Ver _MENU_ líneas",
        "info": "Página _PAGE_ de páginas",
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
});
</script>