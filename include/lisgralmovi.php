<?php  
    require_once("db.php");
    //header('Content-Type: text/html; charset=ISO-8859-1');
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
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            print"<p><b>$cenden $espacio Usuario-></b> $estaidentificacion $espacio $apell1 $espacio $apell2 $coma $nom</p>";
            $registrosPorPagina = 10;
        ?>
    </div>
    
    <div class="row" width="100%">
        <div class="card card-body">
            <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" style ="width: 100%; height:10%">
                <thead>
                    <tr>
                        <th>Or.</th>
                        <th>Nombre.</th>
                        <th>Apellido.</th>
                        <th>Apellido.</th>
                        <th>Procede.</th>
                        <th>Destino.</th>
                        <th>Planta.</th>
                        <th>Entrada.</th>
                        <th>Entra.</th>
                        <th>Salida.</th>
                        <th>Sale.</th>
                        <th>Coche.</th>
                        <th>Motivo.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $lq = "SELECT * FROM Movadoj WHERE MovCentro = '" .$numero. "' AND MovFechaEntrada IS NOT NULL AND MovFechaSalida IS NOT NULL ORDER BY MovOrden ASC";
                        $resultado = mysqli_query($conn, $lq);
                        while($mostrar = mysqli_fetch_array($resultado)) {
                            echo "<tr>
                            <td scope='col'>$mostrar[0]</td>
                            <td scope='col'>$mostrar[2]</td>
                            <td scope='col'>$mostrar[3]</td>
                            <td scope='col'>$mostrar[4]</td>
                            <td scope='col'>$mostrar[5]</td>
                            <td scope='col'>$mostrar[6]</td>
                            <td scope='col'>$mostrar[7]<td>
                            <td scope='col'>$mostrar[8]<td>
                            <td scope='col'>$mostrar[9]<td>
                            <td scope='col'>$mostrar[10]<td>
                            <td scope='col'>$mostrar[11]<td>
                            <td scope='col'>$mostrar[12]<td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
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
    



<?php
    $laquery = "SELECT * FROM Movadoj WHERE MovCentro = '" .$numero. "' ORDER BY MovOrden ASC";
?>