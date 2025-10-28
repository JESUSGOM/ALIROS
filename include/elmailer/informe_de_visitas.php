<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
    if(isset($_POST['VisitasPorNombre'])){
        //echo var_dump($_POST);   
        //echo "<br>";
        $apellidoUno = $_POST['apu'];
        $apellidoDos = $_POST['apd'];
        $nombre = $_POST['nom'];
        $numero = $_POST['num'];
        $denominacion = $_POST['cen'];
        $identifico = $_POST['ide'];
        //echo $apellidoUno;
        //echo "<br>";
        //echo $apellidoDos;
        //echo "<br>";
        //echo $nombre;
        //echo "<br>";
        //echo $numero;
        //echo "<br>";
    }
?>
<div class="container-fluid">
    <div class="row">
        <p>
            <?php
                $espacio = " ";
                $coma = ", ";
                //$apellidoUno = $_GET['apu'];
                //$apellidoDos = $_GET['apd'];
                //$nombre = $_GET['nom'];
                //$centroDen = $_GET['cen'];
                //$centro = $_GET['num'];
                //$identifico = $_GET['ide'];
                //$identi = $_SESSION["usuario"];
                //$denominado = $_SESSION["centroNombre"];
                $buscocadena = " ";
                $cambiocadena = "";
                $estaidentificado = strval($identifico);
                $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
                $centro = str_replace($buscocadena,$cambiocadena,$centro);
                $asunto = "Acceso a la aplicación Web";
                $elmail = "informatica@laborsordtic.org";
                $textoemail = "El compañero '" + $nom + "', ha accedido a la web Aliros. ";
                $textoemail .= "Desde '" + $centroDen + "', el día y a la hora indicadas en este correo ";
                $nombredelusuario = $usurlogu->nombre;
                $apeunodelusuario = $usurlogu->apellidoUno;
                $apedosdelusuario = $usurlogu->apellidoDos;
                $centrologueado = $usurlogu->nombreCentro;
                $numerologueado = $usurlogu->centro;
                print"<p><b>$espacio $denominacion $espacio Usuario-></b>$estaidentificacion $espacio $identi $espacio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
            ?>
        </p>
    </div>
    <div class="row">
        <div class=" col-md-3">
        <!--Visitantes por NOMBRE-->
            <div class="card">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">Nombres</h6>
                        <form action="visitaPorNombresYears.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $denominacion;?>"/>
                            <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="visitaPorNombres" value="Nombre">
                        </form>
                        <form action="visitasPorInicioDeNombre.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $denominacion;?>"/>
                            <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="visitaPorInicioNombre" value="Inicio nombre">
                        </form>
                        <form action="visitasPorFinalDeNombre.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $denominacion;?>"/>
                            <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final nombre">
                        </form>
                        <form action="visitasPorParteDeNombre.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $denominacion;?>"/>
                            <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte nombre">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-3">
            <!--Visitantes por 1º APELLIDO-->
            <div class="card">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">1º Apellido</h6>
                        <form action="visitasPor1ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="1º Apellido">
                        </form>
                        <form action="visitasPorInicioDe1ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio 1º Apellido">
                        </form>
                        <form action="visitasPorFinalDe1ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final 1º Apellido">
                        </form>
                        <form action="visitasPorParteDe1ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte 1º Apellido">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-3">
            <!--Visitantes por 2º APLLIDO -->
            <div class="card">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">2º Apellido</h6>
                        <form action="visitasPor2ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="2º Apellido">
                        </form>
                        <form action="visitasPorInicioDe2ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio 2º Apellido">
                        </form>
                        <form action="visitasPorFinalDe2ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final 2º Apellido">
                        </form>
                        <form action="visitasPorParteDe2ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte 2º Apellido">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-3">
            <!--Visitantes por AMBOS APELLIDOS-->
            <div class="card">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">Ambos Apellidos</h6>
                        <form action="visitasPorAmbosApellidos.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Ambos Apellidos">
                        </form>
                        <form action="visitasPorInicioDeAmbosApellidos.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio Ambos Apellidos">
                        </form>
                        <form action="visitasPorFinalDe Ambos Apellidos.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final Ambos Apellidos">
                        </form>
                        <form action="visitasPorParteDeAmbosApellidos.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte Ambos Apellidos">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-3">
            <!--Visitantes por NOMBRE Y 1º APELLIDO -->
            <div class="card">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">Nombre y 1º Apellido</h6>
                        <form action="visitasPorNombreY1ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Nombre y 1º Apellido">
                        </form>
                        <form action="visitasPorInicioDeNombreY1ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio Nombre y 1º Apellido">
                        </form>
                        <form action="visitasPorFinalDeNombreY1ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final Nombre y 1º Apellido">
                        </form>
                        <form action="visitasPorParteDeDeNombreY1ºApellido.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte Nombre y 1º Apellido">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-3">
            <!--Visitantes por NOMBRE Y 2º APELLIDO-->
            <div class="card">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">Nombre y 2º Apellido</h6>
                            <form action="visitasPorNombreY2ºApellido.php" method="POST">
                                <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                                <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                                <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                                <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                                <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                                <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                                <input type="submit" class="btn btn-success btn-block" name="VPN" value="Nombre y 2º Apellido">
                            </form>
                            <form action="visitasPorInicioDeNombreY2ºApellido.php" method="POST">
                                <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                                <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                                <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                                <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                                <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                                <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                                <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio Nombre y 2º Apellido">
                            </form>
                            <form action="visitasPorFinalDeNombreY2ºApellido.php" method="POST">
                                <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                                <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                                <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                                <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                                <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                                <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                                <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final Nombre y 2º Apellido">
                            </form>
                            <form action="visitasPorParteDeDeNombreY2ºApellido.php" method="POST">
                                <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                                <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                                <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                                <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                                <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                                <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                                <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte Nombre y 2º Apellidos">
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-3">
            <!--Visitantes por NOMBRE DESDE FECHA-->
            <div class="card">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">Nombre Desde Fecha</h6>
                        <form action="visitasPorNombreDesdeFecha.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Nombre desde fecha">
                        </form>
                        <form action="visitasPorInicioDeNombreDesdeFecha.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio nombre desde fecha">
                        </form>
                        <form action="visitasPorFinalDeNombreDesdeFecha.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final nombre desde fecha">
                        </form>
                        <form action="visitasPorParteDeNombreDesdeFecha.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte nombre desde fecha">
                        </form>
                   </div>
                </div>
            </div>
        </div>
        <div class=" col-md-3">
            <!--Visitantes por NOMBRE HASTA FECHA-->
            <div class="card">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">Nombre Hasta Fecha</h6>
                        <form action="visitasPorNombreHastaFecha.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Nombre hasta fecha">
                        </form>
                        <form action="visitasPorInicioDeNombreHastaFecha.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio nombre hasta fecha">
                        </form>
                        <form action="visitasPorFinalDeNombreHastaFecha.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final nombre hasta fecha">
                        </form>
                        <form action="visitasPorParteDeNombreHastaFecha.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte nombre hasta fecha">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-3">
            <div class="card">
            <!--Visitantes por NOMBRE ENTRE FECHAS-->
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">Nombre Entre Fechas</h6>
                        <form action="visitasPorNombreEntreFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Nombre entre fechas">
                        </form>
                        <form action="visitasPorInicioDeNombreEntreFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio nombre entre fechas">
                        </form>
                        <form action="visitasPorFinalDeNombreEntreFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final nombre entre fechas">
                        </form>
                        <form action="visitasPorParteDeNombreEntreFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte nombre entre fechas">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-3">
            <!--Visitantes por 1º APELLIDO DESDE FECHAS -->
            <div class="card">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">1º Apellido Entre Fechas</h6>
                        <form action="visitasPor1ºApellidoDesdeFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="1º apellido desde fechas">
                        </form>
                        <form action="visitasPorInicioDe1ºApellidoDesdeFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio 1º apellido desde fechas">
                        </form>
                        <form action="visitasPorFinalDe1ºApellidoDesdeFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final 1º apellido desde fecha">
                        </form>
                        <form action="visitasPorParteDe1ºApellidoDesdeFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte 1º apellido desde fecha">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-3">
            <!--Visitantes por 1º APELLIDO HASTA FECHA-->
            <div class="card">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">2º Apellido Hasta Fecha</h6>
                        <form action="visitasPor1ºApellidoHastaFecha.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="2º apellido hasta fecha">
                        </form>
                        <form action="visitasPorInicioDe1ºApellidoHastaFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio 2º apellido hasta fecha">
                        </form>
                        <form action="visitasPorFinalDe1ºApellidoHastaFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final 2º apellido hasta fecha">
                        </form>
                        <form action="visitasPorParteDe1ºApellidoHastaFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte 2º apellido hasta fecha">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-3">
            <!-- Visitantes por AMBOS APELLIDOS ENTRE FECHAS -->
            <div class="card">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">Ambos Apellido Entre Fechas</h6>
                        <form action="visitasPor1ºApellidoEntreFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Ambos apellidos entre fechas">
                        </form>
                        <form action="visitasPorInicioDe1ºApellidoEntreFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Ambos apellidos entre fechas">
                        </form>
                        <form action="visitasPorFinalDe1ºApellidoEntreFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Ambos apellidos entre fechas">
                        </form>
                        <form action="visitasPorParteDe1ºApellidoEntreFechas.php" method="POST">
                            <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                            <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                            <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                            <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                            <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                            <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                            <input type="submit" class="btn btn-success btn-block" name="VPN" value="Ambos apellidos entre fechas">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-4">
            <!-- Visitantes por 2º APELLIDO DESDE FECHAS -->
            <div class="card card-body">
                <form action="visitasPor2ºApellidoDesdeFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="2º apellido desde fechas">
                </form>
                <form action="visitasPorInicio2ºApellidoDesdeFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio 2º apellido desde fechas">
                </form>
                <form action="visitasPorFinalDe2ºApellidoDesdeFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final 2º apellido desde fecha">
                </form>
                <form action="visitasPorParteDe2ºApellidoDesdeFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte 2º apellido Desde fecha">
                </form>
            </div>
        </div>
        <div class=" col-md-4">
            <!-- Visitantes por 2º APELLIDO HASTA FECHAS -->
            <div class="card card-body">
                <form action="visitasPor2ºApellidoHastaFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="2º apellido hasta fechas">
                </form>
                <form action="visitasPorInicio2ºApellidoHastaFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio 2º apellido hasta fechas">
                </form>
                <form action="visitasPorFinalDe2ºApellidoHastaFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final 2º apellido hasta fecha">
                </form>
                <form action="visitasPorParteDe2ºApellidoHastaFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte 2º apellido Hasta fecha">
                </form>
            </div>
        </div>
        <div class=" col-md-4">
            <!-- Visitantes por 2º APELLIDO ENTRE FECHAS -->
            <div class="card card-body">
                <form action="visitasPor2ºApellidoEntreFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="2º apellido entre fechas">
                </form>
                <form action="visitasPorInicio2ºApellidoEntreFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="Inicio 2º apellido entre fechas">
                </form>
                <form action="visitasPorFinalDe2ºApellidoEntreFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="Final 2º apellido entre fecha">
                </form>
                <form action="visitasPorParteDe2ºApellidoEntreFechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block" name="VPN" value="Parte 2º apellido entre fecha">
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="principalUno.php" method="get">
                <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                <input type="submit" class="btn btn-success btn-block" name="entrada" value="Regresar al menu de informes">
            </form>
        </div>
    </div>
</div>

