<?php
    include("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    include("user_session.php");
    session_start();
    $identifico = $_POST['ide'];
    $espacio = " ";
    $coma = ", ";
    $apellidoUno = $_POST['apu'];
    $apellidoDos = $_POST['apd'];
    $nombre = $_POST['nom'];
    $centroDen = $_POST['cen'];
    $numero = $_POST['num'];
    print"<p><b>$centroDen $espacio Usuario-></b>$identifico $espaio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
    
    //var_dump($_POST);
?>
<div class="row">
    <div class="card card-body">
        <form action="misivas.php" method="POST" class="form">
            <div class="form-group mx-sm-3">
                <input type="hidden" name="apu" value="<?php echo $apellidoUno; ?>"/>
                <input type="hidden" name="apd" value="<?php echo $apellidoDos; ?>"/>
                <input type="hidden" name="nom" value="<?php echo $nombre; ?>"/>
                <input type="hidden" name="cen" value="<?php echo $centroDen; ?>"/>
                <input type="hidden" name="num" value="<?php echo $numero; ?>"/>
                <input type="hidden" name="ide" value="<?php echo $identifico; ?>"/>
            </div>
            <div class="form-group mx-sm-3">
                <input type="date" name="fecha" class="form-control">
            </div>
            <div class="form-group mx-sm-3">
                <input type="time" name="hora" class="form-control" stpep="1">
            </div>
            <div class="form-group mx-sm-3">
                <input type="email" name="emilio" class="form-control" placeholder="email">
            </div>
            <div class="form-group mx-sm-3">
                <input type="text" name="asunto" class="form-control" placeholder="asunto">
            </div>  
            <div class="form-group mx-sm-3">
                <input type="textarea" name="mensaje" class="form-control"
                placeholder="Mensaje">
            </div>  
            <div class="form-group mx-sm-3">
                <input type="submit" class="btn btn-success btn-block" name="llamada" value="enviocorreo">
            </div>
        </form>
    </div>
</div>
