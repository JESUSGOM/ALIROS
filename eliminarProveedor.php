<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $denominacion = $_POST['denominacion'];

    // Eliminar el proveedor de la base de datos
    $sql = "DELETE FROM Proveedores WHERE PrdDenominacion = '$denominacion'";

    if ($conn->query($sql) === TRUE) {
        echo "<a href=\"javascript:history.go(-2)\">GO BACK</a>";
    } else {
        echo "Error al eliminar el proveedor: " . $conn->error;
    }

    $conn->close();
}
?>
