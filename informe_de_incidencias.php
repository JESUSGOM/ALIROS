<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
?>
<div class="container-fluid p-4">
    <div class="row" width="100%" style="align-items:center;">
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
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*"
            .substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            print"<p><b>$espacio $espacio $espacio $espacio $cenden $espacio 
            Usuario-></b> $estaidentificacion $espacio $apell1 $espacio $apell2 
            $coma $nom $espacio $numero</p>";
            /*$espacio $numero $espacio $anio $espacio $anio2 $espacio $tipoanio*/
            //echo var_dump($_POST);
        ?>
    </div>
    <div class="row" width="100%" height="60%;">
        <div class="card card-body">
            <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered" cellspacing="0" style ="width: 100%; height:10%;">
                <thead>
                    <tr>
                        <th class="th-sm" scope="col"><b>Fecha.</b>
                        <th class="th-sm" scope="col"><b>Hora.</b>
                        <th class="th-sm" scope="col"><b>Incidencia.</b>
                        <th class="th-sm" scope="col"><b>Destinatario.</b>
                        <th class="th-sm" scope="col"><b>Comunicado a:.</b>
                        <th class="th-sm" scope="col"><b>Forma comunicado.</b>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
                        mysqli_set_charset($conn, "utf8");
                        $esquery = "SELECT IncFecha, IncHora, IncTexto, IncComunicadoA, 
                        IncModoComunica 
                        FROM Incidencias
                        WHERE (IncCentro = '".$numero."')
                        ORDER BY IncFecha DESC";
                        $resultado = mysqli_query($conn, $esquery);
                        while($mostrar = mysqli_fetch_array($resultado)) {
                            echo "<tr>
                            <td scope='col'>$mostrar[0]</td>
                            <td scope='col'>$mostrar[1]</td>
                            <td scope='col'>$mostrar[2]</td>
                            <td scope='col'>$mostrar[3]</td>
                            <td scope='col'>$mostrar[4]</td>
                            <td scope='col'>$mostrar[5]</td>
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