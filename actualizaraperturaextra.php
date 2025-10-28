<?php
    include("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    include("include/user_session.php");
    //echo var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Apertura Extra</title>
</head>
<body>
    <div class="container p-4">
        <div class="row">
            <div clas="col">
                <div class="center-block">
                    <p>
                        <?php
                        session_start();
                        echo "<br> \n";
                        $espacio = " ";
                        $coma = ", ";
                        $apellidoUno = $_POST['apu'];
                        $apellidoDos = $_POST['apd'];
                        $nombre = $_POST['nom'];
                        $centroDen = $_POST['cen'];
                        $centro = $_POST['num'];
                        $identifico = $_POST['ide'];
                        $identi = $_SESSION["usuario"];
                        $rolusuario = $_SESSION["rol"];
                        $buscocadena = " ";
                        $cambiocadena = "";
                        $estaidentificado = strval($identifico);
                        $usuariorecibido = $estaidentificado;
                        $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
                        $centro = str_replace($buscocadena,$cambiocadena,$centro);
                        $centro2 = $_GET['num'];
                        $_SESSION["esp"] = $espacio;
                        $_SESSION["den"] = $centroDen;
                        $_SESSION["iden"] = $estaidentificacion;
                        $_SESSION["apu"] = $apellidoUno;
                        $_SESSION["apd"] = $apellidoDos;
                        $_SESSION["nom"] = $nombre;
                        $_SESSION["coma"] = $coma;
                        $_SESSION["num"] = $centro2;
                        $_SESSION["ide"] = $identifico;
                        print"<p><b>$espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $identi $espacio $apellidoUno $espacio $apellidoDos $coma $nombre </p>";
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card card-body">
                <h2>Añadir apertura extraordinaria</h2>
                <?php if (isset($mensaje)): ?>
                    <p><?php echo $mensaje; ?></p>
                <?php endif; ?>
                <form method="post" action="actualizar.php">
                    <input type="hidden" name="estaidentificacion" value="<?php echo $estaidentificacion; ?>
                    <input type="hidden" name="identifico" value="<?php echo $identifico; ?>">
                    <input type="hidden" name="identi" value="<?php echo $identi; ?>">
                    <input type="hidden" name="rolusuario" value="<?php echo $rolusuario; ?>">
                    <input type="hidden" name="usuariorecibido" value="<?php echo $usuariorecibido; ?>">
                    <input type="hidden" name="centro" value="<?php echo $centro; ?>">
                    <input type="hidden" name="centroDen" value="<?php echo $centroDen; ?>">
                    <input type="hidden" name="espacio" value="<?php echo $espacio; ?>">
                    <input type="hidden" name="coma" value="<?php echo $coma; ?>">
                    <input type="hidden" name="apellidoUno" value="<?php echo $apellidoUno; ?>">
                    <input type="hidden" name="apellidoDos" value="<?php echo $apellidoDos; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
                    <intpt type="hidden" name="rolusuario" value="<?php echo $rolusuario; ?>">
                    <label for="AeCentro">Centro:</label>
                    <input type="number" name="AeCentro" id="AeCentro" value="<?php echo $centro; ?>" required><br><br>

                    <label for="AeFecha">Fecha:</label>
                    <input type="date" name="AeFecha" id="AeFecha" value="<?php echo $apertura['AeFecha']; ?>" required><br><br>

                    <label for="AeHoraInicio">Hora Inicio:</label>
                    <input type="time" name="AeHoraInicio" id="AeHoraInicio" value="<?php echo $apertura['AeHoraInicio']; ?>" required><br><br>

                    <label for="AeHoraFinal">Hora Final:</label>
                    <input type="time" name="AeHoraFinal" id="AeHoraFinal" value="<?php echo $apertura['AeHoraFinal']; ?>" required><br><br>

                    <label for="AeMotivo">Motivo:</label>
                    <textarea name="AeMotivo" id="AeMotivo" rows="4" cols="50" required><?php echo $apertura['AeMotivo']; ?></textarea><br><br>

                    <input type="submit" value="Actualizar">
                </form>
            </div>
        </div>
    </div>


    <a href="leer.php">Volver a la lista</a>
</body>
</html>