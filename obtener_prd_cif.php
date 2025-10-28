<?php
include 'db_connection.php';

if (isset($_POST['denominacion'])) {
    $denominacion = $_POST['denominacion'];
    $numero = $_POST['numero']; // Asumiendo que se pasa el número del centro

    $sql = "SELECT PrdCif FROM Proveedores WHERE PrdDenominacion = '$denominacion' AND PrdCentro = '$numero'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['PrdCif'];
    } else {
        echo "No se encontró el PrdCif.";
    }
}

$conn->close();
?>
