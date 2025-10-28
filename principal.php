<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootrap@5.1.3/dist/css/bootstram.mmin.css" rel="styllsheet"
    integrity="hsa384-1BmE4KWBq78iYhFldvKuhfTAU6auU8tT96WfHftjDbrCEXSU1oBiqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid ">
    <div class="row">
        <div clas="col">
            <div class="center-block">
                <p>
                    <?php
                        //session_start();
//                        echo var_dump($_POST);
//                        echo "<br> \n";
//                        echo var_dump($_SESSION);

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
                        $rolusuario = $_POST["rol"];
                        $cargo = $_POST["crg"];
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
                                $cargo
                            </p>";
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-body">
                <form action="visitas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="visitan" value="Entrada Visitantes">
                </form>
                <?php
                    if($centro == 1){
                        ?>
                            <form action="salidassuper.php" method="POST">
                        <?php
                    }
                    if($centro == 2){
                        ?>
                            <form action="salidas.php" method="POST">
                        <?php
                    }
                ?>
                <!--<form action="salidassuper.php" method="POST">-->
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
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
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes Visitantes">
                </form>
            </div>
        </div>
        <div class="col">
            <div class="card card-body">
                <form action="entregollaves.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
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
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
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
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes de Llaves">
                </form>    
            </div>
        </div>
        <div class="col">
            <div class="card card-body">
                <form action="llamadas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
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
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
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
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes Llamadas">
                </form>    
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-body">
                <form action="entradaincidencias.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
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
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
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
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes Incidencias">   
                </form>
            </div>
        </div>
        <div class="col">
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
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="envioemail" value="Enviar Un Correo Electrónico">
                </form>
                <form action="" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    disabled name="" value="">
                </form>
            </div>
        </div>
        <div class="col">
            <div class="card card-body">
                <form action="correspondencia.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
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
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
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
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="expedicion" value="Informes Correspondencia">
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-body">
                <!-- action="crearproveedores.php" -->
                <form action="#" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block" 
                    name="creaproveedor" value="Crear Proveedores">
                </form>
                <!-- action="leerproveedores.php" -->
                <form action="#" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="leerproveedor" value="Consultar Proveedores">
                </form>
                <!-- action="modiproveedores.php" -->
                <form action="#" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="modiproveedor" value="Modificar Proveedor">
                </form>
            </div>    
        </div>
        <div class="col">
            <div class="card card-body">
                <!--action="crearempleadoproveedores.php" -->
                <form action="#" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block" 
                    name="creaproveedor" value="Crear Empleado en Proveedor">
                </form>
                <!-- action="leerempleadoproveedores.php" -->
                <form action="#" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="leerproveedor" value="Consultar Empleado en Proveedor">
                </form>
                <!-- action="modifempleadoproveedores.php"-->
                <form action="#" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="modiproveedor" value="Modificar Empleado en Proveedor">
                </form>
                <!--action="borraempleadoproveedores.php"-->
                <form action="#" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="deleproveedor" value="Eliminar Empleado de Proveedor">    
                </form>    
            </div>    
        </div>
        <div class="col">
            <div class="card card-body">
                <!-- action="crearmovimientoentradaempleado.php" -->
                <form action="#" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="visitan" value="Entrada Empleados de Proveedores">
                </form>
                <!-- action="ponersalidamovimientoentradaempleado.php" -->
                <form action="#" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="salidas" value="Salida Empleados de Proveedores">
                </form>
                <!-- action="consultarmovimientosempleados.php" -->
                <form action="#" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Consultar Movimientos Empleados de Proveedores">
                </form> 
                <!-- action="borrarmovimientosempleados.php" -->
                <form action="#" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Eliminar Movimientos Empleados de Proveedores">
                </form>    
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-body">
                <form action="comunicoturno.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico; ?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="comunicoturno" value="Comuinco Siguiente Turno">
                </form>
            </div>
        </div>
        <div class="col">
            <div class="card card-body">
                <form action="leocomunicacion.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico; ?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="hidden" name="car" value="<?php echo $cargo;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="leocomunicacion" value="Leer Comunicaci&oacute;n Turno Anterior">
                </form>
            </div>
        </div>
        <div class="col">
            <div class="card card-body">
                <form action="informesentreturnos.php" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    name="informecomunicacioin" value="Informes Entre Turnos">
                </form>
            </div>
        </div>
    </div>
</div>
<!--<div class="footer" style="background-color: black; position: absolute; bottom: 0; width: 100%; height: 40px; color: white; text-align: center;">
    &copy; 2020-2025 Gombeth Software's
</div>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>    
</body>
</html>
