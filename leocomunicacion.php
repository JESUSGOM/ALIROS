<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/user_sesion.php");
    session_start();
    $apel1 = $_POST["apu"];
    $apel2 = $_POST["apd"];
    $nom = $_POST["nom"];
    $cenden = $_POST["cen"];
    $numero = $_POST["num"];
    $apellidoUno = $_POST["apell1"];
    $apellidoDos = $_POST["apell2"];
    $nombre = $_POST["nombre"];
    $elNumero = intval($numero);
    $identificacion = $_POST["ide"];
    //var_dump($_SESSION);
    //echo nl2br(" \n ");
    //var_dump($_POST);
    //echo nl2br(" \n ");
?>

<div class="container p-4">
    <div class="row">
        <p>
            <?php
                $espacio = " ";
                $coma = ", ";
                //echo var_dump($_POST);
                $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
                mysqli_set_charset($conn, "utf8");
                if($conn){
                    print"<p><b>$espacio $cenden $espacio Usuario=></b>$identificacion $espacio $apel1 $espacio $apel2 $coma $nom</p>";
                }
                if(!$conn){
                    print"<p><b>$espacio $cenden $espacio Usuario-></b>$identificacion $espacio $apel1 $espacio $apel2 $coma $nom</p>";
                }
            ?>
        </p>
    </div>
    <div class="row" width="100%">
    <table id="tablacomunicacion" class="table table-striped table-bordered table-sm" cellspacing="0" style ="width: 100%; height:10%">
            <thead>
                <tr>
                    <th class="th-sm" scope="col"><b>Orden.</b>
                    <th class="th-sm" scope="col"><b>Fecha.</b>
                    <th class="th-sm" scope="col"><b>Hora.</b>
                    <th class="th-sm" scope="col"><b>Emisor.</b>
                </tr>
                <tr>
                    <th class="th-mx" scope="row" colspan="4"><b>Texto.</b>
                </tr>
            </thead>
            <tbody>
                <?php
                    $laquery = "SELECT EntId, EntOperario, EntFescrito, EntHescrito, EntTexto 
                    FROM EntreTurnos
                    WHERE EntCentro = '" .$numero. "' AND EntUsuario IS NULL ORDER BY EntId ASC";
                    $resultado = mysqli_query($conn, $laquery);
                    while($mostrar = mysqli_fetch_array($resultado)) {
                        echo "<tr>
                        <td scope='col'>$mostrar[0]</td>
                        <td scope='col'>$mostrar[1]</td>
                        <td scope='col'>$mostrar[2]</td>
                        <td scope='col'>$mostrar[3]</td>
                        </tr>
                        <tr>
                        <td scope='row' colspan='4'>$mostrar[4]</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="card card-body">
            <form action="leoanterior.php" method="POST" class="form-inline">
                <div class="form-gruup mx-sm-3">
                    <input type="hidden" name="apu" value="<?php echo $apel1; ?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apel2; ?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nom; ?>"/>
                    <input type="hidden" name="cen" value="<?php echo $cenden; ?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero; ?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identificacion; ?>"/>
                </div>
                <div class="form-group mx-sm-3">
                    <input type="number" name="registro" class="form-control"
                    placeholder="Orden" autofocus>
                </div>
                <div class="form-group mx-sm-3">
                    <input type="submit" class="btn btn-success btn-block" name="salida" value="Leido">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    $('#tablacomunicacion').DataTable({
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