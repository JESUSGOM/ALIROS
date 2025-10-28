<?php  
    require_once("db.php");
    header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
?>
<div class="container p-4">
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
            $fecha = date("Ymd");

            $laquery = "SELECT * FROM Movadoj 
            WHERE MovCentro = '" .$numero. "' AND MovFechaEntrada = '" .$fecha. "' AND MovFechaSalida IS NULL ORDER BY NovNombre ASC'";
            $resultado = mysqli_query($conn, $laquery);
            print"<p><b>$centroDen $espacio Usuario-></b> $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
        ?>
    </div>
    <div class="row">
        <p>Listado general de Visitantes</p>
        <div class="col-sm-12">
            <table id="tabla" class="table table-hover table-condensed table-bordered">
                <tr>Nombre</tr>
                <tr>Apellido</tr>
                <tr>Apellido</tr>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript>">
    $(document).ready(function()){
        $('#tabla').load('tabla1.php');
    };
</script>