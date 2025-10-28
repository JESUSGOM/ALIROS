<!DOCTYPE html>
<html>
<head>
    <title>Aperturas Extra</title>
</head>
<body>
    <h1>Aperturas Extra</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Centro</th>
                <th>Fecha</th>
                <th>Hora Inicio</th>
                <th>Hora Final</th>
                <th>Motivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aperturas as $apertura): ?>
                <tr>
                    <td><?php echo $apertura['AeId']; ?></td>
                    <td><?php echo $apertura['AeCentro']; ?></td>
                    <td><?php echo $apertura['AeFecha']; ?></td>
                    <td><?php echo $apertura['AeHoraInicio']; ?></td>
                    <td><?php echo $apertura['AeHoraFinal']; ?></td>
                    <td><?php echo $apertura['AeMotivo']; ?></td>
                    <td>
                        <a href="actualizar.php?id=<?php echo $apertura['AeId']; ?>">Editar</a>
                        <a href="eliminar.php?id=<?php echo $apertura['AeId']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="crear.php">Crear nueva apertura</a>
</body>
</html>