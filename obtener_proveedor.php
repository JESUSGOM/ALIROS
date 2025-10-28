<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    header('Content-Type: text/html; charset=UTF-8');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if(isset($_GET['cif'])){
        $cif = $conn->real_escape_string($_GET['cif']);
        $cen = $conn->real_escape_string($_GET['cen']);
        $sql = "SELECT PrdContacto, PrdTelefono, PrdEmail, PrdDireccion, PrdProvincia, PrdMunicipio, PrdPais, PrdCodigopostal, PrdWeb, PrdNotas FROM Proveedores WHERE (PrdCif = '$cif' AND PrdCentro = '$cen')";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            echo json_encode($reullt->fetch_assoc());
        } else {
            echo json_encode([]);
        }
    }
?>