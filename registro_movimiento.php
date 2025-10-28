<?php
    include 'db_connection.php';

    $proveedor_cif = $_POST['prd_cif'];
    $centro = $_POST['centro'];
    $empleado_nif = $_POST['empleado_nif'];
    $fecha_hora_entrada = $_POST['fecha_hora_entrada'];

    // Obtener fecha y hora actual
    $fecha_actual = date('Y-m-d H:i:s');

    // Validar fechas y obtener datos necesarios
    $sql_proveedor = "SELECT PrdFechaExpiracion, PrdFechaAlta FROM Proveedores WHERE PrdCif = '$proveedor_cif' AND PrdCentro = '$centro'";
    $result_proveedor = $conn->query($sql_proveedor);
    $proveedor = $result_proveedor->fetch_assoc();

    if (!$proveedor) {
        die("Proveedor no encontrado.");
    }

    if ($empleado_nif === "Otro") {
        // Insertar nuevo empleado
        $nuevo_empleado_nif = $_POST['nuevo_empleado_nif'];
        $nuevo_empleado_nombre = $_POST['nuevo_empleado_nombre'];
        $nuevo_empleado_apellido1 = $_POST['nuevo_empleado_apellido1'];
        $nuevo_empleado_apellido2 = $_POST['nuevo_empleado_apellido2'];
        $nuevo_empleado_telefono = $_POST['nuevo_empleado_telefono'];
        $nuevo_empleado_email = $_POST['nuevo_empleado_email'];
        $nuevo_empleado_cargo = $_POST['nuevo_empleado_cargo'];

        $sql_insert_empleado = "INSERT INTO EmpleadosProveedores 
                                (EmpPrdCif, EmpCentro, EmpNif, EmpNombre, EmpApellido1, EmpApellido2, EmpTelefono, EmpEmail, EmpCargo, EmpFechaAcceso, EmpFechaFinAcceso) 
                                VALUES 
                                ('$proveedor_cif', '$centro', '$nuevo_empleado_nif', '$nuevo_empleado_nombre', '$nuevo_empleado_apellido1', '$nuevo_empleado_apellido2', '$nuevo_empleado_telefono', '$nuevo_empleado_email', '$nuevo_empleado_cargo', '$fecha_hora_entrada', '$proveedor[PrdFechaExpiracion]')";

        if ($conn->query($sql_insert_empleado) === TRUE) {
            $empleado_nif = $nuevo_empleado_nif; // Usar el nuevo NIF del empleado para registrar el movimiento
        } else {
            die("Error al insertar nuevo empleado: " . $conn->error);
        }
    }

    // Obtener información del empleado
    $sql_empleado = "SELECT EmpFechaFinAcceso, EmpFechaAcceso FROM EmpleadosProveedores WHERE EmpPrdCif = '$proveedor_cif' AND EmpCentro = '$centro' AND EmpNif = '$empleado_nif'";
    $result_empleado = $conn->query($sql_empleado);
    $empleado = $result_empleado->fetch_assoc();

    if (!$empleado) {
        die("Empleado no encontrado.");
    }

    if ($fecha_hora_entrada > $proveedor['PrdFechaExpiracion'] || $fecha_hora_entrada > $empleado['EmpFechaFinAcceso']) {
        die("La fecha de grabación es posterior a la fecha de expiración del proveedor o a la fecha de fin de acceso del empleado.");
    }

    if ($fecha_hora_entrada < $proveedor['PrdFechaAlta'] || $fecha_hora_entrada < $empleado['EmpFechaAcceso']) {
        die("La fecha de grabación es anterior a la fecha de alta del proveedor o a la fecha de acceso del empleado.");
    }

    // Insertar movimiento en la base de datos
    $sql_insert = "INSERT INTO MovimientosEmpleados (MovPrdCif, MovCentro, MovEmpNif, MovFechaHoraEntrada) VALUES ('$proveedor_cif', '$centro', '$empleado_nif', '$fecha_hora_entrada')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "Movimiento registrado correctamente.";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }

    $conn->close();
?>