<?php
    //header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
    if(isset($_POST['entrada'])){
        $usuariorecibido = $_POST["usuario"];
        $laclaverecibida = $_POST["clave"];
        $MayUsu = strtoupper($usuariorecibido);
        $Maycla = strtoupper($laclaverecibida);
        $query = "SELECT UsuDni, UsuClave, UsuCentro, UsuNombre, UsuApellidoUno, UsuApellidoDos, 
        UsuTipo FROM Usuarios 
        WHERE UsuDni = '".$MayUsu."' AND UsuClave = '".$Maycla."'";
        $resultado = mysqli_query($conn, $query);
        if($resultado = mysqli_query($conn, $query)){
            while($fila = mysqli_fetch_row($resultado)){
                echo $fila[0];
                echo nl2br("\n");
                echo $fila[1];
                echo nl2br("\n");
                echo $fila[2];
                echo nl2br("\n");
                echo $fila[3];
                echo nl2br("\n");
                echo $fila[4];
                echo nl2br("\n");
                echo $fila[5];
                echo nl2br("\n");
                echo $fila[6];
                echo nl2br("\n");
                $usuario = $fila[0];
                $clave = $fila[1];
                $centro = $fila[2];
                $nombre = $fila[3];
                $apellidoUno = $fila[4];
                $apellidoDos = $fila[5];
                $rolUsuario = $fila[6];
                echo "<br>";  
                echo "El usuario es = " . $usuario;
                echo"<br>";
                echo "La contraseña es = " . $clave;
                echo"<br>";
                echo "El código del centro es = " . $centro;
                echo"<br>";
                echo "El nombre del usuario = " . $nombre;
                echo"<br>";
                echo "El primer apellido = " . $apellidoUno;
                echo"<br>";
                echo "El segundo apellido = " . $apellidoDos;
                echo"<br>";
                echo "El tipo de usuario es = " . $rolUsuario;
                echo"<br>";
                $query2 = "SELECT * FROM Centros WHERE CenId = '".$centro."'";
                $resulta2 = mysqli_query($conn, $query2);
                if($resulta2 = mysqli_query($conn, $query2)){
                    while($fila2 = mysqli_fetch_row($resulta2)){
                        $nombreCentro = $fila2[1];
                        echo"<br>";
                        echo "Este usuario está adscrito al centro " .$nombreCentro;
                        $centroDen = $nombreCentro;
                    }
                }
                session_start();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["suclave"] = $clave;
                $_SESSION["centro"] = $centro;
                $_SESSION["nombre"] = $nombre;
                $_SESSION["apellidoUno"] = $apellidoUno;
                $_SESSION["apellidoDos"] = $apellidoDos;
                $_SESSION["tipo"] = $rolUsuario;
                $_SESSION["iniciada"] = true;
                echo "<br>";
                echo $usuario;
                echo "<br>";
                echo $clave;
                echo "<br>";
                echo $centro;
                echo "<br>";
                echo $nombre;
                echo "<br>";
                echo $apellidoUno;
                echo "<br>";
                echo $apellidoDos;
                echo "<br>";
                echo $tipo;
                echo "<br>";
                echo $iniciada;
                echo "<br>";
                $nombreCompleto = $apellidoUno . " " . $apellidoDos . ", " . $nombre;
                echo $nombreCompleto;
            }
        }
    }
?>
<div class="container-fluid">
    <div class="row">
        <p>
            <?php
                $espacio = " ";
                $coma = ", ";
                $apellidoUno = $_GET['apu'];
                $apellidoDos = $_GET['apd'];
                $nombre = $_GET['nom'];
                $centroDen = $_GET['cen'];
                $centro = $_GET['num'];
                $identifico = $_GET['ide'];
                $identi = $_SESSION["usuario"];
                $denominado = $_SESSION["centroNombre"];
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
                print"<p><b>$espacio $espacio $espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $identi $espacio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
            ?>
        </p>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-body">
                <form action="visitaPorNombresYears.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="VisitasPorNombre" value="Informes Visitantes">
                </form>
            </div>
            <div class="card card-body">
                <form action="informesdellaves.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="llaves" value="Informes Llaves">
                </form>
            </div>
            <div class="card card-body">
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
            <div class="card card-body">
                <form action="informe_de_incidencias.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen;?>"/>
                    <input type="hidden" name="num" value="<?php echo $centro;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="informesVisitas" value="Informes Incidencias">   
                </form>
            </div>
        </div>
    </div>
</div>