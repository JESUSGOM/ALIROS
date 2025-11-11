<?php
    require_once("db.php");
    header('Content-Type: text/html; charset=UTF-8');
    require_once("include/header.php");
    require_once("variables.php");
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
    mysqli_set_charset($conn, "utf8");
    $idComunidad = $conn->real_escape_string($_GET['idProvincia']);
    $sql = 
    "SELECT idProvincia, idCCAA, Provincia FROM Provincias WHERE idCCAA = $idComunidad ORDER BY Provincia ASC";
    $resultado = mysqli_query($conn, $sql);
    $respuesta = "<option value=''>Seleccionar</option>";
    while($row = $resultado->fetch_assoc()){
        $respuesta .= "<option value='" . $row['idProvincia'] . "'>" . $row['Provincia'] . "</option>";
    }

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>