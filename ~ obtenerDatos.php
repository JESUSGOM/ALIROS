<?php
require_once("db.php");

if (isset($_GET['denominacion'])) {
    $denominacion = $_GET['denominacion'];
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
    mysqli_set_charset($conn, "utf8");
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
