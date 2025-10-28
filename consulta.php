<?php
    include("db.php");
    include("variables.php");
    require 'include/user_sesion.php';

    if(isset($_POST['entrada'])){
        //echo var_dump($_POST);
        //Recibo el usuario logueado
        $usuariorecibido = $_POST["usuario"];
        echo $usuariorecibido;
        //Recibo la clave del logueo
        $laclaverecibida = $_POST["clave"];
        echo "<br>";
        echo $laclaverecibida;
        echo "<br>";
        $MayUsu = strtoupper($usuariorecibido);
        $Maycla = strtoupper($laclaverecibida);
        echo $MayUsu;
        echo "<br>";
        echo $Maycla;
        echo "<br>";
        echo "Vamos a imprimir mas datos a partir de aquí";
        echo "<br>";
        //Creamos la query para buscar los datos del usuario dentro de la tabla Usuarios de la base de datos Conlabac
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
                if($rolUsuario == "U"){
                    echo "<br>";
                    echo "El Usuario logueado es tipo (U)suario";
                    header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuariorecibido");
                }
                if($rolUsuario == "T"){
                    echo "<br>";
                    echo "El Usuario logueado es tipo (T)écnico";
                    header("location: principalUno.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuariorecibido");
                }
                if($rolUsuario == "A"){
                    echo "<br>";
                    echo "El Usuario logueado es tipo (A)uxiliar";
                    header("location: principal3.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuariorecibido");
                }
                if($rolUsuario == "P"){
                    echo "<br>";
                    echo "El Usuario logueado es tipo (P)rogramador";
                    header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuariorecibido");
                   
                }
            }
        }
           
    }

?>