<?php
    session_name("Aliros");
    session_start();
//    ini_set('display_errors', 1);
//    ini_set('display_startup_errors', 1);
//    error_reporting(E_ALL);
    //require_once("db.php");
    //require_once("include/header2.php");
    //require_once("emergente2.php");
    require_once("variables.php");
    include_once "emergente2.php";
    //require_once("variables.php");
    //echo var_dump($_SESSION);
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Pass@LIr0S','Conlabac');
    mysqli_set_charset($conn, "utf8");
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <div class="contaier-fluid">
        <div class="row">
            <div class="col-md-12" style="display: flex; justify-content: center !important;">
                <div class="card card-body" style="width: 100%;">
                    <h5 class="card-title">Entrada de visitantes</h5>
                    <form action="guardarvisita2.php" method="post">
                        <p>Nombre.:<input type="text" name="nomvisitante"
                                   required size="62" placeholder="Nombre del visitante"
                                   minlength="1" maxlength="60">
                        </p>
                        <p>Primer Apellido.:<input type="text" name="ap1visitante"
                                                   required size="62" placeholder="Primer apellido"
                                                   minlength="1" maxlength="60">
                        </p>
                        <p>Segundo Apellido.: <input type="text" name="ap2visitante"
                                                     size="62" placeholder="Segundo apellido"
                                                     minlength="1" maxlength="60">
                        </p>
                        <p>Procede.: <input type="text" name="procedencia"
                                            size="102" placeholder="Indicar de donde procede solo si no es personal del ITC o empresa de alquiler"
                                            minlength="1" maxlength="100">
                        </p>
                        <p>Destino y planta.:
                            <select name="empresa">
                                <?php
                                $query2 = "SELECT AlqEmpresa FROM Alquileres WHERE AlqCentro = '" .$_SESSION["centro"]. "'";
                                $resultado = mysqli_query($conn, $query2);
                                if($resultado = mysqli_query($conn, $query2)) {
                                    while($fila = mysqli_fetch_row($resultado)) {
                                        echo '<option value='.$fila[0].'>'.$fila[0].'</option>';
                                    }
                                }
                                ?>
                            </select>
                            <select name="planta">
                                <?php
                                $query2 = "SELECT PltPlanta FROM Plantas WHERE PltCentro = '" .$_SESSION["centro"]. "'";
                                $resultado = mysqli_query($conn, $query2);
                                if($resultado = mysqli_query($conn, $query2)){
                                    while($fila = mysqli_fetch_row($resultado)){
                                        echo '<option value='.$fila[0].'>'.$fila[0].'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </p>
                        <p>Fecha y Hora.:
                            <input type="date" name="fecha"
                                   value="document.addEventListener("DOMContentLoaded", function(event)) {
                            moment.locale('es');
                            var upDate = function() {
                            var elFecha = document.querySelector("#fecha");
                            var elHora = document.querySelector("#hora");
                            var nowDate = moment(new Date());
                            elHora.textContent = nowDate.format('HH:mm:ss');
                            elFecha.textContent =
                            nowDate.format('dddd DD [de] MMMM [de] YYYY ');
                            }
                            setInterval(upDate, 1000);
                            };>
                            <input type="time" name="hora" value="hora"></input>
                        </p>
                        <p name="motivo">
                            <textarea cols="50" name="motivo" maxlength="250" placeholder="Motivo" cols="100"></textarea>
                        </p>
                        <p>Vehículo.:
                            <?php //header('Content-Type: text/html; charset=ISO-8859-1'); ?>
                            <select name="vehi">
                                <option value="No">No</option>
                                <option value="Si">Si</option>
                            </select>
                        </p>
                        <input type="hidden" name="cen" value="<?php echo $_SESSION['num'];?>">
                        <input type="submit" name="botonguardar" class="btn btn-success btn-block" value="Grabar">
                    </form>
                </div>

            </div>
        </div>
        <?php
            //mysqli_close($conn);
        ?>
    </div>

    <!--<script>
        window.location.hash="no-back-button";
        window.location.hash="Again-No-back-button";//esta linea es necesaria para chrome
        window.onhashchange=function(){window.location.hash="no-back-button";}
    </script>-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownElements = document.querySelectorAll('.dropdown-toggle');
            dropdownElements.forEach(function(element) {
                new bootstrap.Dropdown(element);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous">
    </script>
</body>
</html>
