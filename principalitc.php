<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
?>
<div class="container-fluid">
    <div class="row">
        <?php
            session_start();
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
            $rolusuario = $_SESSION["rol"];
            $buscocadena = " ";
            $cambiocadena = "";
            $estaidentificado = strval($identifico);
            $usuariorecibido = $estaidentificado;
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            $centro = str_replace($buscocadena,$cambiocadena,$centro);
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
            print"<p><b>$espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $identi $espacio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
        ?>
        </p>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="crearproveedores.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block" 
                    name="creaproveedor" value="Crear Proveedores">
                </form>
                <form action="leerproveedores.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="leerproveedor" value="Consultar Proveedores">
                </form>
                <form action="modiproveedores.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="modiproveedor" value="Modificar Proveedor">
                </form>
                <form action="deleproveedores.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="deleproveedor" value="Eliminar Proveedor">    
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="crearempleadoproveedores.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block" 
                    name="creaproveedor" value="Crear Empleado en Proveedor">
                </form>
                <form action="leerempleadoproveedores.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="leerproveedor" value="Consultar Empleado en Proveedor">
                </form>
                <form action="modifempleadoproveedores" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="modiproveedor" value="Modificar Empleado en Proveedor">
                </form>
                <form action="borraempleadoproveedores.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="deleproveedor" value="Eliminar Empleado de Proveedor">    
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="crearmovimientoentradaempleado.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="visitan" value="Entrada Empleados de Proveedores">
                </form>
                <form action="ponersalidamovimientoentradaempleado.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="salidas" value="Salida Empleados de Proveedores">
                </form>
                <form action="consultarmovimientosempleados.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Consultar Movimientos Empleados de Proveedores">
                </form> 
                <form action="borrarmovimientosempleados.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Eliminar Movimientos Empleados de Proveedores">
                </form>    
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="informe_de_incidencias.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes Incidencias">   
                </form>
                <!--<form action="informesvisitas.php" method="POST">-->
                <form action="lisgraljmovi2.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes Visitantes">
                </form>
                <form action="informesdellaves.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes de Llaves">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="informe_de_llamadas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes Llamadas">
                </form>
                <form action="" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    disabled name="" value="">   
                </form>
                <form action="informescorrespondencia.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="expedicion" value="Informes Correspondencia">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="informedeproveedores.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="mensajeria" value="Informes de Proveedores">
                </form>
                <form action="informedeempleadosdeproveedores.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="paqueteria" value="Informes de empleados de proveedores">
                </form>
                <form action="informemovimientosempleadosdeproveedores.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="expedicion" value="Informes Movimientos Personal de Proveedores">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="salidas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="salidas" value="Visitantes en el interior">
                </form>
                <form action="recojollaves.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="salidas" value="Llaves pendientes de recibir">
                </form>
                <form action="comunicarllamadas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="salidas" value="Llamadas pendintes de comunicar">
                </form>
                <form action="entregocorrespondencia.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="paqueteria" value="Correspondencia pendiente de entregar">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                
            </div>
        </div>
    </div>
</div>
<!--<div class="footer" style="background-color: black; position: absolute; bottom: 0; width: 100%; height: 40px; color: white; text-align: center;">
    &copy; 2020-2025 Gombeth Software's
</div>-->