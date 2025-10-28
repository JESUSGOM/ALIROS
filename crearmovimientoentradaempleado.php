<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/inputmask.min.js"></script>
        <script>
            function mostrarDatos() {
                var denominacion = document.getElementById("denominacion").value;
                var numero = <?php echo $numero; ?>;
                if (denominacion !== "") {
                    $.ajax({
                        url: 'obtener_prd_cif.php',
                        type: 'POST',
                        data: {denominacion: denominacion, numero: numero},
                        success: function(response) {
                            document.getElementById("prd_cif").value = response;
                            mostrarEmpleados(response, numero);
                        }
                    });
                }
            }

            function mostrarEmpleados(prdCif, centro) {
                $.ajax({
                    url: 'obtener_empleados.php',
                    type: 'POST',
                    data: {prdCif: prdCif, centro: centro},
                    success: function(response) {
                        document.getElementById("empleado_nif").innerHTML = response;
                    }
                });
            }

            function mostrarCampos() {
                var empleado = document.getElementById("empleado_nif").value;
                if (empleado === "Otro") {
                    document.getElementById("campos_adicionales").style.display = 'block';
                } else {
                    document.getElementById("campos_adicionales").style.display = 'none';
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
                        <form action="registro_movimiento.php" method="post">
                            <label for="denominacion"><b>Selecciona un proveedor:  </b></label>
                            <select id="denominacion" name="denominacion" onchange="mostrarDatos()">
                                <option value="" selected>Seleccionar</option>
                                <?php
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
                            <input type="hidden" id="prd_cif" name="prd_cif">
                            <input type="hidden" id="centro" name="centro" value="<?php echo $numero; ?>">
                            <br>

                            <label for="empleado_nif"><b>Selecciona un empleado:  </b></label>
                            <select id="empleado_nif" name="empleado_nif" onchange="mostrarCampos()">
                                <option value="" selected>Seleccionar</option>
                            </select>
                            <br>

                            <div id="campos_adicionales" style="display:none;">
                                <label for="nuevo_empleado_nif">NIF Empleado:</label>
                                <input type="text" id="nuevo_empleado_nif" name="nuevo_empleado_nif"><br>

                                <label for="nuevo_empleado_nombre">Nombre:</label>
                                <input type="text" id="nuevo_empleado_nombre" name="nuevo_empleado_nombre"><br>

                                <label for="nuevo_empleado_apellido1">Primer Apellido:</label>
                                <input type="text" id="nuevo_empleado_apellido1" name="nuevo_empleado_apellido1"><br>

                                <label for="nuevo_empleado_apellido2">Segundo Apellido:</label>
                                <input type="text" id="nuevo_empleado_apellido2" name="nuevo_empleado_apellido2"><br>

                                <label for="nuevo_empleado_telefono">Teléfono:</label>
                                <input type="text" id="nuevo_empleado_telefono" name="nuevo_empleado_telefono"><br>

                                <label for="nuevo_empleado_email">Email:</label>
                                <input type="text" id="nuevo_empleado_email" name="nuevo_empleado_email"><br>

                                <label for="nuevo_empleado_cargo">Cargo:</label>
                                <input type="text" id="nuevo_empleado_cargo" name="nuevo_empleado_cargo"><br>
                            </div>

                            <label for="fecha_hora_entrada">Fecha y Hora de Entrada:</label>
                            <input type="datetime-local" id="fecha_hora_entrada" name="fecha_hora_entrada" required><br>

                            <button type="submit">Registrar Movimiento</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </body>
</html>
