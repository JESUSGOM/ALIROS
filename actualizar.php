<?php
    session_start();
    echo var_dump($_POST);
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
    mysqli_set_charset($conn, "utf8");
    $centro = $_POST['AeCentro'];
    $fecha = $_POST['AeFecha'];
    $horainicio = $_POST['AeHoraInicio'];
    $horafinal = $_POST['AeHoraFinal'];
    $apellidoUno = $_POST['apellidoUno'];
    $apellidoDos = $_POST['apellidoDos'];
    $nombre = $_POST['nombre'];
    $nombreCentro = $_POST['centroDen'];
    $usuariorecibido = $_POST['usuariorecibido'];
    $rolUsuario = $_SESSION['rolUsuario'];
    echo $apellidoUno . " " . $apellidoDos . " " . $nombre . " " . $nombreCentro . " " . $usuariorecibido . " " . $rolUsuario;
    $motivo = $_POST['AeMotivo'];
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
    mysqli_set_charset($conn, "utf8");
    $query2 = "INSERT INTO AperturasExtra (AeCentro, AeFecha, 
        AeHoraInicio, AeHoraFinal, AeMotivo)
        VALUES ('".$centro."','".$fecha."','".$horainicio."','".$horafinal."',
        '".$motivo."')";
    mysqli_query($conn, $query2);

    header("location: principalua.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$nombreCentro & num=$centro & ide=$usuariorecibido & rol=$rolUsuario");
?>
