<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    //session_start();
    //require 'include/user_sesion.php';
?>
<div class="container p-4">
    <div class="row">
        <p>
            <?php
                //echo var_dump($_POST);
                //echo "<br> \n";
                $espacio = " ";
                $coma = ", ";
                $apellidoUno = $_POST['apu'];
                $apellidoDos = $_POST['apd'];
                $nombre = $_POST['nom'];
                $centroDen = $_POST['cen'];
                $centro = $_POST['num'];
                $identifico = $_POST['ide'];
                //$identi = $_SESSION["usuario"];
                $buscocadena = " ";
                $cambiocadena = "";
                $estaidentificado = strval($identifico);
                $usuariorecibido = $estaidentificado;
                $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
                $centro = str_replace($buscocadena,$cambiocadena,$centro);
                $centro2 = $_POST['num'];
                //$_SESSION["esp"] = $espacio;
                //$_SESSION["den"] = $centroDen;
                //$_SESSION["iden"] = $estaidentificacion;
                //$_SESSION["apu"] = $apellidoUno;
                //$_SESSION["apd"] = $apellidoDos;
                //$_SESSION["nom"] = $nombre;
                //$_SESSION["coma"] = $coma;
                //$_SESSION["num"] = $centro2;
                //$_SESSION["ide"] = $identifico;
                print"<p><b>$espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $identi $espacio $apellidoUno $espacio $apellidoDos $coma $nombre $espacio <-> $usuariorecibido</p>";
            ?>
        </p>
    </div>
    <div class="row">
        <div class="col">
            <label for="proveedor"><b>Selecciona un proveedor:</b></label>
            <select id="proveedor" name="proveedor" onchange="mostrarEmpleados()">
                <option value="" selected>Seleccionar</option>
                <?php
                    // Conectar a la base de datos
                    include 'db_connection.php';
                    $sql = "SELECT PrdCif, PrdDenominacion FROM Proveedores";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['PrdCif'] . "'>" . 
                                $row['PrdDenominacion'] . "</option>";
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            
                <form id="altaempleadodeproveedor" name="altaempleadodeproveedor" 
                    action="inser_empleadodeproveedor.php" method="POST">
                        <input type="hidden" name="centro" value="<?php echo $centroDen;?>">
                        <input type="hidden" name="numero" value="<?php echo $numero;?>">
                        <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>">
                        <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>">
                        <input type="hidden" name="nombre" value="<?php echo $nombre;?>">
                        
                        <label for="CIF"><b>NIF.:</b></label>
                        <input type="text" id="EmpNif" name="EmpNif" 
                            required size="11" placeholder="NIF o DNI del empleado">
                        <label for="NOMBRE.:"><b>NOMBRE.:</b></label>
                        <input type="text" id="EmpNombre" name="EmpNombre"
                            required size="50" placeholder="Nombre del empleado">
                        <br>
                        <label for="PRIMERAPELLIDO"><b>PRIMER APELLIDO.:</b></label>
                        <input type="text" id="EmpApellido1" name="EmpApellido1"
                            required size="43" placeholder="Primer apellido del empleado">
                        <label for="SEGUNDOAPELLIDO"><b>SEGUNDO APELLIDO.:</b></label>
                        <input type="text" id="EmpApellido2" name="EmpApellido2"
                            required size="43" placeholder="Segundo apellido del empleado">
                        <br>
                        <label for="TELEFONO"><b>TELEFONO.:</b></label>
                        <input type="text" id="EmpTelefono" name="EmpTelefono"
                            required size="11" placeholder="Teléfono del empleado o empresa">
                        <label for="EMAIL"><b>EMAIL.:</b></label>
                        <input type="text" id="EmpEmail" name="EmpEmail"
                            required size="98" placeholder="Email del empleado en la empresa">
                        <br>
                        <label for="CARGO"><b>PUESTO.:</b></label>
                        <input type="text" id="EmpCargo" name="EmpCargo" 
                            required size="126" placeholder="Puesto de trabajo">
                        <br>
                        <label for="NOTAS"><b>NOTAS.:</b></label>
                        <textarea id="EmpNotas" name="EmpNotas" cols="142" rows="5" 
                            placeholder="Texto libre para anotar" style="resize: none;"></textarea>
                        <br>
                        <label for="FECHAALTA"><b>Fecha de Alta.:</b></label>
                        <input type="date" id="EmpFechaAcceso" name="EmpFechaAcceso"
                            required size="50">
                            <label for="FECHAFINACCESO"><b>Fecha de Fin de Acceso.:</b></label>
                        <input type="date" id="EmpFechaFinAcceso" name="EmpFechaFinAcceso"
                            required size="50">
                        <input type="submit" value="Añadir Empleado" class="btn btn-success btn-block">  
                </form>
                <br>
                <div class="form-group mx-sm-5">
                    <!--<input type="submit" class="btn btn-success btn-block" name="salida" value="Salida">-->
                    <input class="btn btn-success btn-block" style="background-color: #489F48; font-weight:bold;" type="submit" 
                    onclick="history.back()" name="Página anterior" value="Página anterior">
                </div>
            <br>
        </div>
    </div>
</div>
<div class="footer" style="background-color: black; position: absolute; bottom: 0; width: 100%; height: 40px; color: white; text-align: center;">
    &copy; 2020-2025 Gombeth Software's
</div>