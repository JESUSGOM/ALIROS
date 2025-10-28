<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $denominacion = $_POST['denominacion'];
    $PrdCif = $_POST['PrdCif'];
    $PrdContacto = $_POST['PrdContacto'];
    $PrdTelefono = $_POST['PrdTelefono'];
    $PrdEmail = $_POST['PrdEmail'];
    $PrdDireccion = $_POST['PrdDireccion'];
    $PrdProvincia = $_POST['PrdProvincia'];
    $PrdMunicipio = $_POST['PrdMunicipio'];
    $PrdPais = $_POST['PrdPais'];
    $PrdCodigopostal = $_POST['PrdCodigopostal'];
    $PrdWeb = $_POST['PrdWeb'];
    $PrdNotas = $_POST['PrdNotas'];
    $PrdFechaAlta = $_POST['PrdFechaAlta'];
    $PrdFechaExpiracion = $_POST['PrdFechaExpiracion'];

    $sql = "UPDATE Proveedores SET 
        PrdCif = '$PrdCif', PrdContacto = '$PrdContacto', PrdTelefono = '$PrdTelefono', 
        PrdEmail = '$PrdEmail', PrdDireccion = '$PrdDireccion', PrdProvincia = '$PrdProvincia', 
        PrdMunicipio = '$PrdMunicipio', PrdPais = '$PrdPais', PrdCodigopostal = '$PrdCodigopostal', 
        PrdWeb = '$PrdWeb', PrdNotas = '$PrdNotas', PrdFechaAlta = '$PrdFechaAlta', 
        PrdFechaExpiracion = '$PrdFechaExpiracion'
        WHERE PrdDenominacion = '$denominacion'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
        echo "<a href=\"javascript:history.go(-2)\">GO BACK</a>";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
    
    $conn->close();
}
?>
