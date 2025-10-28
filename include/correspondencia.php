<?php
    include("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    include("user_session.php");
    require 'include/PHPMailerAutoload.php';
    require 'include/class.phpmailer.php';
    include("user_session.php");
    //var_dump($_POST);
    $apell1 = $_POST['apu'];
    $apell2 = $_POST['apd'];
    $nombre = $_POST['nom'];
    $centro = $_POST['cen'];
    $numero = $_POST['num'];
    $identifico = $_POST['ide'];
    /*
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $emilio = $_POST['emilio'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $fecha2 = substr($fecha,0,4) . substr($fecha,5,2) . substr($fecha,8,2);
    $hora2 = substr($hora,0,2) . substr($hora,3,2) . "00";
    */
    session_start();
    $usu = $_SESSION["usuario"];
    $nombreusuario = $_SESSION["nombre"];
    $apeunousuario = $_SESSION["apellidoUno"];
    $apedosusuario = $_SESSION["apellidoDos"];
    
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
            $fechaHoy = getdate();
            /**$laquery = "SELECT * FROM Movadoj 
            WHERE MovCentro = '" .$numero. "' AND MovFechaEntrada = '" .$fecha. "' AND MovFechaSalida IS NULL ORDER BY NovNombre ASC'";
            $resultado = mysqli_query($conn, $laquery);**/
            print"<p><b>$centro $espacio Usuario-></b>$identifico $espacio $apell1 $espacio $apell2 $coma $nombre</p>";
        ?>
    </div>
    <div class="row">
        <div class="card card-body">
            <form action="grabocorrespondencai.php" method="POST" class="form bordeer">
                <div class="form-group mx-sm-3">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno; ?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos; ?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre; ?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen; ?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero; ?>"/>
                </div>
                <div class="form-group mx-sm-3 form-inline">
                    <label>Fecha.: </label>
                    <input type="date" name="fecha" class="form-control" style="border: 1px solid;" required>
                    <label> Hora.: </label>
                    <input type="time" name="hora" class="form-control" stpep="1" style="border: 1px solid;" required>
                </div>
                <div class="form-group mx-sm-3 form-inline">
                    <label>Remitente.: </label>
                    <input type="text" name="emisor" class="form-control" style="border: 1px solid;"
                    placeholder="Remitente" autofocus maxlength="30" size="30" required>
                </div>
                <div class="form-group mx-sm-3 form-inline">
                    <label>Destinatario.: </label>
                    <input type="text" name="destinatario" class="form-control" style="border: 1px solid;"
                    placeholder="Destinatario" maxlength="30" size="30" required>
                </div>
                <div class="form-group mx-sm-3 form-inline">
                    <label>Mensajería.: </label>
                    <input type="text" name="mensajeria" class="form-control" style="border: 1px solid;"
                    placeholder="Mensajeria" maxlength="30" size="30" required>
                </div>
                <div class="form-group mx-sm-3 form-inline">
                    <label>Bultos.:</label>
                    <input type="number" name="bultos" class="form-control" size="1" style="border: 1px solid;" required>
                </div>
                <div class="form-group mx-sm-3 form-inline">
                    <label> Tipo.: </label>
                    <select name="tipo" style="border: 1px solid;" required>
                        <option>Paquetes</option>
                        <option>Sobres</option>
                    </select>
                    <label> Comunicado.: </label>
                    <select name="comunicado" style="border: 1px solid;" required>
                        <option>No</option>
                        <option>Si</option>
                    </select>
                    <label> Forma comunicación </label>
                    <select name="formacomunicado" style="border: 1px solid;" required>
                        <option> Guardado en Custodia </option>
                        <option> Por Teléfono </option>
                        <option> Entregado en Mano </option>
                        <option> Entregado en Destino </option>
                        <option> Pasará a recogerlo </option>
                    </select>
                </div>
                <div class="form-group mx-sm-3 form-inline">
                    <label>Fecha de entrega.: </label>
                    <input type="date" name="fecha2" class="form-control" style="border: 1px solid;">
                    <label> Hora de entrega.: </label>
                    <input type="time" name="hora2" class="form-control" stpep="1" style="border: 1px solid;">  
                </div>
                <div class="form-group mx-sm-3 form-inline">
                    <input type="submit" name="guardocorrespondencia" class="btn btn-success btn-lg justify-content-between" style="border: 1px solid;" value="Recoger"> 
                </div>
            </form>
        </div>
</div>
</div>
