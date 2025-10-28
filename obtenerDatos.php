<?php
require_once("db.php");

if (isset($_GET['denominacion'])) {
    $denominacion = $_GET['denominacion'];
    $quer2 = "SELECT * FROM Proveedores WHERE PrdDenominacion = '$denominacion'";
    $resu2 = $conn->query($quer2);
    if ($resu2->num_rows > 0) {
        $row2 = $resu2->fetch_assoc();
        echo json_encode($row2);
    } else {
        echo json_encode([]);
    }
}
?>
