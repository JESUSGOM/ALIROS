<?php
    require_once("db.php");
    header('Content-Type: text/html; charset=UTF-8');
    require_once("include/header.php");
    require_once("variables.php");

    $idComunidad = $mysqli->real_escape_string($_GET['idProvincia']);
    $sql = 
    "SELECT idProvincia, idCCAA, Provincia FROM Provincias WHERE idCCAA = $idComunidad ORDER BY Provincia ASC";
    $resultado = mysqli_query($conn, $sql);
    $respuesta = "<option value=''>Seleccionar</option>";
    while($row = $resultado->fetch_assoc()){
        $respuesta .= "<option value='" . $row['idProvincia'] . "'>" . $row['Provincia'] . "</option>";
    }

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>