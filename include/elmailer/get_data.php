<?php
    require_once("db.php");
?>

<?php
    $sql = "SELECT MovNombre, MovApellidoUno, MovApellidoDos, "
    + "CONCAT(MovApellidoDos, ' ', MovApellidoUno, ', ', "
    + "MovNombre) AS ElCampo FROM Movadoj WHERE MovCentro = 1 "
    + "GROUP BY ElCampo ORDER BY ElCampo ASC";
?>