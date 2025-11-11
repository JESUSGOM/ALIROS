<?php  
    require_once("db.php");
    //header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("include/header.php");
    require_once("variables.php");
?>

<div class="container-flex">
    <div class="row">
        <div class="col">
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
                $estaidentificado = strval($identifico);
                if($identifico == "42086955Z" OR $identifico == "42086955z" OR $identifico == "42086599A" OR $identifico == "42086599a"){
                    $super = "SUPERUSUARIO";
                } else {
                    $super = "";
                }
                $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
                print"<p><b>$espacio $espacio $espacio $cenden $espacio Usuario-></b> $estaidentificacion $espacio $apell1 $espacio $apell2 $coma $nom $espacio $super</p>";
                $registrosPorPagina = 5;
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="table-responsive" style="overflow-x: auto;">
                <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" style ="width: 100%; min-width: 1200px; height:10%">
                    <thead>
                        <tr>
                            <th><b>Nombre.</b>
                            <th><b>Apellido 1.</b>
                            <th><b>Apellido 2.</b>
                            <th><b>Procedencia.</b>
                            <th><b>Destino.</b>
                            <th><b>Planta.</b>
                            <th><b>F.Entrada.</b>
                            <th><b>H.Entra.</b>
                            <th><b>F.Salida.</b>
                            <th><b>H.Salida.</b>
                            <th><b>Coche.</b>
                            <th><b>Motivo.</b>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
                            mysqli_set_charset($conn, "utf8");
                            $lq = "SELECT MovNombre, MovApellidoUno, MovApellidoDos, MovProcedencia, 
                            MovDestino, MovPlanta, MovFechaEntrada, MovHoraEntrada, MovFechaSalida,
                            MovHoraSalida, MovVehiculo, MovMotivo
                            FROM Movadoj 
                            WHERE MovCentro = '".$numero."'
                            ORDER BY MovFechaEntrada DESC";
                            $resultado = mysqli_query($conn, $lq);
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
                                    <td scope='col'>$mostrar[9]</td>
                                    <td scope='col'>$mostrar[10]</td>
                                    <td scope='col'>$mostrar[11]</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col">
            <div class="card card-body">
                <input style="background-color: #489F48; font-weight:bold;" type="button" 
                onclick="history.back()" name="Página anterior" value="Página anterior">
            </div>
        </div>
    </div>
</div>
<!--<div class="footer" style="background-color: black; position: absolute; bottom: 0; width: 100%; height: 40px; color: white; text-align: center;">
    &copy; 2020-2025 Gombeth Software's
</div>-->
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
    



<?php
    $laquery = "SELECT * FROM Movadoj WHERE MovCentro = '" .$numero. "' ORDER BY MovOrden ASC";
?>