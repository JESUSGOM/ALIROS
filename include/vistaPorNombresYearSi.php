<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
?>

<div class="container-fluid p-4">
    <div class="row">
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
            print"<p><b>$cenden $espacio Usuario-></b> $estaidentificacion $espacio $apell1 $espacio $apell2 $coma $nom $espacio Para año $anio2 Tabla $espacio $tabla</p>";
            /*$espacio $numero $espacio $anio $espacio $anio2 $espacio $tipoanio*/
            //echo var_dump($_POST);
        ?>
    </div>
    <div class="row" width="100%">
        <div class="card card-body">
            <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered" cellspacing="0" style ="width: 100%; height:10%;">
                <thead>
                    <tr>
                        <th class="th-sm" scope="col"><b>Nombre.</b>
                        <th class="th-sm" scope="col"><b>Apellido.</b>
                        <th class="th-sm" scope="col"><b>Apellido.</b>
                        <th class="th-sm" scope="col"><b>F.Entrada.</b>
                        <th class="th-sm" scope="col"><b>H.Entrada.</b>
                        <th class="th-sm" scope="col"><b>F.Salida.</b>
                        <th class="th-sm" scope="col"><b>H.Salida.</b>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $laquery = "SELECT MovNombre, MovApellidoUno, MovApellidoDos, 
                        MovFechaEntrada, MovHoraEntrada, MovFechaSalida, MovHoraSalida 
                        FROM $tabla 
                        WHERE MovCentro = '" .$numero. "' ORDER BY (CAST(MovFechaEntrada AS UNSIGNED)) DESC";
                        $resultado = mysqli_query($conn, $laquery);
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
    <div class="row">
        <input style="background-color: #489F48" type="button" onclick="history.back()" 
        name="Página anterior" value="Página anterior">
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