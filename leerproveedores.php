<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    $sql1 = "SELECT * FROM Proveedores";
    $sql2 = "SELECT PrdDenominacion, PrdContacto, PrdTelefono, PrdEmail, PrdDireccion, 
        PrdProvincia, PrdMunicipio, PrdPais, PrdCodigopostal, PrdWeb, PrdNotas, PrdFechaAlta, 
        PrdFechaExpiracion FROM Proveedores WHERE PrdDenominacion = $denomina AND PrdCentro = $numero";
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable();
        });
        function mostrarDatos() {
            var denominacion = document.getElementById('denominacion').value;
            if(denominacion != "") {
                $.ajax({
                    url: 'obtenerDatos.php',
                    type: 'GET',
                    data: { denominacion: denominacion },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if(data) {
                            $('#PrdCif').val(data.PrdCif);
                            $('#PrdCentro').val(data.PrdCentro);
                            $('#PrdContacto').val(data.PrdContacto);
                            $('#PrdTelefono').val(data.PrdTelefono);
                            $('#PrdEmail').val(data.PrdEmail);
                            $('#PrdDireccion').val(data.PrdDireccion);
                            $('#PrdProvincia').val(data.PrdProvincia);
                            $('#PrdMunicipio').val(data.PrdMunicipio);
                            $('#PrdPais').val(data.PrdPais);
                            $('#PrdCodigopostal').val(data.PrdCodigopostal);
                            $('#PrdWeb').val(data.PrdWeb);
                            $('#PrdNotas').val(data.PrdNotas);
                            $('#PrdFechaAlta').val(data.PrdFechaAlta);
                            $('#PrdFechaExpiracion').val(data.PrdFechaExpiracion);
                        }
                    }
                });
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
                $identifico = $_POST['ide'];
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
                $estaidentificado = strval($identifico);
                $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
                print"<p><b>$espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
                $micentro = $centroDen;

            ?>
        </div> 
        <div class="row">
            <div class="col">
                <div class="card card-body">
                    <form>
                        <label for="denominacion"><b>Selecciona un proveedor:  </b></label>
                        <select id="denominacion" name="denominacion" onchange="mostrarDatos()">
                            <option value="" selected>Seleccionar</option>
                            <?php
                                $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
                                mysqli_set_charset($conn, "utf8");
                                require_once("db.php");
                                $quer = "SELECT PrdDenominacion FROM Proveedores WHERE PrdCentro = $numero";
                                $resu = $conn->query($quer);
                                if($resu->num_rows > 0){
                                    while($row = $resu->fetch_assoc()){
                                        echo "<option value='" . $row['PrdDenominacion'] . "'>" . $row['PrdDenominacion'] . "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </form>
                </div>
                <div class="card card-body">
                    <form>
                        <input type="hidden" name="centro" value="<?php echo $centroDen;?>">
                        <input type="hidden" name="numero" value="<?php echo $numero;?>">
                        <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>">
                        <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>">
                        <input type="hidden" name="nombre" value="<?php echo $nombre;?>">
                        <label for="PrdCif"><b>CIF.:</b></label>
                        <input type="text" id="PrdCif" name="PrdCif" readonly size="11"><br>
                        <label for="PrdContacto"><b>CONTACTO.:</b></label>
                        <input type="text" id="PrdContacto" name="PrdContacto" readonly size="90">
                        <label for="PrdTelefono"><b>TELEFONO.:</b></label>
                        <input type="text" id="PrdTelefono" name="PrdTelefono" readonly size="17"><br>
                        <label for="PrdEmail"><b>EMAIL.:</b></label>
                        <input type="text" id="PrdEmail" name="PrdEmail" readonly size="60">
                        <label for="PrdWeb"><b>WEB.:</b></label>
                        <input type="text" id="PrdWeb" name="PrdWeb" readonly size="58"><br>
                        <label for="PrdDireccion"><b>DIRECCIÓN.:</b></label>
                        <input type="text" id="PrdDireccion" name="PrdDireccion" readonly size="76">
                        <label for="PrdPais"><b>PAÍS.:</b></label>
                        <input type="text" id="PrdPais" name="PrdPais" readonly size="37"><br>
                        <label for="PrdProvincia"><b>PROVINCIA.:</b></label>
                        <input type="text" id="PrdProvincia" name="PrdProvincia" readonly size="35">
                        <label for="PrdMunicipio"><b>MUNICIPIO.:</b>:</label>
                        <input type="text" id="PrdMunicipio" name="PrdMunicipio" readonly size="35">
                        
                        <label for="PrdCodigopostal"><b>CÓDICO POSTAL.:</b></label>
                        <input type="text" id="PrdCodigopostal" name="PrdCodigopostal" readonly size="4"><br>
                        
                        <label for="PrdNotas"><b>NOTAS.:</b></label><br>
                        <textarea id="PrdNotas" name="PrdNotas" readonly cols="142" rows="5" style="resize:none;"></textarea><br>
                        <label for="PrdFechaAlta"><b>FECHA DE ALTA.:</b></label>
                        <input type="date" id="PrdFechaAlta" name="PrdFechaAlta" readonly>
                        <label for="PrdFechaExpiracion"><b>FECHA DE EXPIRACIÓN.:</b></label>
                        <input type="date" id="PrdFechaExpiracion" name="PrdFechaExpiracion" readonly><br>
                        
                    </form>
                </div>
                <div class="card card-body">
                    <input style="background-color: #489F48; font-weight:bold;" type="button" 
                    onclick="history.back()" name="Página anterior" value="Página anterior">
                </div>
            </div>
        </div>
    </div>
</body>
</html>

