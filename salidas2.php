<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");   
    session_start();
?>
<div class="container-flex">
    <div class="row">
        <?php
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
            $identifico = $_POST['ide'];
            $fecha = date("Ymd");
            $fechaHoy = getdate();
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            session_start();
            $_SESSION["esp"] = $espacio;
            $_SESSION["den"] = $centroDen;
            $_SESSION["iden"] = $estaidentificacion;
            $_SESSION["apu"] = $apellidoUno;
            $_SESSION["apd"] = $apellidoDos;
            $_SESSION["nom"] = $nombre;
            $_SESSION["coma"] = $coma;
            $_SESSION["num"] = $numero;
            $_SESSION["ide"] = $identifico;
            $super = "SUPERUSUARIO";
            
            print"<p><b>$espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $apellidoUno $espacio $apellidoDos $coma $nombre $espacio $super</p>";
        ?>
    </div>
    <div class="row" width="100%">
        <div class="card card-body">
            <table id="tablasalidas" class="table table-striped table-bordered table-sm" cellspacing="0" style ="width: 100%; height:10%">
                <thead>
                    <tr>
                        <th class="th-sm" scope="col"><b>Orden.</b></th>
                        <th class="th-sm" scope="col"><b>Nombre.</b></th>
                        <th class="th-sm" scope="col"><b>Apellido.</b></th>
                        <th class="th-sm" scope="col"><b>Apellido.</b></th>
                        <th class="th-sm" scope="col"><b>Procedencia.</b></th>
                        <th class="th-sm" scope="col"><b>Destino.</b></th>
                        <th class="th-sm" scope="col"><b>Planta.</b></th>
                        <th class="th-sm" scope="col"><b>Entrada.</b></th>
                        <th class="th-sm" scope="col"><b>Hora.</b></th>
                        <th class="th-sm" scope="col"><b>Veh.</b></th>
                        <th class="th-sm" scope="col"><b>Motivo.</b></th>
                        <th class="th-sm" scope="col"><b>SALIDA.</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
                        mysqli_set_charset($conn, "utf8");
                        $laquery = "SELECT MovOrden, MovNombre, MovApellidoUno, MovApellidoDos, MovProcedencia,
                        MovDestino, MovPlanta, MovFechaEntrada, MovHoraEntrada, MovVehiculo, MovMotivo FROM Movadoj 
                        WHERE MovCentro = '" .$numero. "' AND MovFechaEntrada = '" .$fecha. "' AND MovFechaSalida IS NULL ORDER BY MovNombre ASC";
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
                            <td scope='col'>$mostrar[7]</td>
                            <td scope='col'>$mostrar[8]</td>
                            <td scope='col'>$mostrar[9]</td>
                            <td scope='col'>$mostrar[10]</td>
                            <td>";?>
                                <form action="pongosalidasuper.php" method="POST" class="form">
                                    <input type="hidden" name="apu" value="<?php echo $apellidoUno; ?>"/>
                                    <input type="hidden" name="apd" value="<?php echo $apellidoDos; ?>"/>
                                    <input type="hidden" name="nom" value="<?php echo $nombre; ?>"/>
                                    <input type="hidden" name="cen" value="<?php echo $centroDen; ?>"/>
                                    <input type="hidden" name="num" value="<?php echo $numero; ?>"/>
                                    <input type="hidden" name="ide" value="<?php echo $identifico; ?>"/>
                                    <input type="hidden" name="fs" value="<?php echo date('Ymd'); ?>"/>
                                    <input type="hidden" name="hs" value="<?php echo date('His'); ?>"/>
                                    <input type="hidden" name="nr" value="<?php echo $mostrar[0]; ?>"/>
                                    <input type="submit"class="btn btn-success btn-block" name="salida" value="Salida">
                                    <!--<button class="salida-btn" data-id="<?php echo $mostrar[0]; ?>">Salida</button>-->
                                </form>
                                <?php
                                
                            echo "</td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-body">
                <!--<input type="submit" class="btn btn-success btn-block" name="salida" value="Salida">-->
                <input style="background-color: #489F48; font-weight:bold;" type="button" 
                onclick="history.back()" name="Página anterior" value="Página anterior">
            </div>
        </div>
    </div>
    
</div>
<!--<div class="footer" style="background-color: black; position: absolute; bottom: 0; width: 100%; height: 40px; color: white; text-align: center;">
    &copy; 2020-2025 Gombeth Software's
</div>-->

<script>
    $(document).ready(function () {
        $('#tablasalidas').DataTable({
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
<script>
    $(document).ready(function () {
        $('.btn btn-success btn-block').click(function () {
            var id = $(this).data('id');
            alert(id);
            $.post('pongosalidasuper.php', { ID: id }, function (response) {
                alert(response.message);
                location.reload(); // Recargar para actualizar la tabla
            }, 'json');
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.btn btn-success btn-block').click(function() {
            $.ajax({
                'url': 'pongosalidasuper.php',
                'type': 'POST',
                'data': {
                    'id': $(this).date('id')
                },
                'success': function(date) {
                    alert('Data: ' + date);
                    alert(response.message);
                    location.reload();
                },
                'error': function(request, error) {
                    alert('Request: ' + JSON.stringfy(request));
                }
            });
        });
    });
</script>