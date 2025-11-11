<?php
    include("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    include("include/user_session.php");
   
?>
<div class="container p-4">
    <div class="row">
        <?php
             session_start();
             $identifico = $_POST['ide'];
             $espacio = " ";
             $coma = ", ";
             $apellidoUno = $_POST['apu'];
             $apellidoDos = $_POST['apd'];
             $nombre = $_POST['nom'];
             $centroDen = $_POST['cen'];
             $numero = $_POST['num'];
             $rolusuario = $_POST['rol'];
             if($rolusuario == "Z"){
                $super = "SUPERUSUARIO";
             } else {
                $super = "";
             }
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);

        print"
             <p>
                <b>
                    $espacio $centroDen $espacio Usuario->
                </b>
                $estaidentificacion $espacio $estaidentificado $espacio $apellidoUno $espacio $apellidoDos $coma $nombre $espacio $super</p>";
             
             //var_dump($_POST);
        ?>
    </div>
    <div class="row">
        <div class="card card-body">
            <form action="remisiva.php" method="POST" class="form">
                <div class="form-group mx-sm-3">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno; ?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos; ?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre; ?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen; ?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero; ?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico; ?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario; ?>"/>
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
                    <!--<input type="textarea" name="mensaje" class="form-control"
                    placeholder="Mensaje">-->
                    <textarea id="EnEmTexto" name="mensaje" cols="139" rows="5" 
                            placeholder="Esccriba aquí el email" style="resize: none;"></textarea>
                </div>  
                <div class="form-group mx-sm-3">
                    <input type="submit" class="btn btn-success btn-block" name="llamada" value="Enviar correo">
                </div>
                
            </form>
            <div class="row">
                <input style="background-color: #489F48; font-weight:bold;" type="button" 
                onclick="history.back()" name="Página anterior" value="Página anterior">
            </div>
        </div>
        <div class="row"></div>
        
    </div>
</div>