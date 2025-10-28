<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    session_start();
?>
<div class="container p-4">
    <div class="row">
        <p>
            <?php
                $identifico = $_POST['ide'];
                $espacio = " ";
                $coma = ", ";
                $apellidoUno = $_POST['apu'];
                $apellidoDos = $_POST['apd'];
                $nombre = $_POST['nom'];
                $centroDen = $_POST['cen'];
                $centro = $_POST['num'];
                $estecentro = intval($elcentro);

                $estaidentificado = strval($identifico);
                $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
                print"<p><b>$centroDen $espacio Usuario-></b>$estaidentificacion $espacio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
            ?>
        </p>
    </div>
    <div class="row">
        <div class="card card-body">
            <form action="guardarincidencia.php" method="POST" id="formulario-incidencia">
                <div class="form-group row">
                    <label for="Fecha" class="col-sm-1 col-from.label">Fecha.:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="fecha">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Hora" class="col-sm-1 col-from.label">Hora.:</label>
                    <div class="col-sm-3">
                    <input type="time" name="hora" class="form-control" stpep="0.1">
                    </div>
                </div>
                
                <div class="form-group row">
                    <input type="hidden" name="num" value="<?php echo $centro; ?>"/> 
                    <input type="hidden" name="apu" VALUE="<?php echo $apellidoUno; ?>"/>
                    <input type="hidden" name="apd" VALUE="<?php echo $apellidoDos; ?>"/>
                    <input type="hidden" name="nom" VALUE="<?php echo $nombre; ?>"/>
                    <input type="hidden" name="cen" VALUE="<?php echo $centroDen; ?>"/>
                    <input type="hidden" name="ide" VALUE="<?php echo $identifico; ?>"/>
                </div>
                
            </form>
            <div class="form-grpup row">
                <label for="ejemplotextarea">Texto de la incidencia.:</label>
                <textarea class="form-control" rows="10" cols="25" name="areadetexto" form="formulario-incidencia"></textarea>
            </div>
            <input form="formulario-incidencia" type="submit" class="btn btn-success btn-block" name="indicencia" value="Comunicar Indicencia">
        </div>
    </div>
</div>