<?php
    require_once("db.php");
    header('Content-Type: text/html; charset=ISO-8859-1');
    //require_once("include/header.php");
    require_once("variables.php");
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
            //echo var_dump($_POST);
            $laquery = "SELECT * FROM Movadoj 
            WHERE MovCentro = '" .$numero. "' AND MovFechaEntrada = '" .$fecha. "' AND MovFechaSalida IS NULL ORDER BY NovNombre ASC'";
            $resultado = mysqli_query($conn, $laquery);
            print"<p><b>$centroDen $espacio Usuario-></b> $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
            $fini = $_POST['fdesde'];
            $ffin = $_POST['fhasta'];
            echo var_dump($_POST);
            
        ?>
    </div>
</div>