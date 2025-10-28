<!DOCTYPE html>
<html>
<head>
    <title>Crear Apertura Extra</title>
</head>
<body>
    <h1>Crear Apertura Extra</h1>

    <?php if (isset($mensaje)): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <form method="post" action="crear.php">
        <label for="AeCentro">Centro:</label>
        <input type="number" name="AeCentro" id="AeCentro" required><br><br>

        <label for="AeFecha">Fecha:</label>
        <input type="date" name="AeFecha" id="AeFecha" required><br><br>

        <label for="AeHoraInicio">Hora Inicio:</label>
        <input type="time" name="AeHoraInicio" id="AeHoraInicio" required><br><br>

        <label for="AeHoraFinal">Hora Final:</label>
        <input type="time" name="AeHoraFinal" id="AeHoraFinal" required><br><br>

        <label for="AeMotivo">Motivo:</label>
        <textarea name="AeMotivo" id="AeMotivo" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Crear">
    </form>

    <a href="leer.php">Volver a la lista</a>
</body>
</html>