<div class="row" style="width: 100%; border: rigth 1px; border-top: 1px; border-bottom: 1px;">
        <table class="table-responsive table-bordered">
            <thead style="height: 20px; display:inline-block; width: 100%;  border: 1px solid;">
                <tr style="border-block: 1px;">
                    <td scope="col" style="width: 7%;"><b>Orden</b></td>-->       <!-- 0 -->
                    <td scope="col" style="width: 10%;"><b>Nombre</b></td>     <!-- 1 -->
                    <td scope="col" style="width: 9%;"><b>Apellido</b></td>    <!-- 2 -->
                    <td scope="col" style="width: 9%;"><b>Apellido</b></td>    <!-- 3 -->
                    <td scope="col" style="width: 10%;"><b>Procedencia</b></td><!-- 4 -->
                    <td scope="col" style="width: 10%;"><b>Destino</b></td>    <!-- 5 -->
                    <td scope="col" style="width: 10%;"><b>Plt</b></td>         <!-- 6 -->
                    <td scope="col" style="width: 5%;"><b>Entra.     </b></td> <!-- 7 -->
                    <td scope="col" style="width: 5%;"><b>Hora.</b></td>       <!-- 8 -->
                    <td scope="col" style="width: 3%;"><b>Veh</b></td>         <!-- 9 -->
                    <td scope="col" style="width: 19%;"><b>Motivo</b></td>     <!--10 -->
                    <td scope="col" style="width: 5%;"><b>Opcion</b></td>      <!--11 -->
                </tr>
            </thead>
            <tbody style="height: 200px; display:inline-block; width:100%; overflow: auto; border: 1px solid;">
                <?php 
                    $conn->set_charset('utf-8');
                    echo nl2br(" \n");
                    echo "Conexión establecida";
                    $lineas = 0;
                    $laquery = "SELECT MovOrden, MovNombre, MovApellidoUno, MovApellidoDos, MovProcedencia,
                    MovDestino, MovPlanta, MovFechaEntrada, MovHoraEntrada, MovVehiculo, MovMotivo FROM Movadoj 
                    WHERE MovCentro = '" .$numero. "' AND MovFechaEntrada = '" .$fecha. "' AND MovFechaSalida IS NULL ORDER BY MovNombre ASC";
                    $resultado = mysqli_query($conn, $laquery);
                    while($mostrar = mysqli_fetch_array($resultado)) {
                        echo "<tr>
                            <td style='width: 6%; '>" .$mostrar[0]. "</td>              <!-- 0 -->
                            <td style='width: 8%; '>" .substr($mostrar[1],0,10). "</td> <!-- 1 -->
                            <td style='width: 8%; '>" .substr($mostrar[2],0,10). "</td> <!-- 2 -->
                            <td style='width: 8%; '>" .substr($mostrar[3],0,10). "</td> <!-- 3 -->
                            <td style='width: 8%; '>" .substr($mostrar[4],0,10). "</td> <!-- 4 -->
                            <td style='width: 7%; '>" .substr($mostrar[5],0,8). "</td>  <!-- 5 -->
                            <td style='width: 7%; '>" .$mostrar[6]. "</td>              <!-- 6 -->
                            <td style='width: 5%; '>" .$mostrar[7]. "</td>              <!-- 7 -->
                            <td style='width: 5%; '>" .$mostrar[8]. "</td>              <!-- 8 -->
                            <td style='width: 3%; '>" .$mostrar[9]. "</td>              <!-- 9 -->
                            <td style='width: 19%; '>" .$mostrar[10]. "</td>            <!--10 -->
                            <td style='width: 5%;'>
                            
                            </td>                                                       <!--11 -->
                            </tr>";
                        
                        $lineas++;
                    }   
                ?>
            </tbody>
           
        </table>
        <div class="row">
        <?php
            echo nl2br(" \n ");
            echo "<b>Registros =</b>  $lineas ";
        ?>
        </div>
        
                
    </div>-->
    
    <div class="row">
        
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="pongosalida.php" method="POST">
                    <div class="form-gruup">
                        <input type="hidden" name="apu" value="<?php echo $apellidoUno; ?>"/>
                        <input type="hidden" name="apd" value="<?php echo $apellidoDos; ?>"/>
                        <input type="hidden" name="nom" value="<?php echo $nombre; ?>"/>
                        <input type="hidden" name="cen" value="<?php echo $centroDen; ?>"/>
                        <input type="hidden" name="num" value="<?php echo $numero; ?>"/>
                        <input type="number" name="registro" class="form-control"
                        placeholder="Orden" autofocus>
                        <input type="date" name="fecha" class="form-control">
                        <input type="time" name="hora" class="form-control" stpep="1"> 
                    </div>
                    <input type="submit" class="btn btn-success btn-block"
                    name="salida" value="Salida">
                </form>
            </div>
        </div>
    </div>