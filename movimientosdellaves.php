<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
?>
<div class="container-fluid p-4">
    <div class="row" width="100%">
        <?php
            $espacio = " ";
            $coma = ", ";
            $apell1 = $_POST['apu'];
            if($apell1 == ""){
                echo "Parametro inexistente";
            }
            $apell2 = $_POST['apd'];
            $nom = $_POST['nom'];
            $cenden = $_POST['cen'];
            $numero = $_POST['num'];
            $identifico = $_POST['ide'];
            $fecha = date("Ymd");
            $anio = $_POST['ejercicio'];
            $tabla = "Movadoj";
            $tabla .=$anio;
            if($anio == 2023){
                $tabla = "Movadoj";
            }
            $anio2 = $anio .= "%";
            $tipoanio = gettype($anio);
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            print"<p><b>$espacio $espacio $cenden $espacio Usuario-></b> $estaidentificacion $espacio $apell1 $espacio $apell2 $coma $nom $espacio $numero</p>";
            /*$espacio $numero $espacio $anio $espacio $anio2 $espacio $tipoanio*/
            //echo var_dump($_POST);
        ?>
    </div>
    <div class="row" width="100%" height="60%;">
        <div class="card card-body">
            <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered" cellspacing="0" style ="width: 100%; height:10%;">
                <thead>
                    <tr>
                        <th class="th-sm" scope="col"><b>Puerta.</b>
                        <th class="th-sm" scope="col"><b>Movimiento.</b>
                        <th class="th-sm" scope="col"><b>F.Entrega.</b>
                        <th class="th-sm" scope="col"><b>H.Entrega.</b>
                        <th class="th-sm" scope="col"><b>F.Recepción.</b>
                        <th class="th-sm" scope="col"><b>H.Recepción.</b>
                        <th class="th-sm" scope="col"><b>Apellido.</b>
                        <th class="th-sm" scope="col"><b>Apellido.</b>
                        <th class="th-sm" scope="col"><b>Nombre.</b>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $esquery = "SELECT L.LlvPuerta, K.KeyLlvOrden, K.KeyApellidoUno, K.KeyApellidoDos, K.KeyNombre, K.KeyFechaEntrega, K.KeyHoraEntrega, K.KeyFechaRecepcion, K.KeyHoraRecepcion 
                        FROM `Llaves` AS L, `KeyMoves` AS K 
                        WHERE ((K.KeyCentro = '".$numero."') 
                                  AND (L.LlvCentro = '".$numero."')
                               AND (K.KeyCentro = L.LlvCentro)
                               AND (L.LlvCodigo = K.KeyLlvOrden))
                               ORDER BY K.KeyFechaEntrega DESC";
                        $resultado = mysqli_query($conn, $esquery);
                        while($mostrar = mysqli_fetch_array($resultado)) {
                            echo "<tr>
                            <td scope='col'>$mostrar[0]</td>
                            <td scope='col'>$mostrar[1]</td>
                            <td scope='col'>$mostrar[2]</td>
                            <td scope='col'>$mostrar[3]</td>
                            <td scope='col'>$mostrar[4]</td>
                            <td scope='col'>$mostrar[5]</td>
                            <td scope='col'>$mostrar[6]</td>
                            <td scope='col'>$mostrar[7]</td>
                            <td scope='col'>$mostrar[8]</td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <input style="background-color: #489F48; font-weight:bold;" type="button" 
        onclick="history.back()" name="Página anterior" value="Página anterior">
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        console.log("Hola");
    $('#dtDynamicVerticalScrollExample').DataTable({
    "scrollY": "50vh",
    "scrollCollapse": true,
    });
    $('.dataTables_length').addClass('bs-select');
    });
</script>
<script language="javascript">
    function doSearch() {
        var tableReg = document.getElementById('regTable');
        var searchText = document.getElementById('searchTerm').value.toLowerCase();
        for (var i = 1; i < tableReg.rows.length; i++) {
            var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
            var found = false;
            for (var j = 0; j < cellsOfRow.length && !found; j++) {
                var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                    found = true;
                }
            }
            if (found) {
                tableReg.rows[i].style.display = '';
            } else {
                tableReg.rows[i].style.display = 'none';
            }
        }
    }
</script>