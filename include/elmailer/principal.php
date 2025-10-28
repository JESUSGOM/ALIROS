<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
    //echo var_dump($_POST);
?>

<div class="container p-4">
    <div class="row">
        <p>
            <?php
                session_start();
                //echo $usuariorecibido;
                echo "<br> \n";
                $espacio = " ";
                $coma = ", ";
                $apellidoUno = $_GET['apu'];
                $apellidoDos = $_GET['apd'];
                $nombre = $_GET['nom'];
                $centroDen = $_GET['cen'];
                $centro = $_GET['num'];
                $identifico = $_GET['ide'];
                $identi = $_SESSION["usuario"];
                $buscocadena = " ";
                $cambiocadena = "";
                $estaidentificado = strval($identifico);
                $usuariorecibido = $estaidentificado;
                $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
                $centro = str_replace($buscocadena,$cambiocadena,$centro);
                //$usurlogu = $_GET['ul'];
                //$asunto = "Acceso a la aplicación Web";
                //$elmail = "informatica@laborsordtic.org";
                //$textoemail = "El compañero '" + $nom + "', ha accedido a la web Aliros. ";
                //$textoemail .= "Desde '" + $centroDen + "', el día y a la hora indicadas en este correo ";
                //$nombredelusuario = $usurlogu->nombre;
                //$apeunodelusuario = $usurlogu->apellidoUno;
                //$apedosdelusuario = $usurlogu->apellidoDos;
                //$centrologueado = $usurlogu->nombreCentro;
                //$numerologueado = $usurlogu->centro;
                $centro2 = $_GET['num'];
                $_SESSION["esp"] = $espacio;
                $_SESSION["den"] = $centroDen;
                $_SESSION["iden"] = $estaidentificacion;
                $_SESSION["apu"] = $apellidoUno;
                $_SESSION["apd"] = $apellidoDos;
                $_SESSION["nom"] = $nombre;
                $_SESSION["coma"] = $coma;
                $_SESSION["num"] = $centro2;
                $_SESSION["ide"] = $identifico;
                //echo var_dump($_GET);
                print"<p><b>$espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $identi $espacio $apellidoUno $espacio $apellidoDos $coma $nombre $espacio <-> $usuariorecibido</p>";
                //litero("informatica@laborsordtic.org","Acceso a la aplicación Aliros Web",$textoemail,"Aliros");
            ?>
        </p>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="visitas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="visitan" value="Entrada Visitantes">
                </form>
                <form action="salidas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="salidas" value="Salida Visitantes">
                </form>
                <form action="informesvisitas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes Visitantes">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="entregollaves.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="visitan" value="Entrega de Llaves">
                </form>
                <form action="recojollaves.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="salidas" value="Recogida de Llaves">
                </form>
                <form action="informesdellaves.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes de Llaves">
                </form>    
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="llamadas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="visitan" value="Llamadas Telef&oacute;nicas">
                </form>
                <form action="comunicarllamadas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="salidas" value="Comunicar llamadas">
                </form>
                <form action="informe_de_llamadas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes Llamadas">
                </form>    
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="entradaincidencias.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="entroincidencia" value="Entrada Incidencias">
                </form>
                <form action="consultarincidencias.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="entroincidencia" value="Comsultar Incidencias">
                </form>
                <form action="informe_de_incidencias.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes Incidencias">   
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    disabled name="" value="">   
                </form>
                <form action="enviaremail.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="envioemail" value="Enviar Un Correo Electrónico">
                </form>
                <form action="" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    disabled name="" value="">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="correspondencia.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="mensajeria" value="Correspondencia">
                </form>
                <form action="entregocorrespondencia.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="paqueteria" value="Entrego Correspondencia">
                </form>
                <form action="informescorrespondencia.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="expedicion" value="Informes Correspondencia">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="comunicoturno.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico; ?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="comunicoturno" value="Comuinco Siguiente Turno">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="leocomunicacion.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico; ?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="leocomunicacion" value="Leer Comunicaci&oacute;n Turno Anterior">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="informesentreturnos.php" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    name="informecomunicacioin" value="Informes Entre Turnos">
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once("include/footer.php");?>