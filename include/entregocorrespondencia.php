<?php
    include("user_session.php");
    require "include/Exception.php";
    require "include/PHPMailer.php";
    require "include/SMTP.php";
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    session_start();
    $identifico = $_POST["ide"];
    $apel1 = $_POST["apu"];
    $apel2 = $_POST["apd"];
    $nom = $_POST["nom"];
    $cenden = $_POST["cen"];
    $numero = $_POST["num"];
    $apellidoUno = $_POST["apell1"];
    $apellidoDos = $_POST["apell2"];
    $nombre = $_POST["nombre"];
    $elNumero = intval($numero);
    //var_dump($_SESSION);
    //echo nl2br(" \n ");
    //var_dump($_POST);
?>

<div class="container p-4">
    <div class="row">
        <p>
            <?php
                $espacio = " ";
                $coma = ", ";
                
                //echo var_dump($_POST);
                
                print"<p><b>$cenden $espacio Usuario-></b>$identifico $espacio $apel1 $espacio $apel2 $coma $nom</p>";
                
            ?>
        </p>
    </div>
    <div class="row" width="190px" >
        <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm" scope="col"><b>Orden.</b>
                    <th class="th-sm" scope="col"><b>Fecha.</b>
                    <th class="th-sm" scope="col"><b>Hora.</b>
                    <th class="th-sm" scope="col"><b>Emisor.</b>
                    <th class="th-sm" scope="col"><b>Destinatario.</b>
                    <th class="th-sm" scope="col"><b>Mensajeria.</b>
                    <th class="th-sm" scope="col"><b>Bultos.</b>
                    <th class="th-sm" scope="col"><b>Tipos.</b>
                    <th class="th-sm" scope="col"><b>Operario.</b>
                </tr>
            </thead>
            <tbody>
                <?php
                    $comunico = "No";
                    $qw = "SELECT PktId, PktFecha, PktHora, PktEmisor, PktDestinatario, PktMensajeria, PktBultos, PktTipo, PktOperario FROM Paqueteria WHERE PktCentro = '" .$elNumero. "' AND PktComunicado = '".$comunico."' ";
                    $resultado = mysqli_query($conn, $qw);
                    while($mostrar = mysqli_fetch_array($resultado)) {
                        echo "<tr>
                            <td scope='col'>$mostrar[0]</td>
                            <td scope='col'>$mostrar[1]</td>
                            <td scope='col'>$mostrar[2]</td>
                            <td scope='col'>$mostrar[3]</td>
                            <td scope='col'>$mostrar[4]</td>
                            <td scope='col'>$mostrar[5]</td>
                            <td scope='col'>$mostrar[6]</td>
                            <td scope='col'>$mostrar[7]</td>
                            <td scope='col'>$mostrar[8]</td>
                        </tr>";
                    }
                ?>  
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="card card-body">
            <form action="entrego.php" method="POST" class="form-inline">
                <div class="form-gruup mx-sm-3">
                    <input type="hidden" name="apu" value="<?php echo $apel1; ?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apel2; ?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nom; ?>"/>
                    <input type="hidden" name="cen" value="<?php echo $cenden; ?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero; ?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico; ?>"/>
                </div>
                <div class="form-group mx-sm-3">
                    <input type="number" name="registro" class="form-control"
                    placeholder="Orden" autofocus>
                    <input type="date" name="fecha2" class="form-control">
                    <input type="time" name="hora2" class="form-control" stpep="1"> 
                    <label> Forma Entrega </label>
                    <select name="formacomunicado">
                        <option>Telefonicamente</option>
                        <option>Entrega en Mano</option>
                        <option>Llevado a Destino</option>
                        <option>Pasa a recoger</option>
                    </select>
                </div>
                <div class="form-group mx-sm-3">
                    <input type="submit" class="btn btn-success btn-block" name="comunico" value="Comunicar llamada">
                </div>
            </form>              
        </div>
    </div>
</div>
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
});
</script>