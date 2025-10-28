<?php  
    require_once("db.php");
    header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
?>
<?php
    $espacio = " ";
    $coma = ", ";
    $apellidoUno = $_POST['ap1'];
    if($apellidoUno == ""){
        echo "Parametro inexistente";
    }
    $apellidoDos = $_POST['ap2'];
    $nombre = $_POST['nomb'];
    $centroDen = $_POST['cent'];
    $numero = $_POST['nume'];
    $fecha = date("Ymd");

    /**$laquery = "SELECT * FROM Movadoj 
    WHERE MovCentro = '" .$numero. "' AND MovFechaEntrada = '" .$fecha. "' AND MovFechaSalida IS NULL ORDER BY NovNombre ASC'";
    $resultado = mysqli_query($conn, $laquery);**/
    print"<p><b>$centroDen $espacio Usuario-></b> $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
?>
<html>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-body">
                        <form action="" method="POST">
                            <div class="form-gruup">
                                <input type="text" name="unombre" class="form-control"
                                placeholder="Nombre" maxlength="60" 
                                autofocus>
                            </div>
                            <input type="submit" class="btn btn-success btn-block"
                            name="entrada" value="Buscar">
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <table>
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Apellido.</td>
                            <td>Apellido ..</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $nom = $_POST['unombre'];
                            $conn = mysqli_connect('mysql-5705.dinaserver.com', 'Conacelbs','C0n@celbs','Conlabac');
                            mysqli_set_charset($conn, "utf8");
                            $qq = "SELECT MovNombre, MovApellidoUno, MovApellidoDos FROM Movadoj WHERE MovCentro = '".$centro."' AND MovNombre = '" .$nom. "' GROUP BY MovNombre, MovApellidoUno, MovApellidoDos ORDER BY MovNombre ASC ";
                            $rr = mysqli_query($conn, $qq);
                            while($mostrar = mysqli_fetch_array($rr)){
                                echo "<tr>
                                    <td> .$mostrar[0]. </td>
                                    <td> .$mostrar[1]. </td>
                                    <td> .$mostrar[2]. </td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>