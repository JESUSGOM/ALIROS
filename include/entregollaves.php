<?php  
    require_once("db.php");
    //header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    session_start();
?>
<div class="container">
    <div class="row">
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
            
            $fecha = date("Ymd");
            $fechaHoy = getdate();
            mysqli_set_charset($conn, "utf8");
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            print"<p><b>$centroDen $espacio Usuario-></b>$estaidentificacion $espacio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
            
        ?>
    </div>
    <div class="row" width="100%">
        <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
                <tr>
                    <th class="th-sm" scope="col"><b>Codigo.</b></th>
                    <th class="th-sm" scope="col"><b>Puerta.</b></th>
                    <th class="th-sm" scope="col"><b>Planta.</b></th>
                    <th class="th-sm" scope="col"><b>Cajetin.</b></th>
                    <th class="th-sm" scope="col"><b>Restriccion.</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $laquery = "SELECT LlvCodigo, LlvPuerta, LlvPlanta, LlvCajetin, LlvRestriccion 
                    FROM Llaves WHERE LlvCentro = '" .$numero. "' ORDER BY LlvCodigo ASC";
                    $resultado = mysqli_query($conn, $laquery);
                    while($mostrar = mysqli_fetch_array($resultado)) {
                        echo "<tr>
                        <td scope='col'>$mostrar[0]</td>
                        <td scope='col'>$mostrar[1]</td>
                        <td scope='col'>$mostrar[2]</td>
                        <td scope='col'>$mostrar[3]</td>
                        <td scope='col'>$mostrar[4]</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="card card-body">
            <form action="asignollave.php" method="POST" class="form-inline">
                <div class="form-group mx-sm-3">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno; ?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos; ?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre; ?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen; ?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero; ?>"/>
                    <input type="text" name="registro" class="form-control"
                    placeholder="Orden" autofocus>
                    <input type="date" name="fecha" class="form-control">
                    <input type="time" name="hora" class="form-control" stpep="1"> 
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                    <input type="text" name="apelli1" class="form-control" placeholder="Primer Apellido">
                    <input type="text" name="apelli2" class="form-control" placeholder="Segundo Apellido">
                </div>
                <div class="form-group mx-sm-3">
                    <input type="submit" class="btn btn-success btn-block" name="asignokey" value="Asignar">
                </div>
            </form>
        </div>                
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dtDynamicVerticalScrollExample').DataTable({
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
        $('.dataTables_length').addClass('bs-select');  
    });
</script>
