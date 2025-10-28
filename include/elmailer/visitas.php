<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    
    session_start();
?>
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<div class="container p-4">
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
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            print"<p><b>$espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
        ?>
    </div>
    <div class="row">
        <form action="guardarvisita.php" method="POST">
            <p>Nombre.: <input type="text" name="nomvisitante" 
            required size="62" placeholder="Nombre del visitante"
            minlength="1" maxlength="60"></p>
            <p>Primer Apellido.: <input type="text" name="ap1visitante" 
            required size="62" placeholder="Primer apellido"
            minlength="1" maxlength="60"></p>
            <p>Segundo Apellido.: <input type="text" name="ap2visitante"
            size="62" placeholder="Segundo apellido"
            minlength="1" maxlength="60"></p>
            <p>Procede.: <input type="text" name="procedencia"
            size="102" placeholder="Indicar de donde procede solo si no es personal del ITC o empresa de alquiler"
            minlength="1" maxlength="100"></p>
            <p>Destino y planta.: 
                <select name="empresa">
                    <?php
                        $query2 = "SELECT AlqEmpresa FROM Alquileres WHERE AlqCentro = '" .$numero. "'";
                        $resultado = mysqli_query($conn, $query2);
                        if($resultado = mysqli_query($conn, $query2)) {
                            while($fila = mysqli_fetch_row($resultado)) {
                                echo '<option value='.$fila[0].'>'.$fila[0].'</option>';
                            }
                        }
                    ?>
                </select>
                <select name="planta">
                    <?php
                        $query2 = "SELECT PltPlanta FROM Plantas WHERE PltCentro = '" .$numero. "'";
                        $resultado = mysqli_query($conn, $query2);
                        if($resultado = mysqli_query($conn, $query2)){
                            while($fila = mysqli_fetch_row($resultado)){
                                echo '<option value='.$fila[0].'>'.$fila[0].'</option>';
                            }
                        }
                    ?>
                </select>
            </p>
            
            <p>Fecha y Hora.:
                <input type="date" name="fecha" 
                value="document.addEventListener("DOMContentLoaded", function(event) {
                    moment.locale('es');
                    var upDate = function() {
                    var elFecha = document.querySelector("#fecha");
                    var elHora = document.querySelector("#hora");
                    var nowDate = moment(new Date());
                    elHora.textContent = nowDate.format('HH:mm:ss');
                    elFecha.textContent =
                    nowDate.format('dddd DD [de] MMMM [de] YYYY ');
                }
                    setInterval(upDate, 1000);
                });"> 
                <input type="time" name="hora" value="hora"></input>
            </p>
            <p name="motivo">
                <textarea cols="50" name="motivo" maxlength="250" placeholder="Motivo" cols="100"></textarea> 
            </p>
            <p>Vehículo.: 
                <?php header('Content-Type: text/html; charset=ISO-8859-1'); ?>
                <select name="vehi">
                    <option value="No">No</option>
                    <option value="Si">Si</option>
                </select>
            </p>
            <?php 
                $procedencia = $_POST['procedencia'];
                $empresa = $_POST['empresa'];
                $laplanta = $_POST['planta'];
                $nombreVisitante = $_POST['nomvisitente'];
                $vehiculo = $_POST['coche'];
                $coches = $_POST['vehi'];
            ?>
            <input type="hidden" name="apeu" value="<?php echo $apellidoUno;?>">
            <input type="hidden" name="aped" value="<?php echo $apellidoDos;?>">
            <input tyoe="hidden" name="nom" value="<?php echo $nombre;?>">
            <input type="hidden" name="den" value="<?php echo $centroDen;?>">
            <input type="hidden" name="cen" value="<?php echo $numero;?>">
            <input type="hidden" name="emp" value="<?php echo $empresa;?>">
            <imput type="hidden" name="coc" value="<?php echo $vehiculo;?>">
            <input type="hidden" name="destination" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
            <!--<imput type="hidden" name="pla" id="" value="<?php echo $laplanta;?>">-->
            <!--<input type="hidden" name="pro" id="" value="<?php echo $procedencia;?>">-->
            <!--<input type="hidden" name="nomvis" id="" value="<?php echo $_POST['nomvisitente'];?>">-->
            <!--<input type="hidden" name="ap1vis" id="" value="<?php echo $_POST['ap1visitante'];?>">-->
            <!--<input type="hidden" name="ap2vis" id="" value="<?php echo $_POST['ap2visitante'];?>">-->
            <!--<input type="hidden" name="motivo" id="" value="<?php echo $_POST['motivo'];?>">-->
            <input type="submit" name="botonguardar" class="btn btn-success btn-block" value="Grabar">
        </form>
        <!--
        <form action="consulta.php" method="POST">
            <div class="form-gruup">
                <input type="hidden" name="apu" value="<?php echo $apellidoUno; ?>">
                <input type="hidden" name="apd" value="<?php echo $apellidoDos; ?>">
                <input type="hidden" name="nom" value="<?php echo $nombre; ?>">
                <input type="hidden" name="cen" value="<?php echo $centroDen; ?>">
                <input type="hidden" name="num" value="<?php echo $numero; ?>">   
                <input type="submit" class="btn btn-success btn-block"
                        name="entrada" value="Pantalla Principal">
            </div>
            
        </form>
        -->
    </div>
</div>
<?php
    require_once("include/footer.php");
?>