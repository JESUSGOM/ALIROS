<?php
require_once("db.php");
require_once("include/header.php");
require_once("variables.php");

$espacio = " ";
$coma = ", ";
$apell1 = $_POST['apu'];
if ($apell1 == "") {
    echo "Parámetro inexistente";
}
$apell2 = $_POST['apd'];
$nom = $_POST['nom'];
$cenden = $_POST['cen'];
$numero = $_POST['num'];
$identifico = $_POST['ide'];
$rolusuario = $_POST['rol'];
$fecha = date("Ymd");
if($rolusuarioi == "Z"){
    $super = "SUPERUSUARIO";
} else {
    $super = "";
}
$estaidentificado = strval($identifico);
$estaidentificacion = "**" . substr($estaidentificado, 2, 2) . "*" . substr($estaidentificado, 5, 1) . "**" . substr($estaidentificado, 8, 1);
print "
<p>
    <b>
        $espacio $espacio $espacio $cenden $espacio Usuario->
    </b> 
    $estaidentificacion $espacio $apell1 $espacio $apell2 $coma $nom $espacio $rolusuario
</p>";

$fechadehoy = date("Ym");
$lafechadehoy = str_replace(' ', '', $fechadehoy);
$lafechadehoy = $lafechadehoy . "%";

$lqs = "SELECT MovNombre, MovApellidoUno, MovApellidoDos, MovProcedencia, 
        MovDestino, MovPlanta, MovFechaEntrada, MovHoraEntrada, MovVehiculo, MovMotivo 
        FROM Movadoj 
        WHERE MovCentro = ? AND MovFechaEntrada LIKE ?";
$stmt = $conn->prepare($lqs);
$stmt->bind_param("ss", $numero, $lafechadehoy);
$stmt->execute();
$resultado = $stmt->get_result();

echo "<table id='miTabla' class='display'>
<thead>
<tr>
    <th>R.num</th>
    <th>Nombre</th>
    <th>Apellido Uno</th>
    <th>Apellido Dos</th>
    <th>Procedencia</th>
    <th>Destino</th>
    <th>Planta</th>
    <th>Fecha Entrada</th>
    <th>Hora Entrada</th>
    <th>Vehículo</th>
    <th>Motivo</th>
</tr>
</thead>
<tbody>";

$cantidadRegistros = 1;
while ($mostrar = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $cantidadRegistros . "</td>";
    echo "<td>" . $mostrar['MovNombre'] . "</td>";
    echo "<td>" . $mostrar['MovApellidoUno'] . "</td>";
    echo "<td>" . $mostrar['MovApellidoDos'] . "</td>";
    echo "<td>" . $mostrar['MovProcedencia'] . "</td>";
    echo "<td>" . $mostrar['MovDestino'] . "</td>";
    echo "<td>" . $mostrar['MovPlanta'] . "</td>";
    echo "<td>" . $mostrar['MovFechaEntrada'] . "</td>";
    echo "<td>" . $mostrar['MovHoraEntrada'] . "</td>";
    echo "<td>" . $mostrar['MovVehiculo'] . "</td>";
    echo "<td>" . $mostrar['MovMotivo'] . "</td>";
    echo "</tr>";
    $cantidadRegistros++;
}
echo "</tbody>";
echo "</table>";

?>
