<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $denominacion = $_POST['denominacion'];

    // Eliminar el proveedor de la base de datos
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
    mysqli_set_charset($conn, "utf8");
    $sql = "DELETE FROM Proveedores WHERE PrdDenominacion = '$denominacion'";

    if ($conn->query($sql) === TRUE) {
        echo "<a href=\"javascript:history.go(-2)\">GO BACK</a>";
    } else {
        echo "Error al eliminar el proveedor: " . $conn->error;
    }

    $conn->close();
}
?>
