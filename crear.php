<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AeCentro = $_POST["AeCentro"];
    $AeFecha = $_POST["AeFecha"];
    $AeHoraInicio = $_POST["AeHoraInicio"];
    $AeHoraFinal = $_POST["AeHoraFinal"];
    $AeMotivo = $_POST["AeMotivo"];
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
    mysqli_set_charset($conn, "utf8");    $sql = "INSERT INTO AperturasExtra (AeCentro, AeFecha, AeHoraInicio, AeHoraFinal, AeMotivo)
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