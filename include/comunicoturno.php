<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/user_sesion.php");
    
    session_start();
?>
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
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
            $identifico = $_POST['ide'];
            session_start();
            //$identifico = $_SESSION['user'];
            //echo var_dump($_POST);
            print"<p><b>$centroDen $espacio Usuario-></b>$identifico $espacio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
        ?>
    </div>
    <div class="row">
        <div class="card card-body">
            <form action="comunicosiguiente.php" method="POST" class="form bordeer" 
            id="formulario-entreturnos">
                <div class="form-group row">
                    <input type="hidden" name="num" value="<?php echo $numero; ?>"/> 
                    <input type="hidden" name="apel1" VALUE="<?php echo $apellidoUno; ?>"/>
                    <input type="hidden" name="apel2" VALUE="<?php echo $apellidoDos; ?>"/>
                    <input type="hidden" name="nom" VALUE="<?php echo $nombre; ?>"/>
                    <input type="hidden" name="cen" VALUE="<?php echo $centroDen; ?>"/>
                    <input type="hidden" name="ide" VALUE="<?php echo $identifico; ?>"/>
                </div>
            </form>
            <div class="form-grpup row">
                <label for="ejemplotextarea">Texto del comunicado.:</label>
                <textarea class="form-control" rows="10" cols="25" name="areadetexto" form="formulario-entreturnos"></textarea>
            </div>
            <input form="formulario-entreturnos" type="submit" class="btn btn-success btn-block" name="indicencia" value="Comunicar">
        </div>
    </div>
</div>