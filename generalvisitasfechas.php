<?php
    require_once("db.php");
    header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("include/header.php");
    require_once("variables.php");
?>
<div class="container p-4">
    <div class="row">
        <?php
            session_start();
            $apellidoUno = $_SESSION["apellidoUno"];
            $apellidoDos = $_SESSION["apellidoDos"];
            echo $apellidoUno;
            $espacio = " ";
            $coma = ", ";
            //$apellidoUno = $_POST['apu'];
            //if($apellidoUno == ""){
                //echo "Parametro inexistente";
            //}
            //$apellidoDos = $_POST['apd'];
            $nombre = $_POST['nom'];
            $centroDen = $_POST['cen'];
            $numero = $_POST['num'];
            $fecha = date("Ymd");
            //echo var_dump($_POST);
            $laquery = "SELECT * FROM Movadoj 
            WHERE MovCentro = '" .$numero. "' AND MovFechaEntrada = '" .$fecha. "' AND MovFechaSalida IS NULL ORDER BY NovNombre ASC'";
            $resultado = mysqli_query($conn, $laquery);
            print"<p><b>$centroDen $espacio Usuario-></b> $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
        ?>
        <!--
        <h2 style="font-size: x-small;">
            <?php print"<p><b>$centroDen $espacio Usuario-></b> $apellidoUno $espacio $apellidoDos $coma $nombre</p>"; ?>
        </h2>
        -->
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form method="POST">
                    <div class="card card-body">
                        <form action="entrefechas.php" method="POST">
                            <div class="form-gruup">
                                <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                                <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                                <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                                <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                                <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                                <label>Fecha Entrada Inicial.:</label>
                                <input class="form-control" type="date" name="fdesde" autofocus>
                                <label>Fecha Entrada Final.:</label>
                                <input class="form-control" type="date" name="fhasta">
                            </div>
                            <input type="submit" class="btn btn-success btn-block" 
                            name="entrada" value="Mostrar">
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--<div class="row">
        <iframe id="framefechas" title="Entradas de fechas" width="100%" height="250px" src="entrefechas.php"></iframe>
    </div>-->
</div>