<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AeCentro = $_POST["AeCentro"];
    $AeFecha = $_POST["AeFecha"];
    $AeHoraInicio = $_POST["AeHoraInicio"];
    $AeHoraFinal = $_POST["AeHoraFinal"];
    $AeMotivo = $_POST["AeMotivo"];

    $sql = "INSERT INTO AperturasExtra (AeCentro, AeFecha, AeHoraInicio, AeHoraFinal, AeMotivo)
            VALUES ('$AeCentro', '$AeFecha', '$AeHoraInicio', '$AeHoraFinal', '$AeMotivo')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro creado correctamente";
    } else {
        echo "Error al crear el registro: " . $conn->error;
    }
}

// Mostrar formulario para crear un nuevo registro
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!-- Campos del formulario -->
    <input type="submit" value="Crear">
</form>