<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
    require 'fpdf/fpdf.php';
?>
<div class="container p-4">
    <div class="row">
        <p>
            <?php
                $espacio = " ";
                $coma = ", ";
                $apellidoUno = $_POST['apu'];
                $apellidoDos = $_POST['apd'];
                $nombre = $_POST['nom'];
                $centroDen = $_POST['cen'];
                $centro = $_POST['num'];
                $identifico = $_POST['ide'];
                $identi = $_SESSION["usuario"];
                $rolusuario = $_POST["rol"];
                $cargoUsuario = $_POST["car"];
                $buscocadena = " ";
                $cambiocadena = "";
                $estaidentificado = strval($identifico);
                $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
                $centro = str_replace($buscocadena,$cambiocadena,$centro);
                //$usurlogu = $_GET['ul'];
                $asunto = "Acceso a la aplicación Web";
                $elmail = "informatica@laborsordtic.org";
                $textoemail = "El compañero '" + $nom + "', ha accedido a la web Aliros. ";
                $textoemail .= "Desde '" + $centroDen + "', el día y a la hora indicadas en este correo ";
                $nombredelusuario = $usurlogu->nombre;
                $apeunodelusuario = $usurlogu->apellidoUno;
                $apedosdelusuario = $usurlogu->apellidoDos;
                $centrologueado = $usurlogu->nombreCentro;
                $numerologueado = $usurlogu->centro;
                //echo var_dump($_GET);
                print"<p><b>$espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $identi $espacio $apellidoUno $coma $nombre $espacio $rolusuario</p>";
                $registrosvisitas = 0;
            ?>
        </p>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="card card-body">
                <!--<form action="muestroresultados.php" method="POST">-->
                <?php if($centro == "1"){
                    ?>

                <form action="reportes5.php" method="POST">
                    <label for="mes">Mes y año para el informe</label>
                    <input type="month" name="mesano" id="mesano" class="form-control">
                    <input type="text" name="sucursal" list="opciones" name="miopcion">
                    <input type="hidden" name="centro" value="<?php echo $centro; ?>">
                    <input type="hidden" name="centroDen" value="<?php echo $centroDen; ?>">
                    <datalist id="opciones">
                        <option value="1">Machado</option>
                        <option value="2">Cebrián</option>
                    </datalist>
                    <input type="submit"class="btn btn-success btn-block" name="comunico" value="Generar Informe">
                </form>
                <?php }
                if($centro == "2"){?>
                <form action="reportes6.php" method="POST">
                    <label for="mes">Mes y año para el informe</label>
                    <input type="month" name="mesano" id="mesano" class="form-control">
                    <input type="text" name="sucursal" list="opciones" name="miopcion">
                    <input type="hidden" name="centro" value="<?php echo $centro; ?>">
                    <input type="hidden" name="centroDen" value="<?php echo $centroDen; ?>">
                    <datalist id="opciones">
                        <option value="1">Machado</option>
                        <option value="2">Cebrián</option>
                    </datalist>
                    <input type="submit"class="btn btn-success btn-block" name="comunico" value="Generar Informe">
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>