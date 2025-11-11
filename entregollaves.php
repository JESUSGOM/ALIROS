<?php  
    require_once("db.php");
    //header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    session_start();
?>
<meta charset="UTF-8">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dtDynamicVerticalScrollExample').DataTable({
                "scrollY": "50vh",
                "scrollCollapse": true,
                "order": [[1, "asc"]],
                "language":{
                    "lengthMenu": "Ver _MENU_ líneas",
                    "info": "Página _PAGE_ de páginas",
                        "infoEmpty": "No hay datos para mostrar",
                        "loadingRecords": "Cargando...",
                        "processing": "En proceso...",
                        "search": "Buscar: ",
                        "zeroRecords": "No hay datos disponibles.",
                        "paginate": {
                            "next": "Siguiente.",
                            "previous": "Anterior."
                        },
                }
            });
            $('.dataTables_length').addClass('bs-select');  
        });
    </script> 
    
</head>
<body>
<div class="container">

    <div class="justify col-12">
        
        <?php
            //session_start();
            //echo var_dump($_POST);
            echo "<br> \n";
            $espacio = " ";
            $coma = ", ";
            $apellidoUno = $_POST['apu'];
            $apellidoDos = $_POST['apd'];
            $nombre = $_POST['nom'];
            $centroDen = $_POST['cen'];
            $centro = $_POST['num'];
            $identifico = $_POST['ide'];
            $identi = $_SESSION["usuario"];
            $cargoUsuario = $_POST["car"];
            $numero = $centro;
            $buscocadena = " ";
            $cambiocadena = "";
            $estaidentificado = strval($identifico);
            $usuariorecibido = $estaidentificado;
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            $centro = str_replace($buscocadena,$cambiocadena,$centro);
            $centro2 = $_POST['num'];
            $rolusuario = $_POST['rol'];
            $_SESSION["esp"] = $espacio;
            $_SESSION["den"] = $centroDen;
            $_SESSION["iden"] = $estaidentificacion;
            $_SESSION["apu"] = $apellidoUno;
            $_SESSION["apd"] = $apellidoDos;
            $_SESSION["nom"] = $nombre;
            $_SESSION["coma"] = $coma;
            $_SESSION["num"] = $centro2;
            $_SESSION["ide"] = $identifico;
            if($rolusuario == "ZZ"){
                $super = "SUPERUSUARIO";
            } else {
                $super = "" . $cargoUsuario . "";
            }
        print"
            <p>
                <b>
                    $espacio $centroDen 
                    $espacio Usuario->
                </b>
                $estaidentificacion $espacio 
                $identi $espacio 
                $apellidoUno $espacio 
                $apellidoDos $coma 
                $nombre $espacio 
                $rolusuario $espacio
                $cargoUsuario
            </p>";
        ?>
    </div>
    <div class="col-12">
        <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0">
        <thead>
                <tr>
                    <th class="th-sm" scope="col"><b>Codigo.</b></th>
                    <th class="th-sm" scope="col"><b>Puerta.</b></th>
                    <th class="th-sm" scope="col"><b>Planta.</b></th>
                    <th class="th-sm" scope="col"><b>Cajetin.</b></th>
                    <th class="th-sm" scope="col"><b>Restriccion.</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs', 'Mi-@cc3s0-es-p@ra-@L1R0!', 'Conlabac');
                    mysqli_set_charset($conn, "utf8");
                    $laquery = "SELECT LlvCodigo, LlvPuerta, LlvPlanta, LlvCajetin, LlvRestriccion 
                    FROM Llaves WHERE LlvCentro = '" .$numero. "' ORDER BY LlvCodigo ASC";
                    $resultado = mysqli_query($conn, $laquery);
                    while($mostrar = mysqli_fetch_array($resultado)) {
                        echo "<tr>
                        <td scope='col'>$mostrar[0]</td>
                        <td scope='col'>$mostrar[1]</td>
                        <td scope='col'>$mostrar[2]</td>
                        <td scope='col'>$mostrar[3]</td>
                        <td scope='col'>$mostrar[4]</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <div class="card card-body">
            <form action="asignollave.php" method="POST" class="form-inline">
                <div class="form-group mx-sm-3">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno; ?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos; ?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre; ?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen; ?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro2; ?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario; ?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargoUsuario;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="text" name="reg" class="form-control"
                    placeholder="Código" size="8"/>
                    <input type="date" name="fecha" class="form-control" autofocus>
                    <input type="time" name="hora" class="form-control" stpep="1"> 
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" 
                    size="16">
                    <input type="text" name="apelli1" class="form-control" placeholder="Primer Apellido" 
                    size="16">
                    <input type="text" name="apelli2" class="form-control" placeholder="Segundo Apellido" 
                    size="16">
                </div>
                <br>
                <div class="form-group" width="100%">
                    <input type="submit" class="btn btn-success btn-block" name="asignokey" value="Asignar">
                </div>
            </form>
        </div>                
    </div>
    <div class="col-12">
        <div class="card card-body">
            <input style="background-color: #489F48; font-weight:bold;" type="button" 
            onclick="history.back()" name="Página anterior" value="Página anterior">
        </div>
    </div>
</div>
<!--<div class="footer" style="background-color: black; position: absolute; bottom: 0; width: 100%; height: 25px; color: white; text-align: center;">
    &copy; 2020-2025 Gombeth Software's
</div>-->

</body>
</html>

