<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");

    session_start();

    if (isset($_POST['prdCif']) && isset($_POST['centro'])) {
        $prdCif = $_POST['prdCif'];
        $centro = $_POST['centro'];
    
        // Obtener fecha actual
        $fecha_actual = date('Y-m-d');
    
        // Consultar empleados del proveedor que cumplan con las fechas especificadas
        $sql = "SELECT EmpNif, EmpNombre, EmpApellido1, EmpApellido2 
                FROM EmpleadosProveedores 
                WHERE EmpPrdCif = '$prdCif' 
                  AND EmpCentro = '$centro'
                  AND EmpFechaAcceso <= '$fecha_actual' 
                  AND EmpFechaFinAcceso >= '$fecha_actual'";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo "<option value='" . $row['EmpNif'] . "'>" . $row['EmpNombre'] . " " . $row['EmpApellido1'] . " " . $row['EmpApellido2'] . "</option>";
            }
        }
        echo "<option value='Otro'>Otro</option>";
    }


?>
