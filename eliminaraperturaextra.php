<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Apertura Extra</title>
</head>
<body>
    <h1>Eliminar Apertura Extra</h1>

    <?php if (isset($mensaje)): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <p>¿Estás seguro de que deseas eliminar este registro?</p>

    <form method="post" action="eliminar.php">
        <input type="hidden" name="AeId" value="<?php echo $apertura['AeId']; ?>">
        <input type="submit" value="Eliminar">
    </form>

    <a href="leer.php">Volver a la lista</a>
</body>
</html>
