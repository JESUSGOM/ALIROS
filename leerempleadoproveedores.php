<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function mostrarEmpleados() {
            var proveedorCif = document.getElementById("proveedor").value;

            if (proveedorCif !== "") {
                $.ajax({
                    url: 'obtener_empleados.php',
                    type: 'POST',
                    data: {prdCif: proveedorCif},
                    success: function(response) {
                        document.getElementById("lista_empleados").innerHTML = response;
                    }
                });
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <p>
                <?php
                    echo var_dump($_POST);
                    echo "<br> \n";
                    $espacio = " ";
                    $coma = ", ";
                    $apellidoUno = $_GET['apu'];
                    $apellidoDos = $_GET['apd'];
                    $nombre = $_GET['nom'];
                    $centroDen = $_GET['cen'];
                    $centro = $_GET['num'];
                    $identifico = $_GET['ide'];
                    $identi = $_SESSION["usuario"];
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
                    print"<p><b>$espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $identi $espacio $apellidoUno $espacio $apellidoDos $coma $nombre $espacio <-> $usuariorecibido</p>";
                ?>
            </p>
        </div>
        <h1>Lista de Empleados</h1>
        <form>
            <label for="proveedor">Selecciona un proveedor:</label>
            <select id="proveedor" name="proveedor" onchange="mostrarEmpleados()">
                <option value="" selected>Seleccionar</option>
                <?php
                    // Conectar a la base de datos
                    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
                    mysqli_set_charset($conn, "utf8");
                    include 'db_connection.php';
                    $sql = "SELECT PrdCif, PrdDenominacion FROM Proveedores";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['PrdCif'] . "'>" . $row['PrdDenominacion'] . "</option>";
                        }
                    }
                ?>
            </select>
        </form>

       
    </div>
</body>
</html>
